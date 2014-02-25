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
class Produto extends BaseOrm
{
	protected static $_table_name = 'produtos';
	protected static $_properties = array(
		'id',	
		'categoria_id',
		'nome',
		'codigo',
		'url',
		'url_video', 
		'valor_compra', 
		'valor_venda',
		'valor_promocional',		
		'resumo', 
		'detalhes',		
		'caracteristicas',
		'observacoes',
		'produtos_relacionados',
		'publicado', 		
		'destaque',
		'peso',
		'altura',
		'largura',
		'comprimento'
	);	
	
	protected static $_belongs_to = array(
		'categoria' => array(
			'key_from' 	=> 'categoria_id',
			'model_to' 	=> '\Model\Categoria',
			'key_to' 		=> 'id',
			'cascade_save' 	 => true,
			'cascade_delete' => false,
		)
	);

	/**
	 * @todo
	 * Procura um produto publicado pelo seu ID
	 */
	public static function findById($id)
	{
		return static::find()->where(array('id' => $id, 'publicado' => 1))->get_one();
	}
	/**
	 * @todo
	 * Procura um produto publicado pela sua URL
	 */
	public function findByUrl($url)
	{		
		return static::find()->where(array('url' => $url, 'publicado' => 1))->get_one();		
	}	
	public function getVideoIframe()
	{
		if($url = $this->url_video){
				
			if(strpos($url,'youtube') !== false){
	
				$url = parse_url($url);
	
				if(isset($url['query'])){
						
					$url = str_replace('v=','', $url['query']);
						
					return "<iframe width='570' height='350' src='//www.youtube.com/embed/{$url}' frameborder='0' allowfullscreen></iframe>";
				}
	
			}else{
	
				$url = parse_url($url);
	
				if(isset($url['path'])){
				
					$url = str_replace('/','', $url['path']);
	
					return "<iframe src='//player.vimeo.com/video/{$url}?color=ff9933' width='570' height='350' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>";
				}
			}
		}
	
		return null;
	}
	/**
	 * 25/07
	 * @todo
	 * Pega os produtos relacionados a este.
	 * @return
	 * Array
	 */
	public function getRelated()
	{
		$produtos = array();
		
		if( ! empty($this->produtos_relacionados)){
			$codigos = explode(',', $this->produtos_relacionados);
			if(count($codigos)){				
				foreach($codigos as $cod){	
					$produto = static::find()
								->where('publicado', 1)
								->where('codigo', trim($cod))
								->get_one();
					if($produto){						
						$produtos[] = $produto;
					}					
				}
			}
		}
								
		return $produtos;
	}
	public function getValorPromocional()
	{
		return \Convert::to_float($this->valor_promocional);
	}
	public function getValorVenda()
	{
		return \Convert::to_float($this->valor_venda);
	}	
	/**	
	 * @todo
	 * Pega o valor do produto
	 * @return float
	 */
	public function getPrice()
	{
		$valorPromocional = $this->getValorPromocional();
		$valorVenda = $this->getValorVenda();
		
		return empty($valorPromocional) ? $valorVenda : $valorPromocional;		
	}	
	/**
	 * @todo
	 * Pega o valor do produto formatado
	 */
	public function getPriceFormated()
	{
		$valorPromocional = $this->getValorPromocional();
		$valorVenda = $this->getValorVenda();
	
		if(empty($valorPromocional)){
			return \Convert::to_real($valorVenda);
		}
		else{
			return '<strike>'.\Convert::to_real($valorVenda).'</strike><br>'.\Convert::to_real($valorPromocional);
		}
	}
	/**	
	 * @see \Orm\Model::delete()
	 */
	public function delete($cascade=null,$use_transaction=false)
	{			
		Arquivo::removeFromReferenceType(static::$_table_name, $this->id, 'folheto');
		Arquivo::removeFromReferenceType(static::$_table_name, $this->id, 'manual');
		Arquivo::removeFromReferenceType(static::$_table_name, $this->id, 'foto');
		Arquivo::removeFromReferenceType(static::$_table_name, $this->id, 'galeria');
						
		parent::delete($cascade=null,$use_transaction=false);
	}	
	public function getMeta()
	{
		if($this->id){			
			return Meta::getFromReference(static::$_table_name, $this->id) ?: Meta::forge();				 		
		}else{
			return Meta::forge();
		}		
	}
	public function setMeta(array $data)
	{
		if($this->id){
			Meta::add(static::$_table_name, $this->id, $data);					
		}
	}
	public function getManual()
	{			
		if($this->id){
			return Arquivo::getFromReferenceType(static::$_table_name, $this->id, 'manual', false);
		}
		return null;
	}
	public function setManual($input)
	{
		if($this->id){
			$arquivo = $this->getManual();
			if($arquivo){
				$arquivo->edit($input);
			}else{
				Arquivo::add(static::$_table_name, $this->id, 'manual', $input);
			}
		}	
	}
	public function getFolheto()
	{			
		if($this->id){
			return Arquivo::getFromReferenceType(static::$_table_name, $this->id, 'folheto', false);
		}
		return null;
	}
	public function setFolheto($input)
	{
		if($this->id){
			$arquivo = $this->getFolheto();
			if($arquivo){
				$arquivo->edit($input);
			}else{
				Arquivo::add(static::$_table_name, $this->id, 'folheto', $input);
			}
		}				
	}	
	public function getFoto()
	{			
		if($this->id){
			return Arquivo::getFromReferenceType(static::$_table_name, $this->id, 'foto', false);
		}
		return array();
	}
	public function setFoto($input)
	{
		if($this->id){			
			if($arquivo = $this->getFoto()){
				$arquivo->edit($input);
			}else{
				Arquivo::add(static::$_table_name, $this->id, 'foto', $input);
			}
		}	
	}
	public function getGaleria()
	{
		if($this->id){
			return Arquivo::getFromReferenceType(static::$_table_name, $this->id, 'galeria');
		}
		return array();
	}
	public function setGaleria($input)
	{
		if($this->id){
			Arquivo::add(static::$_table_name, $this->id, 'galeria', $input);
		}
	}
	/**
	 * @todo
	 * Pega um arquivo do produto.
	 * @param int $id
	 */
	public function getArquivo($id)
	{
		if($this->id){
			return Arquivo::query()
				->where('referencia',static::$_table_name)
				->where('referencia_id',$this->id)
				->where('id',(int)$id)
				->get_one();
		}
		return null;
	}
	public function post()
	{
		$val =  static::getValidateSave();
		$id  = (int)\Input::post('id');
		 
		if ($val->run()){

			$input = $val->input('data');
			
			$input['valor_compra'] 		= \Convert::to_decimal($input['valor_compra']);
			$input['valor_venda'] 		= \Convert::to_decimal($input['valor_venda']);
			$input['valor_promocional'] = \Convert::to_decimal($input['valor_promocional']);
									
			if($id){
				$model = static::find($id)->set($input);							
			}else{
				$model = static::forge($input);				
			}
	
			$model->save();
								
			$model->setManual(\Input::file('manual'));
			$model->setFolheto(\Input::file('folheto'));			
			$model->setFoto(\Input::file('foto'));
			$model->setGaleria(\Input::file('galeria'));
			$model->setMeta($val->input('meta'));
									
			return array($model, \Message::SUCCESS, \Message::ALERT_SAVE);
		}
		else{		
			return array(static::forge($val->input('data')), \Message::ERROR, $val->error());						
		}
	}
	public static function getValidateSave()
	{
		$id 	= (int)\Input::post('id');
		$val 	= \Validation::forge();
		 
		$val->add_callable(new \MyValidation());
						
		$val->add_field('data[categoria_id]','Categoria','required');
		$val->add_field('data[codigo]','Código','required')
			->add_rule('unique_field',  "produtos.codigo.{$id}");
		$val->add_field('data[nome]','Nome','required');
		$val->add_field('data[valor_compra]','Valor de compra','required');
		$val->add_field('data[valor_venda]', 'Valor de venda','required');
		$val->add_field('data[peso]','Peso','required');
		$val->add_field('data[altura]','Altura','required');
		$val->add_field('data[largura]','Largura','required');
		$val->add_field('data[comprimento]','Comprimento','required');
		$val->add_field('data[url]', 'URL SEO', 'required')
			->add_rule('valid_string', array('alpha', 'numeric', 'lowercase', 'dashes'))
			->add_rule('unique_field',  "produtos.url.{$id}");
		$val->add_field('data[resumo]','Resumo','required');
		$val->add_field('data[detalhes]','Detalhes','required');
		$val->add_field('data[caracteristicas]','Outras Características','required');
		$val->add('id', 'Fotos')
			->add_rule('max_images', 5);
				
		parent::setDefaultMessageValidate($val);
				 
		return $val;
	}	
}