<div class="grid-24">																					
	<div class="widget">			
		<div class="widget-content">
						
			<?php echo Form::open(array('action' => 'adm/loja/save', 'class' => 'form validateForm')); ?>
										
				<div class="grid-12">
								
					<div class="field-group">
						<label for="nome">Nome</label>
						<div class="field">
							<?php echo Form::input('data[nome]', $model->nome, array('placeholder' => 'Nome', 'id' => 'nome', 'size' => '52', 'class' => ''));?>	
						</div>
					 </div>
					
					<div class="field-group">
						<label for="email">E-mail</label>
						<div class="field">
							<?php echo Form::input('data[email]', $model->email, array('placeholder' => 'E-mail', 'id' => 'email', 'size' => '52', 'class' => ''));?>	
						</div>
					</div>
					
					<div class="field-group">
						<label for="documento">CNPJ</label>
						<div class="field">
							<?php echo Form::input('data[documento]', $model->documento, array('placeholder' => 'CNPJ', 'id' => 'documento', 'size' => '52', 'class' => 'cnpj'));?>	
						</div>
					 </div>
					 
					  <div class="field-group">
						<label for="tel1">Telefone Principal</label>
						<div class="field">
							<?php echo Form::input('data[tel1]', $model->tel1, array('placeholder' => 'Telefone Principal', 'id' => 'tel1', 'size' => '52', 'class' => 'phone'));?>	
						</div>
				 	</div>
				 
					 <div class="field-group">
						<label for="tel2">Telefone Alternativo</label>
						<div class="field">
							<?php echo Form::input('data[tel2]', $model->tel2, array('placeholder' => 'Telefone Alternativo', 'id' => 'tel2', 'size' => '52', 'class' => 'phone'));?>	
						</div>
					 </div>					 				
								
				</div>
				
				<div class="grid-12">
				
					 <div class="field-group">
						<label for="cep">CEP</label>
						<div class="field">
							<?php echo Form::input('data[cep]', $model->cep, array('placeholder' => 'CEP', 'id' => 'cep', 'size' => '52', 'class' => 'cep'));?>	
						</div>
					 </div>
					 
					  <div class="field-group">
						<label for="bairro">Bairro</label>
						<div class="field">
							<?php echo Form::input('data[bairro]', $model->bairro, array('placeholder' => 'Bairro', 'id' => 'bairro', 'size' => '52', 'class' => ''));?>	
						</div>
				 	</div>
				 	
				 	 <div class="field-group">
						<label for="cidade">Cidade</label>
						<div class="field">
							<?php echo Form::input('data[cidade]', $model->cidade, array('placeholder' => 'Cidade', 'id' => 'cidade', 'size' => '52', 'class' => ''));?>	
						</div>
					 </div>
					 
					<div class="field-group">
						<label for="estado">Estado</label>
						<div class="field">
							<?php echo Form::input('data[estado]', $model->estado, array('placeholder' => 'Estado', 'id' => 'estado', 'size' => '52', 'class' => '', 'maxlength' => '2'));?>	
						</div>
					 </div>
				 
					 <div class="field-group">
						<label for="endereco">Endereço</label>
						<div class="field">
							<?php echo Form::input('data[endereco]', $model->endereco, array('placeholder' => 'Endereço', 'id' => 'endereco', 'size' => '52', 'class' => ''));?>	
						</div>
					 </div>
				 				
				</div>
				
				<div class="grid-24">																																												
								 								 																							
					<div class="actions">	
						<button type="submit" class="btn btn-primary btn-small" tabindex="3">Salvar</button>
						<?php echo Html::anchor('adm/produtos', 'Cancelar', array('class' => 'btn btn-error btn-small')); ?>
					</div>
				</div>
			<?php echo Form::close(); ?>
		</div>
	</div>
</div>