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
use Model\Blog;
use Model\Bloco;

class Controller_Loja_Postagens extends Controller_Loja_Base
{
	public function get_index()
	{		
		$blog 		= Blog::forge();									
		$params 	= null;
		$condition 	= function(&$query){
			$query->where('blog.publicado', 1);
		};
		
		$pagination  = Pagination::forge('pagination',
			$this->getConfigPagination(
				'postagens',
				$blog->getTotalItems($condition),
				$per_page = 10,
				$params
			)
		);
		
		$data['titulo']  	= 'Blog';
		$data['model']   	= $blog->getPagination($pagination, $condition, null, '\Model\Blog');		
		$data['pagination'] = $pagination->render();
			
		$this->template->title   	 = "Postagens em {$this->template->loja->nome}";	
		$this->template->description = "Blog oficial {$this->template->loja->nome}";		
		$this->template->content 	 = View::forge($this->template->loja->template.'postagens/index', $data, false);
	}
	public function get_postagem()
	{			
		$data['model'] = Blog::findByUrl($this->param('post_url'));
						
		if(empty($data['model'])){
			return Response::redirect('postagens');
		}
		
		$data['sharethis']	= Bloco::findByType('sharethis');
		$data['disqus']		= Bloco::findByType('disqus');
		$meta 				= $data['model']->getMeta();
		
		$this->template->description = $meta->description ?: $this->template->description;
		$this->template->keywords 	 = $meta->keywords	  ?: $this->template->keywords;
		$this->template->abstract 	 = $meta->abstract 	  ?: $this->template->abstract;
		$this->template->title   	 = ($meta->title) ?	  $meta->title : $data['model']->titulo;
		
		$this->template->content 	 = View::forge($this->template->loja->template.'postagens/show', $data, false);		
	}	
}