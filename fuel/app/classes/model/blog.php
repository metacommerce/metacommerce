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
class Blog extends BaseOrm
{
	protected static $_table_name = 'blog';
	protected static $_properties = array(
		'id',		
		'titulo',
		'url',
		'resumo',
		'conteudo',
		'link',
		'publicado',
		'dt_cadastro'		
	);	
		
	public static function findByUrl($url)
	{
		return static::find()->where(array('url' => $url, 'publicado' => 1))->get_one();
	}
	/**
	 * @todo
	 * Data de cadastro no formato Pt-br
	 * @return string
	 */
	public function getDtCadastro()
	{
		return \Convert::to_br_date($this->dt_cadastro);
	}
	/**
	 * @see \Orm\Model::delete()
	 */
	public function delete($cascade=null,$use_transaction=false)
	{
		Arquivo::removeFromReferenceType(static::$_table_name, $this->id, 'foto');
		
		parent::delete($cascade=null,$use_transaction=false);
	}
	/**
	 * @param  Array $data
	 * @param  int $id
	 * @return string
	 * @todo
	 *  Ativa/Desativa um campo (Tinyint) no modelo
	 */
	public function activate(array $data)
	{
		if($data){
			$this->set(array($data['field'] => (int)$data['value']))->save();
			Log::send(Log::getDefaultMessage('Blog', $this->titulo, Log::MESSAGE_UPDATE));			
			return 'true';
		}
		return 'false';
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
			Arquivo::add(static::$_table_name, $this->id, 'foto', $input);
		}
	}
	public function post()
	{
		$val =  static::getValidateSave();
		$id  = (int)\Input::post('id');
			
		if ($val->run()){
	
			$input = $val->input('data');
										
			if($id){
				$model = static::find($id)->set($input);				
			}else{
				$input['dt_cadastro'] = date('Y-m-d');
				$model = static::forge($input);				
			}
	
			$model->save();
				
			$model->setFoto(\Input::file('foto'));
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
	
		$val->add_field('data[titulo]','Título','required');
		$val->add_field('data[url]', 'URL', 'required')
		->add_rule('valid_string', array('alpha', 'numeric', 'lowercase', 'dashes'))
		->add_rule('unique_field',  "blog.url.{$id}");
		$val->add_field('data[resumo]','Resumo','required');
		$val->add_field('data[conteudo]','Conteúdo','required');
					
		parent::setDefaultMessageValidate($val);
			
		return $val;
	}
}