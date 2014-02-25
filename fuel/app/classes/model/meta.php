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
class Meta extends BaseOrm
{
	protected static $_table_name = 'metas';
	protected static $_properties = array('id', 'referencia', 'referencia_id', 'title', 'description', 'keywords', 'abstract');
	
	/**
	 * @todo
	 * Retorna o formulário de metas.
	 */
	public function getForm()
	{
		return \View::forge('shared/form-metas', array('model' => $this));
	}
	/**
	 * @todo
	 * Retorna uma meta que pertence a uma referência.
	 * @param string $reference
	 * @param int $reference_id
	 */
	public static function getFromReference($referencia, $referencia_id)
	{
		return static::query()
					->where('referencia', $referencia)
					->where('referencia_id', $referencia_id)
					->get_one();
	}
	/**
	 * @todo
	 * Envia os dados para create/update
	 * @param string $referencia    = Tabela de referência
	 * @param int    $referencia_id = Chave primária na tabela de referência
	 * @param array $data
	 */
	public static function add($referencia, $referencia_id, array $data)
	{
		$meta = static::getFromReference($referencia, $referencia_id);
		
		if($meta){
			$meta->set($data);
		}else{
			$data['referencia'] 	= $referencia;
			$data['referencia_id']  = $referencia_id;
						
			$meta = static::forge($data);
		}
		$meta->save();
	}
}