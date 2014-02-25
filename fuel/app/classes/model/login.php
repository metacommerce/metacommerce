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
class Login
{		
	/**
	 * @todo
	 * Retorna o ID do administrador que está na sessão.
	 * @return int;
	 */
	public static function getAdmId()
	{
		return (int)\Session::get('adm.id');
	}
	/**
	 * @todo
	 * Retorna o nome do administrador que está na sessão.
	 * @return string;
	 */
	public static function getAdmNome()
	{
		return \Session::get('adm.nome');
	}	
	/**
	 * @todo
	 * Destroi a Sessão
	 */
	public static function destroySession()
	{
		return \Session::destroy();
	}
	/**
	 * @todo
	 * Autenticação
	 * @return boolean
	 */
	public static function enter($data)
	{				
		if($model = static::tryLogin($data['email'], $data['senha'])){	
			static::register($model);								
			return \Response::redirect('adm');
		}			
		return false;
	}
	private static function tryLogin($email, $senha)
	{
		if(empty($email) || empty($senha)){
			return false;
		}
			
		static::passTheFilter($email);
		static::passTheFilter($senha);
	
		$conditions['email']  = $email;
		$conditions['senha']  = md5($senha);
			
		return Administrador::query()->where($conditions)->get_one();
	}
	private static function register($model)
	{
		$sessao['id']	 = (int)$model->id;
		$sessao['nome']  = $model->nome;
		$sessao['email'] = $model->email;
	
		\Session::set('adm', $sessao);
	}
	public static function remember($email)
	{
		if(empty($email)){
			return false;
		}
	
		static::passTheFilter($email);
					
		$model  = Administrador::findByEmail($email);
		if($model){
			static::changePassword($model);
			return true;
		}
				
		return false;
	}			
	private static function changePassword($model)
	{
		$pass = static::generatePassword();
		BaseOrm::email($model->nome, $model->email, 'Sua nova senha', "Sua senha é: {$pass}");
		$model->senha = md5($pass);
		$model->save();			
	}
	/**
	 * Gera uma senha aleatória
	 **/
	public static function generatePassword($tamanho=8)
	{
		$senha = chr(mt_rand(65,90));
		for($i=0; $i < $tamanho - 1; $i++){
			$prob = mt_rand(1,10);
			($prob <= $tamanho) ? ($senha.= chr(mt_rand(97,122))) : ($senha.= chr(mt_rand(48, 57)));
		}
		return trim($senha);
	}
	/**
	 * @param  String $senha
	 * @todo   Passa uma string no filtro de segurança de entradadas
	 * @return Retorna por referência
	 **/
	private static function passTheFilter(&$value)
	{
		$filters = array('addslashes', 'strip_tags', 'htmlentities', '\Security::xss_clean');
		$value	 = \Security::clean($value, $filters);
	}
}