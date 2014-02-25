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

abstract class BaseOrm extends \Orm\Model
{			
	/**
	 * @todo
	 * Paginação de resultados
	 * @param Object $pagination
	 * @param Function $condition
	 */
	public static function getPagination($pagination, $condition = null, $select = null, $object = null)
	{
		$data = \DB::select(static::$_table_name.'.*')		
		->from(static::$_table_name)
		->limit($pagination->per_page)
		->offset($pagination->offset);

		if($select){
			$data->select($select);
		}		
		if(in_array('dt_cadastro', static::$_properties)){
			$data->select(array(\DB::expr('DATE_FORMAT('.static::$_table_name.'.dt_cadastro,"%d/%m/%Y")'),'dt_cadastro'));
		}
		if($condition){
			$condition($data);
		}
	
		return $data->as_object($object)->execute();
	}
	/**
	 * @todo
	 * Total da tabela
	 * @param Function $condition
	 */
	public static function getTotalItems($condition = null)
	{
		$data = \DB::select(\DB::expr('COUNT(*) as total'))
		->from(static::$_table_name);
					
		if($condition){
			$condition($data);
		}
	
		list($total) = $data->execute();
			
		return (int)$total['total'];
	}
	/**
	 * @todo
	 * Dados para droplist
	 * @param string $key
	 * @param string $value
	 * @param string $text
	 */
	public static function formSelect($key, $value, $text, $condition = null)
	{		
		$data = static::query();
						
		if($condition){
			$condition($data);
		}	
				
		return static::createFormSelect($key, $value, $text, $data->get());
	}	
	/**
	 * @todo
	 * Cria um droplist.
	 * @param String $key
	 * @param String $value
	 * @param String $text
	 * @param Object $model
	 * @return Array
	 */
	protected static function createFormSelect($key, $value, $text, $model)
	{
		$response = array('' => $text);
		foreach($model as $m){
			$response[$m->$key] = $m->$value;
		}
		return $response;
	}	
	/**
	 * @todo
	 *  Envia uma mensagem por email
	 **/
	public static function email($nome, $_email, $assunto, $mensagem, $anexo = false)
	{
		#Carrega o pacote para email
		\Package::load('email');
			
		#Cria uma instância de email					
		$email = \Email::forge();
										
		#Define o assunto
		$email->subject($assunto);
		
		#Define o destinatário
		$email->to(array($_email));
		
		#Se tem anexo, faz o anexo
		if($anexo){
			$email->attach($anexo);
		}
		
		#Define o template de email
		$template = \View::forge('shared/emails', array('mensagem' => $mensagem), false);
				
		#Anexa o template			
		$email->html_body($template);
		
		#Tenta enviar
		try{						
			$email->send();					
		}
		catch(Exception $e){
			die($e->getMessage());			
		}
	}
	/**
	 *@todo
	 *  Verifica se é uma data futura.
	 **/
	public static function isAFutureDate($date)
	{
		$today = new \DateTime(date('Y-m-d'));
		$date  = new \DateTime(static::en_date($date));
		
		return ($date > $today);
	}
	/**
	 *@todo
	 * Define as mensagens padrões de validação.
	 * (Define por referência)
	 **/
	protected static function setDefaultMessageValidate(&$val)
	{
		$val->set_message('required',   'O campo :label é obrigatório.');
		$val->set_message('min_length', 'O campo :label deve conter no minímo 3 caracteres.');
		$val->set_message('max_length', 'O campo :label deve conter no máximo 10 caracteres.');
		$val->set_message('valid_email','O campo :label deve ser um e-mail válido.');
		$val->set_message('unique',		':value já existe.');
		$val->set_message('match_field',':label não foi confirmada.');
		$val->set_message('valid_string',':value não está no formato adequado. Remova acentos, cedilhas etc.');
		$val->set_message('unique_field',':label :value já existe para outro registro');
		$val->set_message('unique_email',':label :value já existe em nossa base');				
		$val->set_message('max_images',  'Este item ultrapassou o limite de imagens');
	}	
	/**
	 * @todo
	 *	Remove caracteres especiais de uma String.
	 */
	protected static function slug($str)
	{
		$str   = mb_strtolower($str);
		$trans = array('á' =>'a','â'=>'a','ã'=>'a','à'=>'a','é'=>'e','ê'=>'e',
				'í' =>'i','ó'=>'o','ô'=>'o','õ'=>'o','ú'=>'u','ü'=>'u',
				'ç' =>'c',' '=>'-','@'=>'-','$'=>'-','#'=>'-','*'=>'-',
				'%' =>'-','&'=>'-','+'=>'-','_'=>'-',','=>'-',"'"=>'-',
				'"' => '-',':'=>'-',';'=>'-','?'=> '-', '!'=> '-','('=>'-',
				')' => '-', '[' => '-', ']' => '-', '{' => '-', '}' => '-',
				'ñ' => 'n', '/' =>'-',"'\'"=>'-','|'=>'-','<'=>'-','>'=>'-',
				'='=>'-','§' =>'-','`'=>'-', 'º' => '');	
		return strtr($str,	$trans);
	}
}