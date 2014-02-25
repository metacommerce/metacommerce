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
class Controller_Adm_Textos extends Controller_Adm_Base
{
	public function before()
	{
		parent::before();
			
		$this->setContext('adm');
		$this->setController('textos');
	}		
	public function get_contato()
	{
		$this->getPagina('contato','Texto Contato','Texto da página Contato');
	}
	public function post_contato()
	{
		$this->postPagina('contato');
	}	
	public function get_quem_somos()
	{
		$this->getPagina('quem_somos','Texto Quem Somos','Texto da página Quem Somos');
	}
	public function post_quem_somos()
	{
		$this->postPagina('quem_somos');
	}
	public function get_como_comprar()
	{
		$this->getPagina('como_comprar','Texto Como Comprar','Texto da página Como Comprar');
	}
	public function post_como_comprar()
	{
		$this->postPagina('como_comprar');
	}
	private function getPagina($type, $title, $label)
	{
		$data['model'] 	= Bloco::findByType($type);
		$data['action'] = $type;
		$data['label'] 	= $label;
		
		$this->template->title   = $title;
		$this->template->content = View::forge($this->getContext().'/'.$this->getController().'/pagina', $data);
	}
	private function postPagina($type)
	{
		Bloco::post(\Input::post('data'), $type);
		
		\Session::set_flash('alert', Message::ALERT_SAVE);
		
		Response::redirect($this->getContext().'/'.$this->getController().'/'.$type);
	}
}