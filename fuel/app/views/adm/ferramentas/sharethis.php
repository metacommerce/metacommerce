<div class="grid-24">																					
	<div class="widget">			
		<div class="widget-content">
						
			<?php echo Form::open(array('action' => "adm/ferramentas/{$action}", 'class' => 'form validateForm')); ?>
							
				<div class="field-group">
					<label for="conteudo"><?php echo $label;?></label>
							
					<p>	
						ShareThis facilita o compartilhamento de produtos nas principais redes sociais.<br>
						<a href="http://sharethis.com/" target="_blank">Link para o ShareThis</a>
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