<div class="grid-24">																					
	<div class="widget">			
		<div class="widget-content">
						
			<?php echo Form::open(array('action' => "adm/ferramentas/{$action}", 'class' => 'form validateForm')); ?>
							
				<div class="field-group">
					<label for="conteudo"><?php echo $label;?></label>
							
					<p>	
						Disqus disponibiliza campos de comentário nos produtos e nas postagens do blog.<br />					
						<a href="http://disqus.com/" target="_blank">Link para o Disqus</a>
					</p>						
					<div class="field">
						<?php echo Form::textarea('data[conteudo]', $model->conteudo, array('placeholder' => 'Insira o código aqui', 'id' => 'conteudo', 'cols' => '150', 'rows' => '10', 'class' => ''));?>	
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