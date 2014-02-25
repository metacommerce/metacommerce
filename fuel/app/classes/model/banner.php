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
class Banner extends BaseOrm
{
	protected static $_table_name = 'banners';
	protected static $_properties = array(
		'id',		
		'nome',
		'link',
		'publicado'	
	);	
	
	/**	
	 * @see \Orm\Model::delete()
	 */
	public function delete($cascade=null,$use_transaction=false)
	{			
		Arquivo::removeFromReferenceType(static::$_table_name, $this->id, 'banner');
			
		parent::delete($cascade=null,$use_transaction=false);
	}		
	public function getBanner()
	{			
		if($this->id){
			return Arquivo::getFromReferenceType(static::$_table_name, $this->id, 'banner', false);
		}
		return null;
	}
	public function setBanner($input)
	{
		if($this->id){
			$arquivo = $this->getBanner();
			if($arquivo){
				$arquivo->edit($input);
			}else{
				Arquivo::add(static::$_table_name, $this->id, 'banner', $input);
			}
		}	
	}		
	public function post()
	{
		$val =  static::getValidateSave();
		$id  = (int)\Input::post('id');
		 
		if ($val->run()){

			$input = $val->input('data');
														
			if($id){
				$model = static::find($id)->set($input);						
			}else{
				$model = static::forge($input);				
			}
	
			$model->save();
								
			$model->setBanner(\Input::file('banner'));
								
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
							
		$val->add_field('data[nome]','Nome','required');
						
		parent::setDefaultMessageValidate($val);
				 
		return $val;
	}
}