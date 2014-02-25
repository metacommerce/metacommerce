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
class MyValidation
{	
	/**
	 * @todo
	 * Verifica se um campo é único	
	 * @param string $val
	 * @param string $options
	 */
	public static function _validation_unique_field($val, $options)
	{
		list($table, $field, $id) = explode('.', $options);
		
		$result = DB::select('id', $field)
					->from($table)
					->where($field, '=',  Str::lower($val))					
					->execute()
					->current();
				
		return (isset($result['id'])) ? ($result['id'] == $id) : true;
	}	
	/**
	 * @todo
	 * Verifica se produto está dentro 
	 * do limite máximo de fotos.
	 * @param string $val
	 * @param string $options
	 */
	public static function _validation_max_images($id, $limite)
	{
		$id 	= (int)$id;
		$limite = (int)$limite;
		$inputs = \Model\Arquivo::prepareInputs(\Input::file('galeria'));
		$total  = 0;
		foreach($inputs as $input){
			if(\Model\Arquivo::isValidInput($input)){
				++$total;
			}
		}		
		if(empty($id) && $total > $limite){
			return false;
		}else{		
			if($produto = \Model\Produto::find($id)){
				if((count($produto->getGaleria()) + $total) > $limite){
					return false;
				}
			}
		}		
		return true;
	}

}