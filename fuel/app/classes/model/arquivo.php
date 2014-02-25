<?php
/**
 * The MIT License
 * Copyright (c) 2014  MetaCommerce Development Team
 * http://metacommerce.com.br
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the “Software”), 
 * to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, 
 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * -The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 * -The logo MetaCommerce must be included with the link to this site on all copies of this software.
 *
 * THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER 
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS 
 * IN THE SOFTWARE.
 */
namespace Model;
class Arquivo extends BaseOrm
{
	protected static $images	  = array('png', 'gif', 'jpg', 'bmp', 'tiff');
	protected static $_table_name = 'arquivos';
	protected static $_properties = array(
	  'id',
	  'referencia',
	  'referencia_id',
	  'tipo',
	  'nome',	 	 
	  'mime',
	  'dt_cadastro'
	);
	
	/**
	 * @todo
	 * Insere arquivos
	 * @param string $referencia
	 * @param int    $referencia_id
	 * @param string $tipo
	 * @param array input/files $arquivos
	 * @return boolean
	 */
	public static function add($referencia, $referencia_id, $tipo, $inputs)
	{						
		$inputs = static::prepareInputs($inputs);			
		
		foreach($inputs as $input){	
			if(static::isValidInput($input)){
				$data['referencia']  	= $referencia;
				$data['referencia_id']  = $referencia_id;
				$data['nome'] 	  	 	= parent::slug($input['name']);
				$data['tipo'] 		 	= $tipo;
				$data['mime']			= $input['type'];
				$data['dt_cadastro'] 	= date('Y-m-d');
				
				$file = static::forge($data);
				$file->save();
				$file->upload($input);
			}
		}		
	}
	/** 
	 * @todo
	 * Edita o arquivo.
	 * @param input/file $input
	 */
	public function edit(array $input)
	{
		if(static::isValidInput($input)){
			if($this->id){
				if($this->removeFromHD()){
					$this->nome = parent::slug($input['name']);
					$this->mime = $input['type']; 
					$this->save();
					$this->upload($input);
				}
			}
		}
	}
	/**
	 * @todo
	 * Retorna os arquivos do tipo informado que pertencem a uma referência.
	 * Você pode decidir se quer um ou todos.
	 * @param string $referencia = Tabela de referência
	 * @param int $referencia_id = Chave primária da tabela de referência
	 * @param string $tipo 		 = Qualquer tipo em string
	 * @param $todos 			 = true or false - default true
	 */
	public static function getFromReferenceType($referencia, $referencia_id, $tipo, $todos = true)
	{
		$result =  static::query()
			->where('referencia', $referencia)
			->where('referencia_id', $referencia_id)
			->where('tipo', $tipo);
	
		return ((bool)$todos) ? $result->get() : $result->get_one();
	}
	/**
	 * @todo
	 * Remove os arquivos do tipo informado que pertencem a uma referência.
	 * @param string $referencia
	 * @param int $referencia_id
	 * @param string $tipo
	 */
	public static function removeFromReferenceType($referencia, $referencia_id, $tipo)
	{
		$files = static::getFromReferenceType($referencia, $referencia_id, $tipo);
		if($files){
			foreach($files as $f){
				$f->remove();
			}
		}
	}
	/**
	 * @todo
	 * Prepara os inputs/files para single ou multiple uploads.
	 * @param  array $files
	 * @return array $result;
	 */
	public static function prepareInputs(array $inputs)
	{
		$result = array();
		if($inputs){
			foreach($inputs as $key => $index){
				if(is_array($index)){
					foreach($index as $i => $value){
						$result[$i][$key] = $value;
					}
				}else{
					$result[0][$key] = $index;
				}
			}
		}
		return $result;
	}
	/**
	 * @todo
	 * Verifica se a entrada é válida.
	 * @return boolean
	 */
	public static function isValidInput($input)
	{
		if( (int)$input['error'] > 0 || 
			(int)$input['size'] <  1){
			return false;
		}
		return true;
	}
	/**
	 * @todo
	 * Faz o upload do arquivo
	 * @param  array $input
	 * @return boolean
	 */
	private function upload($input)
	{
		$dir = $this->createDir();
		if(move_uploaded_file($input['tmp_name'], $dir.$this->nome)){			
			$this->tryCreateThumb();
			return true;
		}
		return false;
	}
	/**
	 @todo
	 Cria um diretório com o ID do arquivo.
	 @return String $dir
	*/
	private function createDir()
	{
		$dir = $this->getDir();
		if( ! is_dir($dir)){
			mkdir($dir,	0777, true);
		}
		return $dir;
	}
	/**
	 * @todo
	 * Tenta criar um thumb de uma imagem.
	 */
	private function tryCreateThumb()
	{
		if($this->isImage()){
			\Package::load('wideimage');
			$dir 	 	= $this->getDir();
			$content 	= $dir.$this->nome;
			$wideimage  = \WideImage::load($content);
			$wideimage  = $wideimage->resize(89, 85, 'inside', 'down');
			$wideimage->saveToFile($dir.'thumb-'.$this->nome);
		}
	}
	/**
	 * @todo
	 * Retorna o diretório padrão do arquivo.
	 * @return String
	 */
	private function getDir()
	{
		return UPLOADPATH.'arquivos/'.$this->id.'/';
	}
	/**
	 * @todo
	 * Retorna a extensão do arquivo.
	 * @return string
	 */
	private function getExtension()
	{
		$ext = explode('.', $this->nome);
		$ext = strtolower(end($ext));
		return $ext;
	}
	/**
	 * @todo
	 * Verifica se o arquivo é uma imagem.
	 * @return boolean
	 */
	private function isImage()
	{
		return in_array($this->getExtension(), static::$images);
	}
	
	/**
	 * @todo
	 * Remove o arquivo do banco de dados
	 * @return boolean
	 */
	public function remove()
	{
		if($this->id){
			if($this->removeFromHD()){
				$this->delete();
				return true;
			}
		}
		return false;
	}	
	/**
	 * @todo
	 * Remove o arquivo do HD
	 * @return boolean
	 */
	private function removeFromHD()
	{
		$dir 	 = $this->getDir();
		$content = $dir.$this->nome;
		$thumb 	 = $dir.'thumb-'.$this->nome;
		if(file_exists($content)){			
			if(unlink($content)){				
				if(file_exists($thumb)){
					unlink($thumb);
				}
				return rmdir($dir);
			}
		}
		return false;
	}	
}