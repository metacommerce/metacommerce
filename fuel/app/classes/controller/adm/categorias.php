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
use Model\Categoria;

class Controller_Adm_Categorias extends Controller_Adm_Base
{
	public function before()
	{
		parent::before();
				
		$this->setModel(Categoria::forge());
		$this->setTitle('index','Categorias');
		$this->setTitle('create','Incluir Categoria');
		$this->setTitle('edit','Editar Categoria');
		$this->setView('index','adm/categorias/index');
		$this->setView('form','adm/categorias/form');
		$this->setContext('adm');
		$this->setController('categorias');
	}
	public function get_index()
	{		
		$condition = function(&$query){
			$query->order_by('categoria_id')
				  ->order_by('nome');
		};
		
		$pagination  = Pagination::forge('pagination',
			$this->getConfigPagination(				
				$this->getModel()->getTotalItems($condition)
			)
		);
				
		$data['model'] 		= $this->getModel()->getPagination($pagination, $condition, null, '\Model\Categoria');
		$data['pagination'] = $pagination->render();
			
		$this->template->title   = $this->getTitle('index');
		$this->template->content = View::forge($this->getView('index'), $data, false);								
	}
	public function get_create()
	{
		$this->template->title   = $this->getTitle('create');
		$this->template->content = $this->getForm($this->getModel());
	}
	public function get_edit($id = 0)
	{
		$model = $this->getModel($id);
						
		if($model){		
			$this->template->title   = $this->getTitle('edit');
			$this->template->content = $this->getForm($model);
		}else{			
			$this->template->message = \Message::forgeDefault(\Message::ALERT_NOT_FOUND);
			$this->get_index();
		}
	}
	public function get_del($id = 0)
	{		
		$model = $this->getModel($id);

		if($model && $model->produtos){
			$alert  = \Message::ALERT_CATEGORIA_TEM_PRODUTOS;
		}else{		
			$model->delete();			
			$alert  = \Message::ALERT_DELETE;
		}
		
		\Session::set_flash('alert', $alert);
		
		Response::redirect($this->getContext().'/'.$this->getController());		
	}
	public function post_save()
	{				
		list($model, $response, $msg) = $this->getModel()->post();
		
		if($response){									
			\Session::set_flash('alert', $msg);			
			Response::redirect($this->getContext().'/'.$this->getController());			
		}else{			
			$this->template->message = \Message::forge(array($msg, 'Erro!', 'error'))
										->getMessagesInTemplate();
			if($id = (int)\Input::post('id')){
				$this->get_edit($id);
			}else{
				$this->setModel($model);
				$this->get_create();
			}
		}
	}
	private function getForm($model)
	{				
		$condition = function(&$query) use(&$model){
			//Categoria Pai não pode ser Filha.
			$query->where('categoria_id', 0); 
			//Categoria Pai não pode ser Pai dela mesma.
			if((int)$model->id > 0){
				$query->where('id', '!=', (int)$model->id);
			}					
		};
						
		$form = View::forge($this->getView('form'));
		$form->model = $model;	
		$form->categorias = Categoria::FormSelect('id', 'nome', 'Categoria Pai', $condition);
		
		return $form;
	}
}