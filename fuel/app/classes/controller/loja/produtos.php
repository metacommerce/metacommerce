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
use Model\Produto;
use Model\Bloco;

class Controller_Loja_Produtos extends Controller_Loja_Base
{
	public function get_index()
	{	
		$categoria	= Categoria::forge();
		$produto 	= Produto::forge();												
		$params 	= null;
		$condition 	= function(&$query){
			$query->where('produtos.publicado', 1);
		};

		$this->template->title  = "Produtos em {$this->template->loja->nome}";
		
		if($url = $this->param('categoria') ?: \Input::get('categoria')){								
			if($categoria = $categoria->findByUrl($url)){
				$condition = function(&$query) use(&$categoria){
					$query->where('produtos.publicado', 1)
						  ->where('produtos.categoria_id', $categoria->id);
				};
				$this->template->title = "{$categoria->nome} em {$this->template->loja->nome}";
				$data['titulo'] 	   = $categoria->nome;											
				$params['categoria']   = $url;
			}
		}	
		
		if($busca = \Input::get('busca')){
			$condition = function(&$query) use(&$busca){
				$query->where('produtos.publicado', 1)
					  ->where('produtos.nome', 'like', '%'.$busca.'%');
			};
			$this->template->title  = "{$busca} em {$this->template->loja->nome}";
			$data['titulo']  		= 'Resultado da busca por: '.$busca;						
			$params['busca'] 		= $busca;
		}
					
		$pagination  = Pagination::forge('pagination',
			$this->getConfigPagination(
				'produtos/index',
				$produto->getTotalItems($condition),
				$per_page = 9,
				$params
			)
		);
	
		$data['produtos']   = $produto->getPagination($pagination, $condition, null, '\Model\Produto');
		$data['pagination'] = $pagination->render();
							
		$this->template->content = View::forge($this->template->loja->template.'produtos/index', $data, false);	
	}	
	public function get_produto()
	{		
		$produto = Produto::forge();
					
		$data['produto'] = $produto->findByUrl($this->param('produto'));
					
		if($data['produto']){

			$data['sharethis']		= Bloco::findByType('sharethis');
			$data['disqus']			= Bloco::findByType('disqus');
			$data['compartilhado']  = $this->param('compartilhado');
									
			$meta = $data['produto']->getMeta();
			
			$this->template->description = $meta->description ?: $this->template->description;
			$this->template->keywords 	 = $meta->keywords	  ?: $this->template->keywords;
			$this->template->abstract 	 = $meta->abstract 	  ?: $this->template->abstract;
			$this->template->title   	 = ($meta->title) ?	  $meta->title : $data['produto']->nome;
			$this->template->content 	 = View::forge($this->template->loja->template.'produtos/show', $data, false);						
			
		}else{
			return Response::redirect('produtos');
		}
	}	
	public function post_busca()
	{
		return Response::redirect('produtos/index?busca='.\Input::post('busca'));
	}
	/*
	public function post_compartilhar()
	{
		$produto = Vitrine::getProduto((int)Input::post('id'));
		$url 	 = \Uri::base().'/produtos/'.$produto->categoria->url.'/'.$produto->url.'/';
	
		foreach(Input::post('data') as $key => $val){$$key = $val;}
			
		if(  $produto
				&& $remetente
				&& $email_remetente
				&& $destinatario
				&& $email_destinatario
				&& $mensagem){
	
			$msg = "<p>{$remetente} - {$email_remetente} lhe indicou um produto:</p>
			<p><a href='{$url}'>{$produto->nome}<a></p>
			<p>{$mensagem}</p>";
	
			\Model\BaseOrm::email($destinatario, $email_destinatario, $remetente.' lhe indicou um produto', $msg);
		}
		return Response::redirect($url.'compartilhado');
	}
	*/
}