<div class="grid-24">																					
	<div class="widget">			
		<div class="widget-content">
						
			<?php echo Form::open(array('action' => 'adm/produtos/save', 'class' => 'form validateForm', 'enctype' => 'multipart/form-data')); ?>
				
				<?php echo Form::hidden('id', $model->id);?>	
																					
				<fieldset class="fieldset-permissions">
					<legend>Configurações</legend>
					<div class="field-group">
						<div class="field">
							<?php echo Form::hidden('data[publicado]', 0);?>	
							<?php echo Form::checkbox('data[publicado]',  1, (bool)$model->publicado, array('id' => 'publicado', 'class' => ''));?>	
							Produto publicado
							|						
							<?php echo Form::hidden('data[destaque]', 0);?>	
							<?php echo Form::checkbox('data[destaque]',  1, (bool)$model->destaque, array('id' => 'destaque', 'class' => ''));?>	
							Produto em destaque						
						</div>
					</div>
				</fieldset>
								
				<?php echo $model->getMeta()->getForm();?>
				
				<div class="field-group">
					<label for="categoria_id">Categoria</label>
					<div class="field">
						<?php echo Form::select('data[categoria_id]',  $model->categoria_id, $categorias, array('id' => 'categoria_id', 'class' => ''));?>
					</div>
				</div>	
				
				<div class="field-group">
					<label for="codigo">Código(SKU)</label>
					<div class="field">
						<?php echo Form::input('data[codigo]',  $model->codigo, array('placeholder' => 'codigo', 'id' => 'código', 'size' => '32', 'class' => ''));?>	
					</div>
				</div>																									
				<div class="field-group">
					<label for="nome">Nome</label>
					<div class="field">
						<?php echo Form::input('data[nome]',  $model->nome, array('placeholder' => 'Nome', 'id' => 'nome', 'size' => '62', 'class' => ''));?>	
					</div>
				</div>
				<div class="field-group">
					<label for="url" title="exemplo-de-url-otimizada-do-produto">URL SEO do produto</label>
					<p>Evite acentos e caracteres especiais. Hífens são permitidos.</p>
					<div class="field">
						<?php echo Form::input('data[url]',  $model->url, array('placeholder'  => 'Ex.: url-otimizada-do-produto', 'id' => 'url', 'size' => '62', 'class' => ''));?>	
					</div>
				</div>
				
				<div class="field-group">
					<label for="url_video">Link do vídeo do produto no Youtube/Vimeo</label>
					<div class="field">
						<?php echo Form::input('data[url_video]',  $model->url_video, array('placeholder'  => 'Ex.: http://www.youtube.com/watch?v=wLcSi8o0HI0', 'id' => 'url_video', 'size' => '62', 'class' => ''));?>	
					</div>
				</div>
				
				<?php if($iframe = $model->getVideoIframe()):?>
					<div class="field-group">						
						<div class="field">
							<?php echo $iframe?>	
						</div>
					</div>
				<?php endif?>
				  
				<div class="field-group">
					<label for="valor_compra">Valor de compra</label>
					<div class="field">
						<?php echo Form::input('data[valor_compra]',  $model->valor_compra, array('placeholder' => 'Ex.: R$100,00', 'id' => 'valor_compra', 'size' => '32', 'class' => 'real'));?>	
					</div>
				</div>
				
				<div class="field-group">
					<label for="valor_venda">Valor de venda</label>
					<div class="field">
						<?php echo Form::input('data[valor_venda]',  $model->valor_venda, array('placeholder' => 'Ex.: R$100,00', 'id' => 'valor_venda', 'size' => '32', 'class' => 'real'));?>	
					</div>
				</div>
				
				<div class="field-group">
					<label for="valor_promocional">Valor Promocional</label>
					<div class="field">
						<?php echo Form::input('data[valor_promocional]',  $model->valor_promocional, array('placeholder' => 'Ex.: R$100,00', 'id' => 'valor_promocional', 'size' => '32', 'class' => 'real'));?>	
					</div>
				</div>
				
				<div class="field-group">
					<label for="peso">Peso(KG)</label>
					<p class="fs15">
					 O peso deve ser informado em Kilogramas. Caso a embalagem tenha menos do que 1 Kilograma, <br>
					  300 gramas por exemplo, o valor informado deverá ser 0.3.
					</p>
					<div class="field">
						<?php echo Form::input('data[peso]',  $model->peso, array('placeholder' => 'Peso', 'id' => 'peso', 'size' => '32', 'class' => 'peso'));?>	
					</div>
				</div>
				
				<div class="field-group">
					<label for="comprimento">Comprimento(cm)</label>
					<p class="fs15">O comprimento da embalagem deve ficar entre 16 e 90 centímetros.</p>
					<div class="field">
						<?php echo Form::input('data[comprimento]', $model->comprimento, array('placeholder' => 'Comprimento', 'id' => 'comprimento', 'size' => '32', 'class' => 'frete'));?>	
					</div>
				</div>
				
				<div class="field-group">
					<label for="altura">Altura(cm)</label>
					<p class="fs15">
						A altura da embalagem deve ficar entre 2 e 90 centímetros. <br>
						A altura da embalagem não pode ser maior do que o comprimento.
					</p>
					<div class="field">
						<?php echo Form::input('data[altura]', $model->altura, array('placeholder' => 'Altura', 'id' => 'altura', 'size' => '32', 'class' => 'frete'));?>	
					</div>
				</div>
				
				<div class="field-group">
					<label for="largura">Largura(cm)</label>
					<p class="fs15">
						A largura da embalagem deve ficar entre 5 e 90 centímetros. <br>
						A largura da embalagem não pode ser menor do que o 11 centímetros quando o comprimento for menor do que 25 centímetros.
					</p>
					<div class="field">
						<?php echo Form::input('data[largura]', $model->largura, array('placeholder' => 'Largura', 'id' => 'largura', 'size' => '32', 'class' => 'frete'));?>	
					</div>
				</div>							
				
				<p class="fs15">
					A soma da altura, largura e comprimento da embalagem não pode ser maior do que 160 centímetros.
				</p>
											
				<div class="field-group">
					<label for="resumo">Resumo do produto</label>
					<div class="field">
						<?php echo Form::textarea('data[resumo]',  $model->resumo, array('placeholder' => 'Resumo', 'id' => 'resumo', 'cols' => '115', 'rows' => '5', 'class' => ''));?>	
					</div>
				</div>
				
				<div class="field-group">
					<label for="descricao">Detalhes do produto</label>
					<div class="field">
						<?php echo Form::textarea('data[detalhes]',  $model->detalhes, array('placeholder' => 'Detalhes', 'id' => 'detalhes', 'cols' => '40', 'rows' => '5', 'class' => 'ckeditor'));?>	
					</div>
				</div>
				
				<div class="field-group">
					<label for="caracteristicas">Outras Características</label>
					<div class="field">
						<?php echo Form::textarea('data[caracteristicas]',  $model->caracteristicas, array('placeholder' => 'Características', 'id' => 'caracteristicas', 'cols' => '40', 'rows' => '5', 'class' => 'ckeditor'));?>	
					</div>
				</div>	
					
				<div class="field-group">
					<label for="observacoes">Observações Internas</label>
					<div class="field">
						<?php echo Form::textarea('data[observacoes]',  $model->observacoes, array('placeholder' => 'Observações Internas', 'id' => 'observacoes', 'cols' => '40', 'rows' => '5', 'class' => 'ckeditor'));?>	
					</div>
				</div>	
				
				<div class="field-group">
					<label for="resumo">Produtos Relacionados</label>
					<p>Insira os códigos dos produtos (*publicados) relacionados a este (Ex.: cod1,cod2,cod3).</p>
					<div class="field">
						<?php echo Form::textarea('data[produtos_relacionados]',  $model->produtos_relacionados, array('placeholder' => 'Produtos Relacionados', 'id' => 'produtos_relacionados', 'cols' => '40', 'rows' => '5', 'class' => ''));?>	
					</div>
				</div>
						
				<div class="field-group">
					<label for="foto">Foto principal:</label>					
					<div class="field">												
						<?php if($foto = $model->getFoto()):?>							
							<p><?php echo Html::img("uploads/arquivos/{$foto->id}/thumb-{$foto->nome}");?></p>
						<?php endif?>
						<?php echo Form::file('foto'); ?>						
					</div>															
				</div>
					
				<?php for($i=1;$i<6;$i++):?>					
					<div class="field-group">
						<label for="galeria">Foto de galeria <?php echo $i?>:</label>					
						<div class="field">						
							<?php echo Form::file('galeria[]'); ?>
						</div>															
					</div>
				<?php endfor;?>
				
				<div class="field-group">
					<label for="manual">
						Manual PDF (opcional):
						<?php if($manual = $model->getManual()):?>						
							<?php  echo Html::anchor("uploads/arquivos/{$manual->id}/{$manual->nome}", 'download', array('target' => '_blank'));?>
							-
							<?php  echo Html::anchor("adm/produtos/del_file/{$model->id}/{$manual->id}", 'excluir', array('data-confirm' => 'Tem certeza que deseja excluir este registro?'));?>						
						<?php endif;?>
					</label>					
					<div class="field">						
						<?php echo Form::file('manual'); ?>
					</div>
				</div>
				<div class="field-group">
					<label for="folheto">
						Folder PDF (opcional):
						<?php if($folheto = $model->getFolheto()):?>						
							<?php  echo Html::anchor("uploads/arquivos/{$folheto->id}/{$folheto->nome}", 'download', array('target' => '_blank'));?>
							-	
							<?php  echo Html::anchor("adm/produtos/del_file/{$model->id}/{$folheto->id}", 'excluir', array('data-confirm' => 'Tem certeza que deseja excluir este registro?'));?>					
						<?php endif;?>
					</label>					
					<div class="field">						
						<?php echo Form::file('folheto'); ?>
					</div>
				</div>
				<?php if($fotos = $model->getGaleria()):?>
					<div>																					
					<div class="widget">
						<div class="widget-header">
							<span class="icon-article"></span>
							<h3><a href="javascript:;" data-open="#box-fotos">Fotos enviadas para a galeria</a></h3>
						</div>			
						<div class="widget-content hide" id="box-fotos">
						 	<?php foreach($fotos as $f):?>
								<p style="float:left;margin-left:10px;">
									<?php echo Html::img("uploads/arquivos/{$f->id}/thumb-{$f->nome}");?>
									<br>
									<?php  echo Html::anchor("adm/produtos/del_file/{$model->id}/{$f->id}", 'excluir', array('data-confirm' => 'Tem certeza que deseja excluir este registro?'));?>							
								</p>
						<?php endforeach;?>						
						</div> <!-- .widget-content -->
					</div> <!-- .widget -->																
					</div> <!-- .grid -->	
					<br>
				<?php endif;?>
					
				<div class="actions">	
					<button type="submit" class="btn btn-primary btn-small" tabindex="3">Salvar</button>
					<?php echo Html::anchor('adm/produtos', 'Cancelar', array('class' => 'btn btn-error btn-small')); ?>
				</div>
			<?php echo Form::close(); ?>
		</div>
	</div>
</div>