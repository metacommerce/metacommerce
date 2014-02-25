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
class CarrinhoProduto extends BaseOrm
{	
	protected static $_table_name = 'carrinhos_produtos';
	protected static $_properties = array('id', 'carrinho_id', 'produto_id', 'quantidade', 'valor');
		
	protected static $_belongs_to = array(			
		'carrinho' => array(
			'key_from' 		 => 'carrinho_id',
			'model_to' 		 => '\Model\Carrinho',
			'key_to' 		 => 'id',
			'cascade_save' 	 => true,
			'cascade_delete' => false,
		),
		'produto' => array(
			'key_from' 		 => 'produto_id',
			'model_to' 		 => '\Model\Produto',
			'key_to' 		 => 'id',
			'cascade_save' 	 => true,
			'cascade_delete' => false,
		)
	);	
	
	public function valor()
	{
		return \Convert::to_float($this->valor);
	}
	public function valorFormatado()
	{
		return \Convert::to_real($this->valor());
	}
	public function valorTotal()
	{
		return ($this->valor() * $this->quantidade);
	}
	public function valorTotalFormatado()
	{
		return \Convert::to_real($this->valorTotal());
	}
}