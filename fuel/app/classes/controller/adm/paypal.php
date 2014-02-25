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
use Model\PayPal;
class Controller_Adm_PayPal extends Controller_Adm_Base
{	
	public function before()
	{
		parent::before();
	
		$this->setModel(Paypal::getModel());
		$this->setTitle('index','Suas informações do PayPal');		
		$this->setView('index','adm/pagamentos/paypal');		
		$this->setContext('adm');
		$this->setController('paypal');
	}
	public function get_index()
	{
		$this->template->title   = $this->getTitle('index');
		$this->template->content = $this->getForm($this->getModel());	
	}
	public function post_save()
	{
		list($response, $msg) = $this->getModel()->post();
	
		if($response){
			\Session::set_flash('alert', $msg);
			Response::redirect($this->getContext().'/'.$this->getController());
		}else{
			$this->template->message = \Message::forge(array($msg, 'Erro!', 'error'))
				 ->getMessagesInTemplate();
						
			$this->get_index();
		}
	}
	private function getForm($model)
	{
		$form = View::forge($this->getView('index'));
		$form->model = $model;
			
		return $form;
	}
}