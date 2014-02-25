<div class="grid-24">																					
	<div class="widget">			
		<div class="widget-content">
						
			<?php echo Form::open(array('action' => 'adm/paypal/save', 'class' => 'form validateForm')); ?>
					
				<p class="fs15">Na sua conta do Paypal entre em: <span class="negrito italico">Minha Conta > Perfil > Informações da Conta > Acesso à API > Exibir assinatura de API</span></p>	
																																		
				<div class="field-group">
					<label for="user">Usuário da API</label>
					<div class="field">
						<?php echo Form::input('data[user]',  $model->user, array('placeholder' => 'Usuário da API', 'id' => 'user', 'size' => '52', 'class' => ''));?>	
					</div>
				</div>
				
				<div class="field-group">
					<label for="pwd">Senha da API</label>
					<div class="field">
						<?php echo Form::input('data[pwd]', $model->pwd, array('placeholder' => 'Senha da API', 'id' => 'pwd', 'size' => '52', 'class' => ''));?>	
					</div>
				</div>
				
				<div class="field-group">
					<label for="signature">Assinatura</label>
					<div class="field">
						<?php echo Form::textarea('data[signature]', $model->signature, array('placeholder' => 'Assinatura', 'id' => 'signature', 'cols' => '52', 'rows' => '2'));?>	
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