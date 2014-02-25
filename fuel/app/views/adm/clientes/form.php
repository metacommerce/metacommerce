<div class="grid-24">																					
	<div class="widget">			
		<div class="widget-content">
						
			<?php echo Form::open(array('action' => 'adm/clientes/save', 'class' => 'form validateForm', 'enctype' => 'multipart/form-data')); ?>
				
				<?php echo Form::hidden('id', $model->id);?>	
				
				<div class="grid-12">	
				
				<div class="field-group">
					<label for="sexo">Sexo</label>
					<div class="field">
						<?php echo Form::select('data[sexo]',  $model->sexo, $sexos, array('id' => 'sexo', 'class' => ''));?>
					</div>
				</div>	
				
				<div class="field-group">
					<label for="nascimento">Nascimento</label>
					<div class="field">
						<?php echo Form::input('data[nascimento]',  $model->getNascimento(), array('placeholder' => 'Nascimento', 'id' => 'nascimento', 'size' => '20', 'class' => 'datepicker'));?>	
					</div>
				</div>
							
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
					<label for="documento">CPF</label>
					<div class="field">
						<?php echo Form::input('data[documento]', $model->documento, array('placeholder' => 'CPF', 'id' => 'documento', 'size' => '32', 'class' => 'cpf'));?>		
					</div>
				</div>
				
			</div>
			
			<div class="grid-12">	
				
				<div class="field-group">
					<label for="tel_fixo">Telefone Fixo</label>
					<div class="field">
						<?php echo Form::input('data[tel_fixo]', $model->tel_fixo, array('placeholder' => 'Telefone Fixo', 'id' => 'tel_fixo', 'size' => '32', 'class' => 'phone'));?>		
					</div>
				</div>
				
				<div class="field-group">
					<label for="tel_celular">Telefone Celular</label>
					<div class="field">
						<?php echo Form::input('data[tel_celular]', $model->tel_celular, array('placeholder' => 'Telefone Celular', 'id' => 'tel_fixo', 'size' => '32', 'class' => 'phone'));?>		
					</div>
				</div>
				
				<div class="field-group">
					<label for="senha">Senha</label>
					<div class="field">
						<?php echo Form::password('senha', '', array('placeholder' 	=> 'Senha', 'id' => 'senha', 'size' => '32', 'maxlength' => '20'));?>	
					</div>
				</div>
				
				<div class="field-group">
					<label for="confirmar_senha">Confirmar Senha</label>
					<div class="field">
						<?php echo Form::password('confirmar_senha', '', array('placeholder' => 'Confirmar Senha', 'id' => 'confirmar_senha', 'size' => '32', 'maxlength' => '20'));?>	
					</div>
				</div>
				
			</div>
			
			<div class="grid-24">
				
				<div class="actions">	
					<button type="submit" class="btn btn-primary btn-small" tabindex="3">Salvar</button>
					<?php echo Html::anchor('adm/clientes', 'Cancelar', array('class' => 'btn btn-error btn-small')); ?>
				</div>
				
			</div>
			<?php echo Form::close(); ?>
		</div>
	</div>
</div>