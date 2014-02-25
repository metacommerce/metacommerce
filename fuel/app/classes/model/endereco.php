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
class Endereco extends BaseOrm
{
	protected static $_table_name = 'enderecos';
	protected static $_properties = array(
		'id',		
		'cliente_id',
		'cep',
		'endereco',
		'bairro',
		'cidade',
		'estado',
		'complemento'		
	);	
		
	/**
	 * @todo
	 * Pega um endereço pelo cliente e pelo CEP	
	 */
	public static function findByClienteCep($cliente_id, $cep)
	{
		return static::query()
				->where(array('cliente_id' => $cliente_id, 'cep' => $cep))				
				->get_one();
	}
	/**
	 * @todo
	 * Cria um endereço a partir do Paypal
	 */	
	public static function createOfPaypal($cliente, $responseNvp)
	{
		$endereco = static::findByClienteCep($cliente->id, $responseNvp['SHIPTOZIP']);
		if(empty($endereco)){
			$endereco = Endereco::forge(array(
				'cliente_id'  => $cliente->id,
				'cep' 		  => static::issetIndex($responseNvp, 'SHIPTOZIP'),
				'endereco' 	  => static::issetIndex($responseNvp, 'SHIPTOSTREET'),
				'bairro' 	  => static::issetIndex($responseNvp, 'SHIPTOSTREET2'),
				'cidade' 	  => static::issetIndex($responseNvp, 'SHIPTOCITY'),
				'estado' 	  => static::issetIndex($responseNvp, 'SHIPTOSTATE'),
				'complemento' => static::issetIndex($responseNvp, 'PAYMENTREQUEST_0_NOTETEXT')			
			));
			$endereco->save();
			return $endereco;
		}
		return $endereco;
		
	}
	private static function issetIndex($val, $index)
	{
		return isset($val[$index]) ? $val[$index] : null;
	}
}