<div class="grid-24">																					
	<div class="widget">			
		<div class="widget-content">
						
			<?php echo Form::open(array('action' => "adm/textos/{$action}", 'class' => 'form validateForm')); ?>
							
				<div class="field-group">
					<label for="conteudo"><?php echo $label;?></label>																	
					<div class="field">
						<?php echo Form::textarea('data[conteudo]', $model->conteudo, array('placeholder' => 'Conteudo', 'id' => 'conteudo', 'cols' => '40', 'rows' => '5', 'class' => 'ckeditor'));?>	
					</div>
				</div>
			
				<div class="actions">	
					<button type="submit" class="btn btn-primary btn-small" tabindex="3">Salvar</button>
					<?php echo Html::anchor('adm/produtos', 'Cancelar', array('class' => 'btn btn-error btn-small')); ?>
				</div>
			<?php echo Form::close(); ?>
		</div>
	</div>
</div>