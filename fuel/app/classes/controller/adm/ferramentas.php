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
use Model\Vitrine;
use Model\Bloco;
use Model\Login;
use Model\Log;
class Controller_Adm_Ferramentas extends Controller_Adm_Base
{
	public function before()
	{
		parent::before();
			
		$this->setContext('adm');
		$this->setController('ferramentas');
	}	
	public function get_sharethis()
	{
		$this->getPagina('sharethis','Código do ShareThis');
	}
	public function post_sharethis()
	{
		$this->postPagina('sharethis');
	}
	public function get_disqus()
	{
		$this->getPagina('disqus','Código do Disqus');
	}
	public function post_disqus()
	{
		$this->postPagina('disqus');
	}
	public function get_google()
	{
		$this->getPagina('google','Código do Google Analytics');
	}
	public function post_google()
	{
		$this->postPagina('google');
	}
	private function getPagina($type, $title)
	{
		$data['model'] 	= Bloco::findByType($type);
		$data['action'] = $type;
		$data['label'] 	= $title;
		
		$this->template->title   = $title;
		$this->template->content = View::forge($this->getContext().'/'.$this->getController().'/'.$type, $data);
	}
	private function postPagina($type)
	{
		Bloco::post(\Input::post('data'), $type);
		
		\Session::set_flash('alert', Message::ALERT_SAVE);
		
		Response::redirect($this->getContext().'/'.$this->getController().'/'.$type);
	}
}