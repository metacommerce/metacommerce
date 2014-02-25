<div class="grid-24">																					
	<div class="widget">			
		<div class="widget-content">
						
			<?php echo Form::open(array('action' => 'adm/perfil', 'class' => 'form uniformForm validateForm')); ?>
					
				<div class="field-group">
					<label for="estado_id">Estado</label>
					<div class="field">
						<?php echo Form::select('estado_id', $model->getEstadoId(), $estados, array('id' => 'estado_id','data-find'=>Uri::base().'ajax/cidades.html','data-target'=>'#box-cidades'));?>
					</div>
				</div>		
				<div class="field-group">
					<label for="cidade_id">Cidade</label>
					<div class="field" id="box-cidades">
						<?php echo Form::select('data[cidade_id]', $model->cidade_id, $model->getCidades(), array('id' => 'cidade_id', 'class' => ''));?>
					</div>
				</div>			
				
				<div class="field-group">
					<label for="pessoa">Pessoa</label>
					<div class="field">
						<?php echo Form::select('data[pessoa]',  $model->pessoa, array(1 => 'Física', 2 => 'Jurídica'), array('id' => 'pessoa', 'class' => '', 'data-change-documento' => '#documento'));?>	
					</div>
				</div>
											
				<div class="field-group">
					<label for="nome">Nome</label>
					<div class="field">
						<?php echo Form::input('data[nome]',  $model->nome, array('placeholder' => 'Nome', 'id' => 'nome', 'size' => '32', 'class' => 'validate[required]'));?>	
					</div>
				</div>
												
				<div class="field-group">
					<label for="email">E-mail</label>
					<div class="field">
						<?php echo Form::input('data[email]', $model->email, array('placeholder' => 'E-mail', 'id' => 'email', 'size' => '32', 'class' => 'validate[required,custom[email]]'));?>		
					</div>
				</div>
				
				<div class="field-group">
					<label for="documento">Documento (CPF/CNPJ)</label>
					<div class="field">
						<?php echo Form::input('data[documento]', $model->documento, array('placeholder' => 'Documento', 'id' => 'documento', 'size' => '32', 'class' => ''));?>		
					</div>
				</div>
				
				<div class="field-group">
					<label for="telefone">Telefone</label>
					<div class="field">
						<?php echo Form::input('data[telefone]', $model->telefone, array('placeholder' => 'Telefone', 'id' => 'telefone', 'size' => '32', 'class' => 'phone'));?>		
					</div>
				</div>
				
				<div class="field-group">
					<label for="senha">Trocar Senha</label>
					<div class="field">
						<?php echo Form::password('senha', '', array('placeholder' 	=> 'Senha', 'id' => 'senha', 'size' => '32'));?>	
					</div>
				</div>
				
				<div class="field-group">
					<label for="confirmar_senha">Confirmar Nova Senha</label>
					<div class="field">
						<?php echo Form::password('confirmar_senha', '', array('placeholder' => 'Confirmar Senha', 'id' => 'confirmar_senha', 'size' => '32'));?>	
					</div>
				</div>
				
				<div class="actions">	
					<button type="submit" class="btn btn-primary btn-small" tabindex="3">Salvar</button>
					<?php echo Html::anchor('adm', 'Cancelar', array('class' => 'btn btn-error btn-small')); ?>
				</div>
			<?php echo Form::close(); ?>
		</div>
	</div>
</div>