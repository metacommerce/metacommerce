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
use Model\Carrinho;

class Controller_Adm_Pedidos extends Controller_Adm_Base
{
	public function before()
	{
		parent::before();

		$this->setModel(Carrinho::forge());
		$this->setTitle('index','Pedidos Realizados');
		$this->setTitle('read','Detalhes do Pedido');	
		$this->setView('index','adm/pedidos/index');
		$this->setView('form','adm/pedidos/form');
		$this->setContext('adm');
		$this->setController('pedidos');
	}
	public function get_index()
	{		
		$numero 	= \Input::get('numero');
		$status 	= \Input::get('status');
		$params 	= null;
		$condition 	= function(&$query){
			$query->order_by('carrinhos.id','DESC');				 
		};
				
		if( ! empty($numero) ||  ! empty($status)){
			$condition = function(&$query) use(&$numero, &$status){

				if($numero){ $query->where('carrinhos.id', (int)$numero); }
				if($status){ $query->or_where('carrinhos.status', (int)$status); }
									  
				 $query->order_by('carrinhos.id','DESC');				
			};
			
			if($numero){
				$params['numero'] = $numero;
			}
			if($status){
				$params['status'] = $status;
			}			
		}	
					
		$pagination  = Pagination::forge('pagination',
			$this->getConfigPagination(				
				$this->getModel()->getTotalItems($condition),
				$params
			)
		);
		
		$statusList[''] = '-';
		$statusList += Carrinho::listStatus();
				
		$data['status']		= $statusList;
		$data['model'] 		= $this->getModel()->getPagination($pagination, $condition, null, '\Model\Carrinho');
		$data['pagination'] = $pagination->render();
					
		$this->template->title   = $this->getTitle('index');
		$this->template->content = View::forge($this->getView('index'), $data, false);								
	}	
	public function get_read($id = 0)
	{
		$model = $this->getModel($id);
		
		if($model){		
			$this->template->title   = $this->getTitle('read');
			$this->template->content = $this->getForm($model);
		}else{
			$this->template->message = \Message::forgeDefault(\Message::ALERT_NOT_FOUND);
			$this->get_index();
		}
	}	
	public function post_save()
	{				
		$model = $this->getModel(\Input::post('id'));
		
		if($model){
					
			$model->status = Carrinho::STATUS_DESPACHADO;
			$model->save();
			
			\Session::set_flash('alert', Message::ALERT_SAVE);	

			Response::redirect($this->getContext().'/'.$this->getController().'/read/'.$model->id);
			
		}else{
			
			$this->template->message = \Message::forgeDefault(\Message::ALERT_NOT_FOUND);
			$this->get_index();
		}			
	}
	private function getForm($model)
	{
		$form = View::forge($this->getView('form'));
		$form->model = $model;
					
		return $form;
	}
}