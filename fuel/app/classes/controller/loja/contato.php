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
use Model\Bloco;
class Controller_Loja_Contato extends Controller_Loja_Base
{
	public function get_index()
	{				
		if(\Input::get('env',false)){
			$data['alerta']	 = new Alerta('Mensagem enviada com sucesso');
		}
		
		$data['titulo']  = 'Contato';
		$data['bloco']	 =  Bloco::findByType('contato');
		
		$this->template->title   = "{$data['titulo']} | {$this->template->loja->nome}";
		$this->template->content = View::forge($this->template->loja->template.'contato/index', $data, false);
	}
	public function post_enviar()
	{
		$msg = "";
		foreach(Input::post('data') as $key => $val){			
			if( ! empty($val)){
				$msg.= "<p><b>{$key}:</b> $val</p>";
			}						
		}
		
		\Model\BaseOrm::email($this->template->loja->nome, $this->template->loja->email, 'Contato pelo site', $msg);
		
		return Response::redirect('contato?env=ok');	
	}
}