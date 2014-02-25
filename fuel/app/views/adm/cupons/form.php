<div class="grid-24">																					
	<div class="widget">			
		<div class="widget-content">
						
			<?php echo Form::open(array('action' => 'adm/cupons/save', 'class' => 'form validateForm')); ?>
				
				<?php echo Form::hidden('id', $model->id);?>	
				
				<fieldset class="fieldset-permissions">
					<legend>Configurações</legend>
					<div class="field-group">
						<div class="field">
							<?php echo Form::hidden('data[publicado]', 0);?>	
							<?php echo Form::checkbox('data[publicado]',  1, (bool)$model->publicado, array('id' => 'publicado', 'class' => ''));?>	
							Cupom publicado																						
						</div>
					</div>
				</fieldset>
				
				<div class="grid-12">
					
					<div class="field-group">
						<label for="codigo">Código</label>
						<div class="field">
							<?php echo Form::input('data[codigo]',  $model->codigo, array('placeholder' => 'Ex.: BLACKFRIDAY', 'id' => 'codigo', 'size' => '52', 'class' => ''));?>	
						</div>
					</div>
																																					
					<div class="field-group">
						<label for="nome">Nome</label>
						<div class="field">
							<?php echo Form::input('data[nome]',  $model->nome, array('placeholder' => 'Nome', 'id' => 'nome', 'size' => '52', 'class' => ''));?>	
						</div>
					</div>
					
					<div class="field-group">
						<label for="descricao">Descrição</label>
						<div class="field">
							<?php echo Form::textarea('data[descricao]', $model->descricao, array('placeholder' => 'Descrição', 'id' => 'descricao', 'cols' => '52', 'rows' => '2'));?>	
						</div>
					</div>
					
				</div>
				
				<div class="grid-12">
				
					<div class="field-group">
						<label for="desconto">Percentual de desconto</label>
						<div class="field">
							<?php echo Form::input('data[desconto]',  $model->desconto, array('placeholder' => '20%', 'id' => 'desconto', 'size' => '22', 'class' => '', 'type' => 'number', 'min' => '1', 'max' => '100'));?>	
						</div>
					</div>
					
					<div class="field-group">
						<label for="dt_expiracao">Data de expiração</label>
						<div class="field">
							<?php echo Form::input('data[dt_expiracao]',  $model->getDtExpiracao(), array('placeholder' => 'Data de expiração', 'id' => 'dt_expiracao', 'size' => '22', 'class' => 'datepicker'));?>	
						</div>
					</div>
					
				</div>
					
				<div class="grid-24">	
																
					<div class="actions">	
						<button type="submit" class="btn btn-primary btn-small" tabindex="3">Salvar</button>
						<?php echo Html::anchor('adm/cupons', 'Cancelar', array('class' => 'btn btn-error btn-small')); ?>
					</div>
					
				</div>
			<?php echo Form::close(); ?>
		</div>
	</div>
</div>