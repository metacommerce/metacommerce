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
class Administrador extends BaseOrm
{				
	protected static $_table_name = 'administradores';
	protected static $_properties = array(
		'id', 		
		'nome',
		'email',
		'senha',
		'cargo'
	);
	
	public static function findByEmail($email)
	{
		return static::query()->where('email', $email)->get_one();
	}
		
	public function post()
	{
		$id  = (int)\Input::post('id');
		$val = static::getValidateSave($id);
	
		if ($val->run()){
	
			$input = $val->input('data');
						
			if($val->input('senha')){
				$input['senha'] = md5($val->input('senha'));
			}
				
			if($id){
				$model = static::find($id)->set($input);
			}else{
				$model = static::forge($input);
				$model->dt_cadastro = date('Y-m-d');
			}
	
			$model->save();
				
			return array($model, \Message::SUCCESS, \Message::ALERT_SAVE);
		}
		else{
			return array(static::forge($val->input('data')), \Message::ERROR, $val->error());
		}
	}
		
	/**
	 * @todo
	 * Validação
	 */
	public static function getValidateSave($id = null)
	{
		$senha 	= \Input::post('senha');
		$val 	= \Validation::forge();
			
		$val->add_callable(new \MyValidation());
			
		$val->add_field('data[nome]','Nome','required');
		$val->add_field('data[email]','E-mail','required|valid_email')
		->add_rule('unique_field', "administradores.email.{$id}");
	
		if($id && $senha){
			static::validaSenha($val);
		}elseif($id == null){
			static::validaSenha($val);
		}
			
		parent::setDefaultMessageValidate($val);
			
		return $val;
	}
	
	private static function validaSenha(&$val)
	{
		$val->add_field('senha', 'Senha',  'required|min_length[3]|max_length[10]|match_field[confirmar_senha]');
		$val->add_field('confirmar_senha', 'Confirmar Senha', 'required|min_length[3]|max_length[10]');
	}	
}

