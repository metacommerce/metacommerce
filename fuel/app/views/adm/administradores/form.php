<div class="grid-24">																					
	<div class="widget">			
		<div class="widget-content">
						
			<?php echo Form::open(array('action' => 'adm/administradores/save', 'class' => 'form validateForm', 'enctype' => 'multipart/form-data')); ?>
				
				<?php echo Form::hidden('id', $model->id);?>	
					
					
				<div class="grid-12">
									
					<div class="field-group">
						<label for="nome">Nome</label>
						<div class="field">
							<?php echo Form::input('data[nome]',  $model->nome, array('placeholder' => 'Nome', 'id' => 'nome', 'size' => '32', 'class' => ''));?>	
						</div>
					</div>
													
					<div class="field-group">
						<label for="email">E-mail</label>
						<div class="field">
							<?php echo Form::input('data[email]', $model->email, array('placeholder' => 'E-mail', 'id' => 'email', 'size' => '32', 'class' => ''));?>		
						</div>
					</div>
					
					<div class="field-group">
						<label for="cargo">Cargo</label>
						<div class="field">
							<?php echo Form::input('data[cargo]', $model->cargo, array('placeholder' => 'Cargo', 'id' => 'cargo', 'size' => '32'));?>		
						</div>
					</div>
					
				</div>
					
				<div class="grid-12">
								
					<div class="field-group">
						<label for="senha">Senha</label>
						<div class="field">
							<?php echo Form::password('senha', '', array('placeholder' 	=> 'Senha', 'id' => 'senha', 'size' => '32'));?>	
						</div>
					</div>
					
					<div class="field-group">
						<label for="confirmar_senha">Confirmar Senha</label>
						<div class="field">
							<?php echo Form::password('confirmar_senha', '', array('placeholder' => 'Confirmar Senha', 'id' => 'confirmar_senha', 'size' => '32'));?>	
						</div>
					</div>
					
				</div>
				
				<div class="grid-24">	
			
					<div class="actions">	
						<button type="submit" class="btn btn-primary btn-small" tabindex="3">Salvar</button>
						<?php echo Html::anchor('adm/administradores', 'Cancelar', array('class' => 'btn btn-error btn-small')); ?>
					</div>
					
				</div>
			<?php echo Form::close(); ?>
		</div>
	</div>
</div>