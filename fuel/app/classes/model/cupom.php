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
class Cupom extends BaseOrm
{
	protected static $_table_name = 'cupons';
	protected static $_properties = array(
		'id',
		'codigo', 
		'nome', 
		'descricao',
		'desconto',
		'publicado',
		'dt_expiracao',
		'dt_cadastro'
	);
		
	/**
	 * Pega um cupom publicado
	 * @param string $codigo
	 */
	public static function findByCodigo($codigo)
	{
		return static::find()->where(array('codigo' => $codigo, 'publicado' => 1))->get_one();
	}	
	public function getDtExpiracao()
	{
		return \Convert::to_br_date($this->dt_expiracao);
	}
	public function getDesconto()
	{
		return (int)$this->desconto;
	}
	public function getDescontoFormatado()
	{
		return $this->desconto.'%';
	}	
	public function post()
	{
		$hoje = date('Y-m-d');
		$val  =  static::getValidateSave();
		$id   = (int)\Input::post('id');
			
		if ($val->run()){
	
			$input = $val->input('data');
									
			if($id){
				$model = static::find($id)->set($input);				
			}else{
				$model = static::forge($input);
				$model->dt_cadastro = $hoje;			
			}
			
			$model->dt_expiracao = \Convert::to_en_date($input['dt_expiracao']);
	
			$model->save();
										
			return array($model, \Message::SUCCESS, \Message::ALERT_SAVE);
		}
		else{
			return array(static::forge($val->input('data')), \Message::ERROR, $val->error());
		}
	}
	public static function getValidateSave()
	{
		$id 	= (int)\Input::post('id');
		$val 	= \Validation::forge();

		$val->add_callable(new \MyValidation());

		$val->add_field('data[codigo]','Código','required')	
			->add_rule('valid_string', array('alpha', 'numeric', 'dashes'))
			->add_rule('unique_field', "cupons.codigo.{$id}");
		$val->add_field('data[nome]','Nome','required');
		$val->add_field('data[descricao]','Descrição','required');
		$val->add_field('data[desconto]','Percentual de desconto','required');
		$val->add_field('data[dt_expiracao]','Data de expiração','required');		
				
		parent::setDefaultMessageValidate($val);
			
		return $val;
	}	
}