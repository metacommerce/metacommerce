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
use \Model\Login;
class Controller_Login extends Controller_Hybrid
{	
	protected $rest_format = 'html';
	var $template = 'template-geral';
	
	public function get_index()
	{						
		$view = View::forge('login/index');
		
		if($message = \Session::get_flash('message')){			
			$this->template->set('message', \Message::forge(array(
				$message['content'],					
				$message['title'],
				$message['type'],			
			)), false);
		}

		$this->template->title 	 = 'Entre com seus dados de acesso';
		$this->template->content = $view;				
	}
	public function post_entrar()
	{				
		if( !  Login::enter(Input::post('data'))){			
			$this->setMessage('Dados Inválidos', 'Erro!', 'error');
			return Response::redirect('login/index');
		}
	}
	public function get_sair()
	{
		Login::destroySession();
		
		return Response::redirect('login/index');
	}
	public function get_lembrar()
	{
		return Response::forge(View::forge('login/remember'));
	}
	public function post_lembrar()
	{
		if(Login::remember(Input::post('data.email'))){							
			$this->setMessage('Uma nova senha foi enviada para seu e-mail', 'Sucesso!', 'success');	
		}else{			
			$this->setMessage('E-mail Inválido', 'Erro!', 'error');			
		}										
		return Response::redirect('login/index');
	}
	private function setMessage($content, $title, $type)
	{
		$message['content'] = $content;
		$message['title'] 	= $title;
		$message['type']  	= $type;
		
		\Session::set_flash('message', $message);
	}
}
