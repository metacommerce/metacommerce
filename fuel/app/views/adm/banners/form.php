<div class="grid-24">																					
	<div class="widget">			
		<div class="widget-content">
						
			<?php echo Form::open(array('action' => 'adm/banners/save', 'class' => 'form validateForm', 'enctype' => 'multipart/form-data')); ?>
				
				<?php echo Form::hidden('id', $model->id);?>	
					
				<fieldset class="fieldset-permissions">
					<legend>Configurações</legend>
					<div class="field-group">
						<div class="field">
							<?php echo Form::hidden('data[publicado]', 0);?>	
							<?php echo Form::checkbox('data[publicado]',  1, (bool)$model->publicado, array('id' => 'publicado', 'class' => ''));?>	
							Banner publicado											
						</div>
					</div>
				</fieldset>
																														
				<div class="field-group">
					<label for="nome">Nome</label>
					<div class="field">
						<?php echo Form::input('data[nome]',  $model->nome, array('placeholder' => 'Nome', 'id' => 'nome', 'size' => '62', 'class' => ''));?>	
					</div>
				</div>		
				<div class="field-group">
					<label for="link">Link</label>
					<div class="field">
						<?php echo Form::input('data[link]',  $model->link, array('placeholder' => 'Link', 'id' => 'link', 'size' => '62', 'class' => ''));?>	
					</div>
				</div>			
				<div class="field-group">
					<label for="banner">
						Imagem do Banner (673x365):
						<?php if($banner = $model->getBanner()):?>	
							<br>					
							<?php  echo Html::img("uploads/arquivos/{$banner->id}/thumb-{$banner->nome}");?>												
						<?php endif;?>						
					</label>					
					<div class="field">						
						<?php echo Form::file('banner'); ?>
					</div>
				</div>				
				<div class="actions">	
					<button type="submit" class="btn btn-primary btn-small" tabindex="3">Salvar</button>
					<?php echo Html::anchor('adm/banners', 'Cancelar', array('class' => 'btn btn-error btn-small')); ?>
				</div>
			<?php echo Form::close(); ?>
		</div>
	</div>
</div>