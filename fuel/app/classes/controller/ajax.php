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
use Model\Cidade;
class Controller_Ajax extends Controller_Rest
{
	/*
	 * @TODO
	 * Lista as cidades do estado informado.
	 */
	public function get_cidades()
	{
		$estado_id = (int)\Input::get('id');
		$condition = function($query) use($estado_id){
			$query->where('estado_id',$estado_id);
		};
		
		$data['cidades'] = Cidade::FormSelect('id', 'nome', 'Cidade', $condition);
				
		$this->response(View::forge('ajax/cidades', $data));
	}
}