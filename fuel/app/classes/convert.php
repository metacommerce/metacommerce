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
class Convert
{
	/**
	  Converte real para decimal
	 */
	public static function to_decimal($value = null)
	{		
		if(empty($value)){
			return '0.00';
		}
		$trans = array('R$' => '', '.' => '', ',' => '.');
		return (float)trim(strtr($value,$trans));
	}
	/**
	 Converte decimal para real
	 */
	public static function to_real($value)
	{
		$value = (float)$value;
	
		if(empty($value)){
			return 'R$ 0,00';
		}
		return 'R$'.number_format($value,2,',','.');
	}
	/**
	 * @todo
	 * Converte para o formato do MOIP
	 * @param Decimal $value
	 */
	public static function to_moip($value)
	{
		if(empty($value)){
			return 0;
		}
		return number_format($value,2,'','');
	}
	/**
	 * @todo
	 * Converte para ponto flutuante.
	 * @param Decimal $value
	 */
	public static function to_float($value)
	{									
		if(empty($value)){
			return 0;
		}		
		return (float)number_format($value,2,'.','');
	}
	/**
	 * @todo
	 * Converte para percentual.
	 * @param float $val
	 */
	public static function to_percent($val)
	{
		if(empty($val)){
			return 0;
		}		
				
		return static::to_float(($val / 100));
	}
	/**
	 * @todo
	 *	Data para o formato Americano
	 */
	public static function to_en_date($data	= null)
	{
		if($data){
			if(strpos($data,'/') !== false){
				list($dia, $mes, $ano)	= explode('/', $data);
				return "{$ano}-{$mes}-{$dia}";
			}
		}
		return $data;
	}
	/**
	* @todo
	*	Data para o formato Brasileiro
	*/
	public static function to_br_date($data = null)
	{
		if($data){
			if(strpos($data,'-') !== false){
				list($ano, $mes, $dia)	= explode('-', $data);
				return "{$dia}/{$mes}/{$ano}";
			}
		}
		
		return $data;
	}
	/**
	 * @todo
	 *	Data/Hora para o formato Brasileiro
	 */
	public static function to_br_date_hour($data = null)
	{
		if($data){
			if(strpos($data,'-') !== false){
				$dtArray = explode(' ', $data);
				list($ano, $mes, $dia)	= explode('-', $dtArray[0]);
				return "{$dia}/{$mes}/{$ano} às {$dtArray[1]}";
			}
		}
	
		return $data;
	}
}