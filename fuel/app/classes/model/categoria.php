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
class Categoria extends BaseOrm
{
	protected static $_table_name = 'categorias';
	protected static $_properties = array('id', 'categoria_id', 'nome', 'url');
	
	protected static $_has_many = array(
		'produtos' => array(
			'key_from' 		 => 'id',
			'model_to' 		 => '\Model\Produto',
			'key_to' 		 => 'categoria_id',
			'cascade_save' 	 => true,
			'cascade_delete' => false,
		),
		'categorias' => array(
			'key_from' 		 => 'id',
			'model_to' 		 => '\Model\Categoria',
			'key_to' 		 => 'categoria_id',
			'cascade_save' 	 => true,
			'cascade_delete' => false,
		)
	);
	
	protected static $_belongs_to = array(			
		'categoria' => array(
			'key_from' 		 => 'categoria_id',
			'model_to' 		 => '\Model\Categoria',
			'key_to' 		 => 'id',
			'cascade_save' 	 => true,
			'cascade_delete' => false,
		)
	);
	
	/**
	 * @todo
	 * Pega uma categoria pela sua URL
	 */
	public function findByUrl($url)
	{
		return static::find()->where('url', $url)->get_one();
	}
	/**
	 * @todo
	 * Pega o total de produtos publicados na categoria
	 * @return number
	 */
	public function totalProdutosPublicados()
	{
		$data = \DB::select(\DB::expr('COUNT(*) as total'))
		->from('produtos')
		->where('categoria_id', $this->id)
		->where('publicado', 1);
							
		list($total) = $data->execute();
			
		return (int)$total['total'];
	}
	/**
	 * @todo
	 * Pega o nome do Pai
	 */
	public function getFatherName()
	{
		if($this->isChild()){
			return $this->categoria->nome;
		}
		return null;
	}
	/**
	 * @todo
	 * Verifica se a instância é filha de outra
	 * categoria.
	 */
	public function isChild()
	{
		return ! empty($this->categoria);
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
		$val->add_field('data[url]', 'URL SEO', 'required')
		->add_rule('valid_string', array('alpha', 'numeric', 'lowercase', 'dashes'))
		->add_rule('unique_field', "categorias.url.{$id}");
		
		parent::setDefaultMessageValidate($val);
			
		return $val;
	}	
}