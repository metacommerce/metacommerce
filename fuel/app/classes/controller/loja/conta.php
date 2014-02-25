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
use Model\Cliente;
use Model\Carrinho;
class Controller_Loja_Conta extends Controller_Loja_Base
{
	public function get_index()
	{				
		if($cod = \Input::get('cod',false)){
			$data['alerta']	 = new Alerta($this->alerta($cod));
		}
		
		$data['titulo'] = 'Acesse sua conta';
		
		$this->template->title   = "{$data['titulo']} | {$this->template->loja->nome}";
		$this->template->content = View::forge($this->template->loja->template.'conta/index', $data, false);
	}
	public function post_entrar()
	{
		$input 	 = Input::post('login');
		$cliente = Cliente::login($input['email'], $input['senha']);
		if(empty($cliente)){
			return Response::redirect('conta?cod=01');
		}else{
			return Response::redirect('conta/pedidos');
		}						
	}
	public function get_lembrar()
	{
		if($cod = \Input::get('cod',false)){
			$data['alerta']	 = new Alerta($this->alerta($cod));
		}
		
		$data['titulo']  = 'Lembrar sua senha';
	
		$this->template->title   = "{$data['titulo']} | {$this->template->loja->nome}";
		$this->template->content = View::forge($this->template->loja->template.'conta/lembrar', $data, false);
	}
	public function post_lembrar()
	{
		$cliente = Cliente::findByEmail(\Input::post('email'));
		if(empty($cliente)){
			return Response::redirect('conta/lembrar-senha?cod=06');
		}else{
			$cliente->enviaAcessoConta();
			return Response::redirect('conta/lembrar-senha?cod=07');
		}
	}
	public function post_cadastrar()
	{
		$senha_confirmar = Input::post('senha_confirmar');
		$dt_nascimento 	 = Input::post('nascimento');
		
		$input = Input::post('cadastro');
		
		if(Cliente::findByEmail($input['email'])){			
			return Response::redirect('conta?cod=02');
		}
		
		if($input['senha'] != $senha_confirmar){
			return Response::redirect('conta?cod=03');
		}
		
		$input['nascimento']  = "{$dt_nascimento['ano']}-{$dt_nascimento['mes']}-{$dt_nascimento['dia']}";		
		$input['dt_cadastro'] = date('Y-m-d');
		
		$cliente = Cliente::forge($input);
		$cliente->save();
		$cliente->enviaAcessoConta();

		return Response::redirect('conta?cod=04');		
	}
	/**
	 * @todo Pega os pedidos do cliente autenticado
	 */
	public function get_pedidos()
	{			
		if( ! Cliente::autenticado()){
			return Response::redirect('conta');
		}	

		$condition = function(&$query) use(&$search){
			$query
				->where('carrinhos.cliente_id', \Session::get('cliente.id'))
				->order_by('carrinhos.id', 'DESC');			
		};
		
		$pagination  = Pagination::forge('pagination',
			$this->getConfigPagination(
			   'conta/pedidos',
				Carrinho::getTotalItems($condition)					
			)
		);
			
		$data['model'] 		= Carrinho::getPagination($pagination, $condition, null, '\Model\Carrinho');
		$data['pagination'] = $pagination->render();
					
		$data['titulo'] = 'Pedidos realizados';
		
		$this->template->title   = "{$data['titulo']} | {$this->template->loja->nome}";
		$this->template->content = View::forge($this->template->loja->template.'conta/pedidos', $data, false);
	}
	/**
	 * @todo Pega um pedido específico do cliente autenticado
	 */
	public function get_pedido()
	{
		if( ! Cliente::autenticado()){
			return Response::redirect('conta');
		}
					
		$carrinho = Carrinho::query()
		->where('id', (int)$this->param('id'))
		->where('cliente_id', \Session::get('cliente.id'))
		->get_one();
					
		if(empty($carrinho)){
			return Response::redirect('conta/pedidos');
		}
		
		$data['carrinho'] = $carrinho;
		$data['titulo'] = 'Detalhes do Pedido';
		
		$this->template->title   = "{$data['titulo']} | {$this->template->loja->nome}";
		$this->template->content = View::forge($this->template->loja->template.'conta/pedido', $data, false);
	}
	public function get_sair()
	{
		if(Cliente::autenticado()){
			Cliente::logout();
		}
		
		return Response::redirect('conta');
	}
	public function get_perfil()
	{
		if( ! Cliente::autenticado()){
			return Response::redirect('conta');
		}
		
		if($cod = \Input::get('cod',false)){
			$data['alerta']	 = new Alerta($this->alerta($cod));
		}
		
		$data['cliente'] = Cliente::find(\Session::get('cliente.id'));				
		$data['titulo']  = 'Editar Cadastro';
		
		$this->template->title   = "{$data['titulo']} | {$this->template->loja->nome}";
		$this->template->content = View::forge($this->template->loja->template.'conta/perfil', $data, false);
	}
	public function post_perfil()
	{
		if( ! Cliente::autenticado()){
			return Response::redirect('conta');
		}
		
		$senha = Input::post('senha');
		$senha_confirmar = Input::post('senha_confirmar');				
		$input = Input::post('cadastro');
		
		if($cliente = Cliente::findByEmail($input['email'])){
			if($cliente->id != Session::get('cliente.id')){
				return Response::redirect('conta/perfil?cod=02');
			}			
		}
		
		if( ! empty($senha)){
			if($senha != $senha_confirmar){
				return Response::redirect('conta/perfil?cod=03');
			}else{
				$input['senha'] = $senha;
			}
		}
						
		$cliente = Cliente::find(\Session::get('cliente.id'))->set($input);
		$cliente->save();
				
		return Response::redirect('conta/perfil?cod=05');		
	}	
	private function alerta($cod)
	{
		$alerta['01'] = 'Usuário não encontrado';
		$alerta['02'] = 'E-mail já cadastrado';
		$alerta['03'] = 'Senha não confirmada';
		$alerta['04'] = 'Cadastro realizado com sucesso';
		$alerta['05'] = 'Cadastro salvo com sucesso';
		$alerta['06'] = 'E-mail não encontrado';
		$alerta['07'] = 'Sua senha foi enviada para seu e-mail';
		
		return isset($alerta[$cod]) ? $alerta[$cod] : null;
	}
}