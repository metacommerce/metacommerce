<div class="grid-24">																					
	<div class="widget">			
		<div class="widget-content">
						
			<?php echo Form::open(array('action' => 'adm/blog/save', 'class' => 'form validateForm', 'enctype' => 'multipart/form-data')); ?>
				
				<?php echo Form::hidden('id', $model->id);?>	
								
				<fieldset class="fieldset-permissions">
					<legend>Configurações</legend>
					<div class="field-group">
						<div class="field">
							<?php echo Form::hidden('data[publicado]', 0);?>	
							<?php echo Form::checkbox('data[publicado]',  1, (bool)$model->publicado, array('id' => 'publicado', 'class' => ''));?>	
							Postagem publicada										
						</div>
					</div>
				</fieldset>
								
				<?php echo $model->getMeta()->getForm();?>
																												
				<div class="field-group">
					<label for="nome">Título</label>
					<div class="field">
						<?php echo Form::input('data[titulo]',  $model->titulo, array('placeholder' => 'Título', 'id' => 'titulo', 'size' => '62', 'class' => ''));?>	
					</div>
				</div>
				<div class="field-group">
					<label for="url" title="url-otimizada-para-o-google">URL SEO da postagem</label>
					<p>Evite acentos e caracteres especiais. Hífens são permitidos.</p>
					<div class="field">
						<?php echo Form::input('data[url]',  $model->url, array('placeholder'  => 'url-otimizada-para-o-google', 'id' => 'url', 'size' => '62', 'class' => ''));?>	
					</div>
				</div>
				  							
				<div class="field-group">
					<label for="resumo">Resumo</label>
					<div class="field">
						<?php echo Form::textarea('data[resumo]',  $model->resumo, array('placeholder' => 'Resumo', 'id' => 'resumo', 'cols' => '115', 'rows' => '5', 'class' => ''));?>	
					</div>
				</div>
				<div class="field-group">
					<label for="conteudo">Conteúdo</label>
					<div class="field">
						<?php echo Form::textarea('data[conteudo]',  $model->conteudo, array('placeholder' => 'Conteúdo', 'id' => 'conteudo', 'cols' => '40', 'rows' => '5', 'class' => 'ckeditor'));?>	
					</div>
				</div>								
				
				<div class="field-group">
					<label for="foto">Imagem de destaque (400 x 400):</label>					
					<div class="field">		
						<?php if($f = $model->getFoto()):?>
							<p><?php echo Html::img("uploads/arquivos/{$f->id}/thumb-{$f->nome}");?></p>							
						<?php endif;?>				
						<?php echo Form::file('foto'); ?>						
					</div>															
				</div>
				<div class="field-group">
					<label for="link">Link da imagem</label>
					<div class="field">
						<?php echo Form::input('data[link]',  $model->link, array('placeholder' => 'Link da foto', 'id' => 'link', 'size' => '62', 'class' => ''));?>	
					</div>
				</div>
									
				<div class="actions">	
					<button type="submit" class="btn btn-primary btn-small" tabindex="3">Salvar</button>
					<?php echo Html::anchor('adm/blog', 'Cancelar', array('class' => 'btn btn-error btn-small')); ?>
				</div>
			<?php echo Form::close(); ?>
		</div>
	</div>
</div>