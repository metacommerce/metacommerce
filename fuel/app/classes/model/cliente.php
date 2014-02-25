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
class Cliente extends BaseOrm
{				
	protected static $_table_name = 'clientes';
	protected static $_properties = array(
		'id', 		
		'nome',
		'email',
		'senha',
		'tel_fixo',
		'tel_celular',
		'documento',			
		'sexo',
		'nascimento',
		'dt_cadastro'		
	);
	
	/**
	 * @todo
	 * Verifica se o cliente está autenticado
	 */
	public static function autenticado()
	{
		$cliente_id = (int)\Session::get('cliente.id');
		
		return  ! empty($cliente_id);
	}
	/**
	 * @todo
	 * Faz login na conta do cliente
	 */
	public static function login($email, $senha)
	{
		$cliente = static::query()
						->where('email', $email)
						->where('senha', $senha)
						->get_one();
		
		if(empty($cliente)){
			return null;
		}else{
			
			$sessao['id']	 = (int)$cliente->id;
			$sessao['nome']  = $cliente->nome;
			$sessao['email'] = $cliente->email;
			
			\Session::set('cliente', $sessao);
			
			return $cliente;
		}
	}
	/**
	 * @todo
	 * Faz logout na conta do cliente
	 */
	public static function logout()
	{
		\Session::delete('cliente');
		\Session::delete('cliente.id');
		\Session::delete('cliente.nome');
		\Session::delete('cliente.email');
	}
	/**
	 * @todo
	 * Cria uma conta de cliente a partir do Paypal
	 */
	public static function createOfPaypal($responseNvp)
	{
		$nome  = $responseNvp['FIRSTNAME'];
		$email = $responseNvp['EMAIL'];
					
		$cliente = static::findByEmail($email);
		if(empty($cliente)){			
			$senha 	 = Login::generatePassword();
			$cliente = static::forge(array('nome' => $nome, 'email' => $email, 'senha' => $senha, 'dt_cadastro' => date('Y-m-d')));
			$cliente->save();	
			$cliente->enviaAcessoConta();				
		}
		return $cliente;
	}
	public static function findByEmail($email)
	{
		return static::query()->where('email', $email)->get_one();
	}
	public static function downloadTxt($nome, $arquivo)
	{
		$response = new \Response();
		$response->set_header('Content-Description', 'File Transfer');
		$response->set_header('Content-type', 'application/force-download');
		$response->set_header('Content-Transfer-Encoding', 'binary');
		$response->set_header('Content-Disposition', "attachment; filename={$nome}");
		$response->set_header('Cache-Control', 'private, max-age=0, must-revalidate');
		$response->set_header('Pragma', 'public');
	
		$response->send_headers();
		 
		readfile($arquivo);
		
		if(file_exists($arquivo)){
			unlink($arquivo);
		}
		
		exit();
	}
	public static function sexos()
	{
		return array('m' => 'Masculino', 'f' => 'Feminino', '' => 'Indefinido');
	}
	public function getNascimento()
	{
		return \Convert::to_br_date($this->nascimento);
	}
	public function post()
	{
		$id  = (int)\Input::post('id');
		$val = static::getValidateSave($id);
	
		if ($val->run()){
	
			$input = $val->input('data');
	
			$input['nascimento'] = \Convert::to_en_date($input['nascimento']);
			
			if($val->input('senha')){
				$input['senha'] = $val->input('senha');
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
	 * Envia o acesso a conta do cliente
	 */
	public function enviaAcessoConta()
	{
		$loja  = Loja::getModel();
		$link  = \Uri::base();
		
		$mensagem[] = "<p><b>Link:</b> <a href='{$link}'>{$link}</a></p>";
		$mensagem[] = "<p><b>Login:</b> {$this->email}";
		$mensagem[] = "<p><b>Senha:</b> {$this->senha}";
			
		parent::email($this->nome, $this->email, "Acesse sua conta na loja {$loja->nome}", implode('', $mensagem));
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
		->add_rule('unique_field', "clientes.email.{$id}");
	
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

