<div class="grid-24">
			
		<div class="box plain">
			<?php echo Html::anchor('adm/administradores/create', 'Incluir Administrador', array('class' => 'btn btn-primary btn-small')); ?>
		</div>	
		<div class="box plain">
												
			<div class="widget-content">
				<?php echo Form::open(array('action' => 'adm/administradores/index', 'class' => 'form validateForm', 'method' => 'get')); ?>
					<div class="field-group">
						<label for="find">Pesquise por email ou nome</label>
						<div class="field">
							<?php echo Form::input('s', null, array('placeholder' => 'Insira o email ou nome do administrador', 'id' => 'find', 'size' => '42', 'class' => ''));?>
							<button type="submit" class="btn btn-primary btn-small" tabindex="3">								
								<span class="icon-magnifying-glass-alt"></span>
								Pesquisar
							</button>							
						</div>						
					</div>		
				<?php echo Form::close(); ?>							
				<table class="table table-striped">
					<thead>
						<tr>												
							<th>Nome</th>
							<th>E-mail</th>
							<th>Cargo</th>													
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>						
						<?php if(count($model)): ?>
							<?php foreach($model as $m): ?>
								<tr class="gradeA">									
									<td><?php echo $m->nome; ?></td>
									<td><?php echo $m->email; ?></td>									
									<td><?php echo $m->cargo; ?></td>
									<td>
										<?php echo Html::anchor("adm/administradores/edit/{$m->id}", '', 	array('class' => 'icon-pen-alt-fill', 'title' => 'editar')); ?>
										&nbsp; | &nbsp;
										<?php echo Html::anchor("adm/administradores/del/{$m->id}", '', array('class' => 'icon-x', 'title' => 'excluir', 'data-confirm' => 'Tem certeza que deseja excluir este registro?')); ?>
									</td>
								</tr>
							<?php endforeach; ?>
							<?php else: ?>
								<tr class="gradeA">
									<td colspan="4">Nenhum registro encontrado.</td>										
								</tr>
						<?php endif; ?>					 
					</tbody>
					<tfoot>
						<tr class="gradeA">
							<td colspan="4"><?php echo $pagination;?></td>											
						</tr>
					</tfoot>
			</table>	
	
				
		</div> <!-- .widget-content -->
			
	</div> <!-- .widget -->	
															
</div> <!-- .grid -->			