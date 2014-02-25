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
use Model\Produto;
use Model\PayPal;
use Model\PayPalFreteFacil;
class Controller_Loja_Carrinho extends Controller_Loja_Base
{
	public function get_index()
	{
		$data['carrinho'] =& $this->template->carrinho;	
									
		$this->template->title 	 = "Seu carrinho em {$this->template->loja->nome}";
		$this->template->content = View::forge($this->template->loja->template.'carrinho/index', $data);		
	}
	public function get_add()
	{
		$carrinho 	 =& $this->template->carrinho;
		$produto_url = $this->param('produto');		
		$produto 	 = Produto::forge()->findByUrl($produto_url);
		if($produto){
			$carrinho->addProduct($produto);						
		}		
		return Response::redirect('carrinho');
	}	
	public function get_remove()
	{
		$carrinho 	 =& $this->template->carrinho;
		$produto_url =  $this->param('produto');
		$produto 	 =  Produto::forge()->findByUrl($produto_url);
		if($produto){
			$carrinho->delProduct($produto);
		}
		return Response::redirect('carrinho');		
	}
	public function post_update()
	{
		$produtos = \Input::post('produtos');
		if($produtos){
			$carrinho =& $this->template->carrinho;
			$carrinho->setProducts($produtos);
		}
		return Response::redirect('carrinho');
	}
	/**
	 * @todo
	 * Inicia processo de compra com Paypal
	 */
	public function get_paypal()
	{
		$paypal   =& $this->template->paypal;
		$carrinho =& $this->template->carrinho;

		if($carrinho->getTotalProducts() == 0){
			return \Response::redirect('carrinho');
		}
				
		if($url = $paypal->setExpressCheckout($carrinho)){
			return \Response::redirect($url);
		}else{
			die('ExpressCheckout Error');
		}
	}
	/**
	 * @todo
	 * Revisa o processo de compra do Paypal (URL DE RETORNO)
	 */
	public function get_paypal_revision()
	{
		$paypal   =& $this->template->paypal;
		$carrinho =& $this->template->carrinho;
		
		if($carrinho->getTotalProducts() == 0){
			return \Response::redirect('carrinho');
		}
				
		if($data['carrinho'] = $paypal->getExpressCheckoutDetails($carrinho)){
			$this->template->title 	 = "Revise seu pedido em {$this->template->loja->nome}";
			$this->template->content = View::forge($this->template->loja->template.'carrinho/revision', $data);			
		}else{
			die('getExpressCheckoutDetails Error');
		}		
	}
	/**
	 * @todo
	 * Confirma o processo de compra do Paypal
	 */
	public function get_paypal_confirm()
	{		
		$paypal   =& $this->template->paypal;
		$carrinho =& $this->template->carrinho;
		
		if($carrinho->getTotalProducts() == 0 ||
		   empty($carrinho->cliente_id)){		
			return \Response::redirect('carrinho');
		}
					
		if($data['carrinho'] = $paypal->doExpressCheckoutPayment($carrinho)){
			$this->template->title 	 = "Obrigado por comprar em {$this->template->loja->nome}";
			$this->template->content = View::forge($this->template->loja->template.'carrinho/confirm', $data);
		}else{
			die('doExpressCheckoutPayment Error');
		}
	}
	public function post_tax()
	{
		$carrinho =& $this->template->carrinho;
		
		$cep_destino = \Input::post('cep');
		if( ! empty($cep_destino)){
			$carrinho->addCep($cep_destino);
		}

		$cupom_desconto = Input::post('cupom');
		if( ! empty($cupom_desconto)){			
			$carrinho->addCupom($cupom_desconto);
		}
					
		return \Response::redirect('carrinho');
	}	
}