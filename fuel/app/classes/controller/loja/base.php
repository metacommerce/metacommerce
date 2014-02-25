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
use Model\Loja;
use Model\Carrinho;
use Model\PayPal;
use Model\Categoria;
use Model\Banner;
use Model\Produto;
use Model\Bloco;
use Model\Cliente;

class Controller_Loja_Base extends Controller_Hybrid
{
	var $rest_format = 'html';
	var $template 	 = 'templates/metacommerce/template';
				
	public function before()
	{	
		parent::before();
		
		#Carrega a loja
		$loja =	Loja::getModel();
		
		#Carrega o carrinho de compras
		$carrinho = Carrinho::getModel();	

		#Carrega o meio de pagamento
		$paypal  =	Paypal::getModel();
		//$paypal->setProductionOn();
		
		#Carrega as categorias PAI
		$data['categorias'] = Categoria::find()->where('categoria_id', 0)->get();
		
		#Carrega os banners publicados
		$data['banners'] 	= Banner::find()->where('publicado', 1)->get();
		
		#Carrega os produtos em destaque
		$data['produtos']	= Produto::find()->where('publicado', 1)->where('destaque', 1)->get();
					
		$stdLoja = new stdClass();
		$stdLoja->nome 				= $loja->nome;
		$stdLoja->email 			= $loja->email;
		$stdLoja->documento 		= $loja->documento;
		$stdLoja->endereco			= $loja->endereco;
		$stdLoja->cidade			= $loja->cidade;
		$stdLoja->estado			= $loja->estado;
		$stdLoja->telefone			= $loja->tel1;
		$stdLoja->template 			= 'templates/metacommerce/';
		$stdLoja->menuTopo 			= \View::forge($stdLoja->template.'menu-topo');
		$stdLoja->menuLateral 			= \View::forge($stdLoja->template.'menu-lateral', $data);
		$stdLoja->banners 				= \View::forge($stdLoja->template.'banners', $data);
		$stdLoja->produtosEmDestaque 	= \View::forge($stdLoja->template.'produtos/destaques', $data);
		
		$this->template->autenticado 	 = Cliente::autenticado();
		$this->template->loja 			 = $stdLoja;
		$this->template->carrinho	 	 = $carrinho;
		$this->template->paypal	 	 	 = $paypal;
		$this->template->title 		 	 = 'Produtos de Qualidade';
		$this->template->description 	 = 'Conheça nossos produtos';
		$this->template->keywords 	 	 = '';
		$this->template->abstract 	 	 = '';
		$this->template->controller  	 = Uri::segment(1);			
		$this->template->google 		 = Bloco::findByType('google');
	}
	/**
	 * @todo
	 * Pega a configuração básica da paginação.
	 * @return Array
	 */
	protected function getConfigPagination($action, $total_items, $per_page = 10, $params = null)
	{
		$params = ($params)? '/?'.http_build_query($params) : null;
		$config = array(
			'pagination_url' => \Uri::base().$action.$params,
			'total_items'    => $total_items,
			'per_page'       => $per_page,
			'uri_segment'    => 'page'
		);	
		return $config;
	}
}