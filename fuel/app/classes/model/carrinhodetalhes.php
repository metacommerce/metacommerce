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
namespace Model;
class CarrinhoDetalhes 
{		
	private $carrinho;
	private $subTotal;
	private $descontoTotal;
	private $freteTotal;
	
	public function __construct(Carrinho $carrinho)
	{
		$this->carrinho = $carrinho;
	}
	public function subTotal()
	{
		$subTotal = 0;
		$produtos = $this->carrinho->produtos;
		foreach($produtos as $p){
			$subTotal += $p->valorTotal();
		}
		$this->subTotal = $subTotal;
		return \Convert::to_real($this->subTotal);
	}
	public function descontoTotal()
	{			
		$descontoTotal = 0;
		$cupons = $this->carrinho->cupons;
		foreach($cupons as $c){
			$percentual = \Convert::to_percent($c->desconto);							
			$descontoTotal += ($this->subTotal * $percentual);
		}
		$this->descontoTotal = $descontoTotal;
		return \Convert::to_real($this->descontoTotal);
	}
	public function freteTotal()
	{
		$this->freteTotal = $this->carrinho->frete;		
		return \Convert::to_real($this->freteTotal);
	}	
	public function carrinhoTotal()
	{
		return \Convert::to_real(($this->subTotal + $this->freteTotal) - $this->descontoTotal);
	}
	/**
	 * @todo Envia informações do Pedido para
	 * o cliente.
	 */
	public function enviarParaCliente()
	{
		$dtCompra = $this->carrinho->getDtCadastro();	
		$produtos = $this->carrinho->produtos;
		
		$produtosArray = array();		
		foreach($produtos as $p){
			$produtosArray[] = "<p>{$p->quantidade} {$p->produto->nome}</p>";	
		}
	
		$msg = "<p>Prezado(a) <b>{$this->carrinho->cliente->nome}</b>.</p>
		<p>Confirmamos que seu pedido nº <b>{$this->carrinho->id}</b>, feito em <b>{$dtCompra}</b>, foi recebido em nosso sistema.</p>
		<p><b>Produto(s):</b></p>
	     ".implode('',$produtosArray)."		
		<p><b>Endereço de entrega:</b></p>		
		<p>{$this->carrinho->endereco->endereco}</p>
		<p>{$this->carrinho->endereco->bairro} - {$this->carrinho->endereco->cidade}</p>		
		<p>CEP {$this->carrinho->endereco->cep}</p>";
		
		BaseOrm::email($this->carrinho->cliente->nome, $this->carrinho->cliente->email, 'Informações de seu Pedido', $msg);
	}
}