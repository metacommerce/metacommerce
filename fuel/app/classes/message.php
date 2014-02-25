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
class Message{	
	
	private $messages, $title, $type;
	
	const SUCCESS 						= true;
	const ERROR   						= false;
	const ALERT_SAVE 	 	 			= 1;
	const ALERT_DELETE 		 			= 2;
	const ALERT_NOT_FOUND 	 			= 3;
	const ALERT_UPLOAD_ERROR 	 		= 4;
	const ALERT_WITHOUT_PERMISSION 		= 5;
	const ALERT_CAN_NOT_DELETE 			= 6;
	const ALERT_CATEGORIA_TEM_PRODUTOS	= 7;
	const ALERT_SENDMAIL_ERROR			= 8;
	const ALERT_SENDMAIL_SUCCESS		= 9;
		
	/**
	 * @param Array/String $messages
	 * @param String $title
	 * @param String $type
	 */
	public function __construct(array $options)
	{				
		if(count($options) == 3){
			list($messages, $title, $type) = $options;
		}else{
			$messages = array();
			$title 	  = null;
			$type 	  = null;
		}
						
		$this->messages = $messages;
		$this->title 	= $title;
		$this->type 	= 'notify-'.$type;		
	}
	/**
	 * @param Array/String $messages
	 * @param String $title
	 * @param String $type
	 */
	public static function forge(array $options)
	{			
		return new static($options);
	}
	/**
	 * @param Int $alert
	 * @todo
	 * Retorna uma mensagem padrão com template
	 */
	public static function forgeDefault($alert)
	{				
		return static::forge(static::getDefaultAlert($alert))->getMessagesInTemplate();
	}
	public function getType()
	{
		return $this->type;
	}
	public function getTitle()
	{
		return $this->title;
	}	
	/**
	 * @todo Retorna uma lista de mensagens
	 */
	public function getMessages($startSeparator = '<li>', $endSeparator = '</li>')
	{		
		$content = "";
		if(is_array($this->messages)){
			foreach($this->messages as $m){
				$content.= $startSeparator.$m.$endSeparator;
			}
		}else{
			$content = $startSeparator.$this->messages.$endSeparator;
		}		
		
		return $content;
	}
	/**
	 * @todo Retorna uma lista de mensagens aplicadas no template
	 */
	public function getMessagesInTemplate($template = 'shared/message')
	{
		return \View::forge($template, array('message' => $this), false);
	}
	/**
	 * @todo Retorna um alerta padrão
	 */
	public static function getDefaultAlert($alert)
	{
		$message[static::ALERT_SAVE] = 
			array(
				'Registro salvo com sucesso',
				'Sucesso!',
				'success'
			);
		
		$message[static::ALERT_DELETE]	= 
			array(
				'Registro removido com sucesso',
				'Sucesso!',
				'success'
			);
		
		$message[static::ALERT_NOT_FOUND] = 
			array(
				'Registro não encontrado', 
				'Erro!',
				'error'
			);
			
		$message[static::ALERT_UPLOAD_ERROR] = 
			array(
				'Erro ao enviar o arquivo', 
				'Erro!',
				'error'
			);
		
		$message[static::ALERT_WITHOUT_PERMISSION] =
			array(
				'Sem permissão',
				'Erro!',
				'error'
			);
		
		$message[static::ALERT_CAN_NOT_DELETE] =
			array(
				'Você não pode deletar a si mesmo.',
				'Erro!',
				'error'
			);
		
		$message[static::ALERT_CATEGORIA_TEM_PRODUTOS] =
			array(
				'Esta categoria possui produtos associados.',
				'Erro!',
				'error'
			);
		
		$message[static::ALERT_SENDMAIL_ERROR] =
			array(
				'Sua mensagem não foi enviada. Tente preencher todos os campos.',
				'Erro!',
				'error'
			);
		
		$message[static::ALERT_SENDMAIL_SUCCESS] =
			array(
				'Sua mensagem foi enviada com sucesso.',
				'Sucesso!',
				'success'
			);
							
		return $message[$alert];
	}	
}