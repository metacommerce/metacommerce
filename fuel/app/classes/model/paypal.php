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
class PayPal extends BaseOrm
{
	private $productionMode 	 = false;
	private $sandboxEndPoint 	 = 'https://api-3t.sandbox.paypal.com/nvp';
	private $sandboxPaypalUrl 	 = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
	private $productionEndPoint	 = 'https://api-3t.paypal.com/nvp';
	private $productionPaypalUrl = 'https://www.paypal.com/cgi-bin/webscr';
			
	protected static $_table_name = 'paypal';
	protected static $_properties = array(	
		'id',
		'user',
		'signature',
		'pwd',		
	);	
		
	/**
	 * @todo
	 * Retorna modelo
	 */
	public static function getModel()
	{
		if($model = static::find('first')){
			return $model;
		}else{
			$model = static::forge();
			$model->save();
			return $model;
		}		
	}
	public function post()
	{
		$val = $this->getValidateSave();
				 
		if ($val->run()){

			$input = $val->input('data');
														
			$model = static::getModel()->set($input);
	
			$model->save();
																		
			return array(\Message::SUCCESS, \Message::ALERT_SAVE);
		}
		else{		
			return array(\Message::ERROR, $val->error());						
		}
	}
	public function getValidateSave()
	{		
		$val = \Validation::forge();
		 								
		$val->add_field('data[user]','Usuário','required');
		$val->add_field('data[pwd]','Senha','required');
		$val->add_field('data[signature]','Assinatura','required');
			
		parent::setDefaultMessageValidate($val);
				 
		return $val;
	}
	public function accounExists()
	{
		return ! empty($this->user);
	}
	/**
	 *@todo
	 *Liga o modo de produção 	 
	 * */
	public function setProductionOn()
	{
		$this->productionMode = true;
	}
	/**
	 *@todo
	 *Desliga o modo de produção
	 * */
	public function setProductionOff()
	{
		$this->productionMode = false;
	}
	/**
	 * Envia uma requisição NVP para uma API PayPal.
	 *
	 * @param array $requestNvp
	 * Define os campos da requisição.	 
	 * $productionMode
	 * Define se a requisição será feita no sandbox ou no ambiente de produção.	
	 * @return array
	 * Campos retornados pela operação da API. O array de retorno poderá
	 * pode ser vazio, caso a operação não seja bem sucedida. Nesse caso,
	 * os logs de erro deverão ser verificados.
	 */
	public function sendNvpRequest(array $requestNvp)
	{					
		//Endpoint da API
		$apiEndpoint = ($this->productionMode) ? $this->productionEndPoint : $this->sandboxEndPoint;
				
		//Executando a operação
		$curl = curl_init();
	
		curl_setopt($curl, CURLOPT_URL, $apiEndpoint);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($requestNvp));
	
		$response = urldecode(curl_exec($curl));
	
		curl_close($curl);
	
		//Tratando a resposta
		$responseNvp = array();
	
		if (preg_match_all('/(?<name>[^\=]+)\=(?<value>[^&]+)&?/', $response, $matches)) {
			foreach ($matches['name'] as $offset => $name) {
				$responseNvp[$name] = $matches['value'][$offset];
			}
		}
	
		//Verificando se deu tudo certo e, caso algum erro tenha ocorrido,
		//gravamos um log para depuração.
		if (isset($responseNvp['ACK']) && $responseNvp['ACK'] != 'Success') {
			for ($i = 0; isset($responseNvp['L_ERRORCODE' . $i]); ++$i) {
				$message = sprintf("PayPal NVP %s[%d]: %s\n",
						$responseNvp['L_SEVERITYCODE' . $i],
						$responseNvp['L_ERRORCODE' . $i],
						$responseNvp['L_LONGMESSAGE' . $i]);
	
				//die($message);
				
				$loja = Loja::getModel();							
			}
		}
	
		return $responseNvp;
	}
	public function setExpressCheckout(Carrinho $car)
	{				
		$paypalURL  = ($this->productionMode) ? $this->productionPaypalUrl : $this->sandboxPaypalUrl;		
		$return_url = \Uri::base().'carrinho/paypal-revision';
		$cancel_url = \Uri::base().'carrinho/';
		
		$requestNvp = array(
			'USER'	 	=> $this->user,
			'PWD' 		=> $this->pwd,
			'SIGNATURE' => $this->signature,
			'VERSION' 	=> '109.0',
			'METHOD'	=> 'SetExpressCheckout',
			'RETURNURL' => $return_url,
			'CANCELURL' => $cancel_url,	
			'PAYMENTREQUEST_0_PAYMENTACTION' => 'SALE',
			'PAYMENTREQUEST_0_CURRENCYCODE'  => 'BRL',
		);

		//Seta os produtos
		$this->setPaypalItems($car, $requestNvp);
					
		//Envia a requisição e obtém a resposta da PayPal
		$responseNvp = $this->sendNvpRequest($requestNvp);
		
		//Se a operação tiver sido bem sucedida, redirecionamos o cliente para o
		//ambiente de pagamento.
		if (isset($responseNvp['ACK']) && $responseNvp['ACK'] == 'Success') {
			$query = array(
				'cmd'    => '_express-checkout',
				'token'  => $responseNvp['TOKEN']
			);
									
			$car->paypal = CarrinhoPayPal::forge(array('token' => $responseNvp['TOKEN']));
			$car->save();
			
			$redirectURL = sprintf('%s?%s', $paypalURL, http_build_query($query));
			
			return $redirectURL;				
		} 
		
		return null;
	}
	public function getExpressCheckoutDetails(Carrinho $car)
	{			
		$requestNvp = array(
			'USER'	 	=> $this->user,
			'PWD' 		=> $this->pwd,
			'SIGNATURE' => $this->signature,
			'VERSION' 	=> '109.0',
			'METHOD'	=> 'GetExpressCheckoutDetails',	
			'TOKEN'		=> $car->paypal->token
		);
					
		$responseNvp = $this->sendNvpRequest($requestNvp);
						
		if (isset($responseNvp['ACK']) && $responseNvp['ACK'] == 'Success') {

			$cliente  = Cliente::createOfPaypal($responseNvp);
			$endereco = Endereco::createOfPaypal($cliente, $responseNvp);

			$car->addCep($endereco->cep);
			$car->cliente_id  = $cliente->id;
			$car->endereco_id = $endereco->id;
			$car->paypal->player_id = $responseNvp['PAYERID'];
			$car->paypal->correlation_id = $responseNvp['CORRELATIONID'];
			$car->save();
													
			return $car;
		} 

		return null;
	}
	public function doExpressCheckoutPayment(Carrinho $car)
	{					
		$requestNvp = array(
			'USER'	 	=> $this->user,
			'PWD' 		=> $this->pwd,
			'SIGNATURE' => $this->signature,
			'VERSION' 	=> '109.0',
			'METHOD'	=> 'DoExpressCheckoutPayment',
			'TOKEN'		=> $car->paypal->token,
			'PAYERID'	=> $car->paypal->player_id,			
			'PAYMENTREQUEST_0_PAYMENTACTION' => 'SALE',
			'PAYMENTREQUEST_0_CURRENCYCODE'  => 'BRL',
		);
								
		$this->setPaypalItems($car, $requestNvp);
		
		//Envia a requisição e obtém a resposta da PayPal
		$responseNvp = $this->sendNvpRequest($requestNvp);
		
		//Se a operação tiver sido bem sucedida, processa o pagamento.
		if (isset($responseNvp['ACK']) && $responseNvp['ACK'] == 'Success') {
						
			$car->pagto  = $car::PAGTO_PAYPAL;
			$car->status = $car::STATUS_PENDENTE;
			$car->frete  = $car->getFreteTotal();
			$car->paypal->transaction_id = $responseNvp['PAYMENTINFO_0_TRANSACTIONID'];
			$car->salvarCupons();
			$car->salvarProdutos();
								
			if($responseNvp['PAYMENTINFO_0_PAYMENTSTATUS'] && 
			   $responseNvp['PAYMENTINFO_0_PENDINGREASON'] == 'None')
			{				
				$car->status = $car::STATUS_COMPLETO;				
			}
			
			$car->save();
			$car->detalhes()->enviarParaCliente();			
			$car->clear();
														
			return $car;
		}
		
		return null;
	}	
	private function setPaypalItems(Carrinho &$car, &$requestNvp)
	{
		if($products = $car->listProducts()){
				
			$requestNvp['PAYMENTREQUEST_0_ITEMAMT'] 	= $car->getSubTotalComDesconto();
			$requestNvp['PAYMENTREQUEST_0_SHIPPINGAMT'] = $car->getFreteTotal();
			$requestNvp['PAYMENTREQUEST_0_AMT'] 		= $car->getCarrinhoTotal();
			$requestNvp['PAYMENTREQUEST_0_INVNUM'] 		= $car->id;
				
			$i = 0;
			foreach($products as $p){
		
				$requestNvp["L_PAYMENTREQUEST_0_NAME{$i}"] 	 = $p['produto']->nome;
				$requestNvp["L_PAYMENTREQUEST_0_NUMBER{$i}"] = $p['produto']->codigo;
				$requestNvp["L_PAYMENTREQUEST_0_DESC{$i}"] 	 = substr($p['produto']->resumo, 0, 126);
				$requestNvp["L_PAYMENTREQUEST_0_AMT{$i}"]  	 = $p['produto']->getPrice();
				$requestNvp["L_PAYMENTREQUEST_0_QTY{$i}"] 	 = $p['qtd'];
		
				$i++;
			}
		
			if($car->getDescontoTotal() > 0){
				$requestNvp["L_PAYMENTREQUEST_0_NAME{$i}"] 	= 'Cupons de desconto';
				$requestNvp["L_PAYMENTREQUEST_0_AMT{$i}"]  	= $car->getDescontoTotalNegativo();				
			}
		}
	}
}