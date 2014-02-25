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
use Model\Login;
use Model\Vitrine;
class Controller_Adm_Base extends Controller_Hybrid
{
	var $template = 'template-adm';
		
	private $model;
	private $titles;
	private $views;
	private $context;
	private $controller;
	
	public function before()
	{
		parent::before();
	
		if( ! Login::getAdmId()){
			return \Response::redirect('login/sair');
		}
		
		if($alert = Session::get_flash('alert')){
			$this->template->message = \Message::forgeDefault($alert);
		}
		
		if( ! Input::is_ajax()){
							
			$this->template->menu  		  = View::forge('adm/menu');
			$this->template->usuario_nome = Login::getAdmNome();
			$this->template->usuario_id   = Login::getAdmId();
		}
	}
	protected function setModel($model)
	{
		$this->model = $model;
	}
	protected function getModel($id = 0)
	{
		if(empty($id)){
			return $this->model;
		}else{
			$model = $this->model;
			return $model::find((int)$id);
		}
	}
	protected function setTitle($action, $content)
	{
		$this->titles[$action] = $content;
	}
	protected function getTitle($action)
	{
		return $this->titles[$action];
	}
	protected function setView($action, $content)
	{
		$this->views[$action] = $content;
	}
	protected function getView($action)
	{
		return $this->views[$action];
	}
	protected function setContext($context)
	{
		$this->context = $context;
	}
	protected function getContext()
	{
		return $this->context;
	}
	protected function setController($controller)
	{
		$this->controller = $controller;
	}
	protected function getController()
	{
		return $this->controller;
	}
	/**
	 * @todo
	 * Pega a configuração básica da paginação.
	 * @return Array
	 */
	protected function getConfigPagination($total_items, $params = null)
	{
		$params = ($params)? '?'.http_build_query($params) : null;
		$config = array(
				'pagination_url' => \Uri::base().$this->getContext().'/'.$this->getController().'/'.$params,
				'total_items'    => $total_items,
				'per_page'       => 5,
				'uri_segment'    => 'page'
		);
	
		return $config;
	}
}