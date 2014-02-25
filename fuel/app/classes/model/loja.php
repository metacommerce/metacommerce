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
class Loja extends BaseOrm
{	
	protected static $_table_name = 'loja';
	protected static $_properties = array(
		'id',		
		'nome',
		'email',
		'documento',
		'cep',
		'bairro',
		'cidade',
		'estado',
		'endereco',
		'tel1',
		'tel2'
	);
	
	protected static $_belongs_to = array(
		'cidade' => array(
			'key_from' 	=> 'cidade_id',
			'model_to' 	=> '\Model\Cidade',
			'key_to' 		 => 'id',
			'cascade_save' 	 => false,
			'cascade_delete' => false,
		)		
	);
		
	public static function getModel()
	{
		if($model = static::find('first')){
			return $model;
		}else{
			$model = static::forge();
			$model->save();
			return $model;
		}
	}
	public function post()
	{
		$val = $this->getValidateSave();
			
		if ($val->run()){
	
			$input = $val->input('data');
	
			$model = static::getModel()->set($input);
	
			$model->save();
	
			return array(\Message::SUCCESS, \Message::ALERT_SAVE);
		}
		else{
			return array(\Message::ERROR, $val->error());
		}
	}
	public function getValidateSave()
	{
		$val = \Validation::forge();
					
		$val->add_field('data[nome]','Nome','required');
		$val->add_field('data[email]','E-mail','required');
		$val->add_field('data[documento]','CNPJ','required');
		$val->add_field('data[cep]','CEP','required');
		$val->add_field('data[bairro]','Bairro','required');
		$val->add_field('data[cidade]','Cidade','required');
		$val->add_field('data[estado]','Estado','required');
		$val->add_field('data[endereco]','Endereço','required');
		$val->add_field('data[tel1]','Telefone Principal','required');
			
		parent::setDefaultMessageValidate($val);
			
		return $val;
	}
}