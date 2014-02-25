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
class Carrinho extends BaseOrm
{	
	const STATUS_CRIADO 	= 1;
	const STATUS_PENDENTE 	= 2;
	const STATUS_COMPLETO 	= 3;
	const STATUS_DESPACHADO	= 4;
	
	const PAGTO_CRIADO 		= 1;
	const PAGTO_PAYPAL 		= 2;
			
	private $sub_total 	 	= 0;
	private $frete_total 	= 0;
	private $desconto_total = 0;
	private $carrinho_total = 0;
	private $prazo_entrega  = 0;
	private $margem_entrega = 2; #tempo para despachar os produtos
	
	private $detalhes;
		
	protected static $_table_name = 'carrinhos';
	protected static $_properties = array(
		'id',
		'cliente_id',
		'endereco_id',
		'status', 
		'pagto',
		'frete',
		'dt_cadastro'
	);
		
	protected static $_has_many = array(
		'produtos' => array(
			'key_from' 		 => 'id',
			'model_to' 		 => '\Model\CarrinhoProduto',
			'key_to' 		 => 'carrinho_id',
			'cascade_save' 	 => true,
			'cascade_delete' => false,
		),
		'cupons' => array(
			'key_from' 		 => 'id',
			'model_to' 		 => '\Model\CarrinhoCupom',
			'key_to' 		 => 'carrinho_id',
			'cascade_save' 	 => true,
			'cascade_delete' => false,
		)
	);
	
	protected static $_belongs_to = array(
		'cliente' => array(
			'key_from' 		 => 'cliente_id',
			'model_to' 		 => '\Model\Cliente',
			'key_to' 		 => 'id',
			'cascade_save' 	 => true,
			'cascade_delete' => false,
		),
		'endereco' => array(
			'key_from' 		 => 'endereco_id',
			'model_to' 		 => '\Model\Endereco',
			'key_to' 		 => 'id',
			'cascade_save' 	 => true,
			'cascade_delete' => false,
		)
	);
	
	protected static $_has_one = array(
		'paypal' => array(
			'key_from' => 'id',
			'model_to' => '\Model\CarrinhoPayPal',
			'key_to'   => 'carrinho_id',
			'cascade_save'   => true,
			'cascade_delete' => false,
		)
	);
	
	/**
	 * @todo
	 * Pega uma instância de carrinho de compras
	 */
	public static function getModel()
	{
		return static::getInstance();
	}
	/**
	 * @todo
	 * Pega uma instância de carrinho de compras
	 */
	public static function getInstance()
	{		
		$agora = date('Y-m-d H:i:s');
		
		if($carrinho = static::find((int)\Session::get('carrinho.id'))){			
			return $carrinho;
		}else{			
			$carrinho = static::forge(
				array(
					'dt_cadastro' 	=> $agora, 
					'status' 		=> static::STATUS_CRIADO,
					'pagto'			=> static::PAGTO_CRIADO,
					'cliente_id' 	=> 0,
					'endereco_id'	=> 0,
					'frete'			=> 0
				)
			);
			
			$carrinho->save();
											
			\Session::set('carrinho.id', (int)$carrinho->id);
			
			return $carrinho;
		}
	}
	/**
	 * @todo
	 * Lista os tipos de Status
	 */
	public static function listStatus()
	{
		$status[static::STATUS_CRIADO] 	   = 'Criado';
		$status[static::STATUS_PENDENTE]   = 'Pendente';
		$status[static::STATUS_COMPLETO]   = 'Aprovado';
		$status[static::STATUS_DESPACHADO] = 'Despachado';
					
		return $status;
	}
	/**
	 * @todo
	 * Lista os tipos de formas de Pagamento
	 */
	public static function listPagto()
	{
		$pagto[static::PAGTO_CRIADO] = 'Criado';
		$pagto[static::PAGTO_PAYPAL] = 'PayPal';
					
		return $pagto;
	}	
	/**
	 * @todo
	 * Pega o status atual do carrinho
	 */
	public function getStatus()
	{
		$status = $this->listStatus();
		
		return $status[$this->status];
	}
	/**
	 * @todo
	 * Pega a forma de pagamento do carrinho
	 */
	public function getPagto()
	{
		$pagto = $this->listPagto();
	
		return $pagto[$this->pagto];
	}
	/**
	 * @todo
	 * Pega a data de criação do carrinho
	 */
	public function getDtCadastro()
	{
		return \Convert::to_br_date_hour($this->dt_cadastro);
	}
	/**
	 * @todo
	 * Limpa o carrinho
	 */
	public function clear()
	{
		\Session::delete('carrinho');
		\Session::delete('carrinho.id');
		\Session::delete('carrinho.produtos');
		\Session::delete('carrinho.cep');
		\Session::delete('carrinho.cupons');
	}
	/**
	 * @todo
	 * Retorna informações sobre uma instância de carrinho de compras
	 */
	public function getInfo()
	{
		$totalDeProdutos = $this->getTotalProducts();
		$info = null;
		switch($totalDeProdutos){
			case 0 :
				$info = 'Seu carrinho está vazio';
			break;
			case 1 :
				$info = "{$totalDeProdutos} Produto";
			break;
			default:
				$info = "{$totalDeProdutos} Produtos";
		}
		return $info;
	}
	/**
	 * @todo
	 * Adiciona o cep de destino em uma instância de carrinho de compras
	 */
	public function addCep($cep)
	{
		\Session::set('carrinho.cep', $cep);
	}
	/**
	 * @todo
	 * Pega o cep de destino em uma instância de carrinho de compras
	 */
	public function getCep()
	{
		return \Session::get('carrinho.cep');
	}
	/**
	 * @todo
	 * Adiciona um cupom de desconto em uma instância de carrinho de compras
	 */
	public function addCupom($codigo)
	{					
		$cupom = Cupom::findByCodigo($codigo);
		if($cupom){
			$dtHoje = new \DateTime(date('Y-m-d'));
			$dtExp  = new \DateTime($cupom->dt_expiracao);
			if($dtExp >= $dtHoje){	
				$cupons = $this->getCupons();
				if(array_key_exists($cupom->codigo, $cupons) == false){
					$cupons[$cupom->codigo] = $cupom->getDesconto();
					\Session::set('carrinho.cupons', $cupons);
				}							
			}
		}		
	}
	/**
	 * @todo
	 * Pega cupons de desconto de uma instância de carrinho de compras
	 */
	public function getCupons()
	{
		return (array)\Session::get('carrinho.cupons') ?: array();
	}
	/**
	 * @todo
	 * Guarda os cupons do carrinho no banco de dados
	 */
	public function salvarCupons()
	{
		$cupons = $this->getCupons();
		if($cupons){
			foreach($cupons as $codigo => $desconto){
				$carrinhoCupom = CarrinhoCupom::forge(array(
					'carrinho_id' => $this->id,
					'codigo'  	  => $codigo,
					'desconto'    => $desconto,					
				));
				$carrinhoCupom->save();
			}			
		}
	}
	/**
	 * @todo
	 * Adiciona produtos em uma instância de carrinho de compras
	 */
	public function addProduct(Produto $produto)
	{
		$produtos = $this->getProducts();
								
		if(array_key_exists($produto->id, $produtos)){			
			$produtos[$produto->id] += 1;
		}else{
			$produtos[$produto->id] = 1;			
		}		
				
		\Session::set('carrinho.produtos', $produtos);
	}
	/**
	 * @todo
	 * Remove produtos de uma instância de carrinho de compras
	 */
	public function delProduct(Produto $produto)
	{
		$produtos = $this->getProducts();
	
		if(array_key_exists($produto->id, $produtos)){
			unset($produtos[$produto->id]);
		}
	
		\Session::set('carrinho.produtos', $produtos);
	}
	/**
	 * @todo
	 * Pega produtos de uma instância de carrinho de compras
	 */
	public function getProducts()
	{
		return (array)\Session::get('carrinho.produtos') ?: array();
	}
	/**
	 * @todo
	 * Seta os produtos de uma instância de carrinho de compras
	 */
	public function setProducts($produtos)
	{
		\Session::set('carrinho.produtos', $produtos);	
	}
	/**
	 * @todo
	 * Pega o total de produtos de uma instância de carrinho de compras
	 */
	public function getTotalProducts()
	{
		return count($this->getProducts());
	}	
	/**
	 * @todo
	 * Lista os produtos da base de acordo com os produtos da instância de carrinho de compras
	 */
	public function listProducts()
	{							
		(float)$sub_total 	= 0;
		(float)$frete_total = 0; 
								
		$produtos = $this->getProducts();
		
		if($produtos){
			
			$produtos_db = array();
			
			foreach($produtos as $id => $qtd){

				$preco_frete = 0;
				$preco_total = 0;	
							
				$produto = Produto::findById($id);
				
				if($produto){
					$preco_frete	= $this->calcFrete($produto, $qtd);													
					$preco_total 	= $this->calcPrecoTotal($produto, $qtd);
																		
					$sub_total 		+= $preco_total;
					$frete_total	+= $preco_frete;
														
					$produtos_db[$id]['produto'] 			 = $produto;
					$produtos_db[$id]['precoTotal'] 		 = $preco_total;
					$produtos_db[$id]['precoTotalFormatado'] = \Convert::to_real($preco_total);
					$produtos_db[$id]['qtd'] 	 			 = $qtd;					
				}				
			}	
					
			$this->setSubTotal($sub_total);	
			$this->setFreteTotal($frete_total);	
			$this->calcCupom();
			$this->calCarrinho();
									
			return $produtos_db;
		}
		return array();
	}
	/**
	 * @todo
	 * Guarda os produtos do carrinho no banco de dados
	 */
	public function salvarProdutos()
	{
		$produtos = $this->getProducts();
		if($produtos){
			foreach($produtos as $id => $qtd){
				$produto = Produto::findById($id);				
				if($produto){
					$carrinhoProduto = CarrinhoProduto::forge(array(
						'carrinho_id' => $this->id,
						'produto_id'  => $produto->id,
						'quantidade'  => $qtd,
						'valor'		  => $produto->getPrice()							
					));					
					$carrinhoProduto->save();
				}
			}			
		}
	}

	/**
	 * @todo
	 * Calcula o valor total do produto no carrinho
	 * produto x qtd
	 */
	private function calcPrecoTotal(Produto $produto, $qtd)
	{
		return ($produto->getPrice() * $qtd);
	}
	/**
	 * @todo
	 * Calcula o valor do frete do produto no carrinho
	 * frete x qtd
	 */
	private function calcFrete(Produto $produto, $qtd)
	{
		if($CEPdestino = $this->getCep()){
									
			////////////////////////////////////////////////
			// Código dos Serviços dos Correios
			// 41106 PAC
			// 40010 SEDEX
			// 40045 SEDEX a Cobrar
			// 40215 SEDEX 10
			////////////////////////////////////////////////
			
			$servico 	 = 41106;
			$CEPorigem   = Loja::getModel()->cep;
			$peso 	 	 = $produto->peso;
			$altura	 	 = $produto->altura;					
			$largura 	 = $produto->largura;
			$comprimento = $produto->comprimento;
			$valorDeclarado = '1.00';
														
			// URL do WebService
			$correios = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=".$CEPorigem."&sCepDestino=".$CEPdestino."&nVlPeso=".$peso."&nCdFormato=1&nVlComprimento=".$comprimento."&nVlAltura=".$altura."&nVlLargura=".$largura."&sCdMaoPropria=n&nVlValorDeclarado=".$valorDeclarado."&sCdAvisoRecebimento=n&nCdServico=".$servico."&nVlDiametro=0&StrRetorno=xml";
			
			// Carrega o XML de Retorno
			$xml = simplexml_load_file($correios);
					
			// Verifica se não há erros
			if($xml->cServico->Erro == '0'){
				
				$this->prazo_entrega = (int)$xml->cServico->PrazoEntrega;
				
				(float)$valorFrete 	 = \Convert::to_decimal($xml->cServico->Valor);
				
				return $valorFrete * $qtd;
			}						
		}
		
		return 0;
	}
	
	/**
	 * @todo
	 * Calcula os descontos sobre o subtotal do carrinho
	 */
	private function calcCupom()
	{	
		$desconto_total = 0;
		$sub_total 		= $this->getSubTotal();				
		$cupons 		= $this->getCupons();
		if( ! empty($cupons)){
			foreach($cupons as $codigo => $desconto){				
				$desconto_percentual = \Convert::to_percent($desconto);
				if($desconto_percentual > 0){									
					$desconto_total += ($sub_total * $desconto_percentual);					
				}								
			}			
			$this->setDescontoTotal($desconto_total);
		}				
	}
	/**
	 * @todo
	 * Calcula o total do carrinho
	 */
	private function calCarrinho()
	{
		$sub_total = $this->getSubTotal();
		$frete_total = $this->getFreteTotal();
		$desconto_total = $this->getDescontoTotal();
		
		$this->setCarrinhoTotal(($sub_total + $frete_total) - $desconto_total);
	}
	
	// Prazo	
	public function getPrazo()
	{
		$CEPdestino   = $this->getCep();
		$prazoEntrega = $this->prazo_entrega;
		
		if($CEPdestino && $prazoEntrega > 0){
			$prazoEntrega += $this->margem_entrega;
			return "<span class='prazo'>{$prazoEntrega} dias úteis para o CEP {$CEPdestino}</span>";
		}else{
			return '-';
		}
	}
	
	//SubTotal
	private function setSubTotal($val)
	{
		$this->sub_total = \Convert::to_float($val);		
	}	
	public function getSubTotal()
	{
		return \Convert::to_float($this->sub_total);
	}	
	/**
	 * @todo
	 * Para uso com PayPal
	 */
	public function getSubTotalComDesconto()
	{
		$sub_total = $this->getSubTotal();
		$desconto_total = $this->getDescontoTotal();
	
		return ($sub_total - $desconto_total);
	}
	public function getSubTotalFormatado()
	{
		return \Convert::to_real($this->getSubTotal());
	}
	
	//Frete Total
	private function setFreteTotal($val)
	{
		$this->frete_total = \Convert::to_float($val);
	}
	public function getFreteTotal()
	{
		return \Convert::to_float($this->frete_total);
	}
	public function getFreteTotalFormatado()
	{
		return \Convert::to_real($this->getFreteTotal());
	}
	
	//Desconto Total	
	private function setDescontoTotal($val)
	{
		$this->desconto_total = \Convert::to_float($val);
	}
	public function getDescontoTotal()
	{
		return \Convert::to_float($this->desconto_total);
	}
	/**
	 * @todo
	 * Para uso com PayPal	 
	 */
	public function getDescontoTotalNegativo()
	{
		$desconto_total = $this->getDescontoTotal();
		
		return (($desconto_total - $desconto_total) - $desconto_total);
	}
	public function getDescontoTotalFormatado()
	{
		$desconto_total = $this->getDescontoTotal();
		
		return ($desconto_total > 0) ? \Convert::to_real($desconto_total) : '-';
	}
	
	//Carrinho Total
	private function setCarrinhoTotal($val)
	{								
		$this->carrinho_total = \Convert::to_float($val);
	}
	public function getCarrinhoTotal()
	{			
		return \Convert::to_float($this->carrinho_total);
	}	
	public function getCarrinhoTotalFormatado()
	{
		return \Convert::to_real($this->getCarrinhoTotal());
	}
	
	//Detalhes de um carrinho armazenado no banco
	public function detalhes()
	{
		if(empty($this->detalhes)){
			$this->detalhes = new CarrinhoDetalhes($this);					
		}
		
		return $this->detalhes;
	}
}