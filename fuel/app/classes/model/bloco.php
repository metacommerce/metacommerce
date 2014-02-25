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
class Bloco extends BaseOrm
{
	protected static $_table_name = 'blocos';
	protected static $_properties = array(
		'id',		
		'tipo',
		'conteudo'		
	);	
		
	/**
	 * @todo
	 * Pega um bloco pelo seu tipo.
	 * @param string $tipo
	 */
	public static function findByType($type)
	{
		return static::query()
				->where('tipo',$type)				
				->get_one() ?: static::forge();
	}
	public static function post($input,$type)
	{
		$model = static::findByType($type);
				
		$input['tipo'] = $type;
		
		$model->set($input);
		$model->save();			
	}
	public function getConteudo()
	{
		return html_entity_decode($this->conteudo,  ENT_QUOTES, 'UTF-8');
	}
}