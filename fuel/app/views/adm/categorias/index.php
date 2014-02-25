<div class="grid-24">
			
		<div class="box plain">
			<?php echo Html::anchor('adm/categorias/create', 'Incluir Categoria', array('class' => 'btn btn-primary btn-small')); ?>
		</div>	
		<div class="box plain">
												
			<div class="widget-content">
											
				<table class="table table-striped">
					<thead>
						<tr>							
							<th>Nome</th>		
							<th>Categoria Pai</th>											
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php if(count($model)): ?>
							<?php foreach($model as $m): ?>
								<tr class="gradeA">								
									<td><?php echo $m->nome; ?></td>
									<td><?php echo $m->getFatherName(); ?></td>
									<td>
										<?php echo Html::anchor("adm/categorias/edit/{$m->id}", '', array('class' => 'icon-pen-alt-fill', 'title' => 'editar')); ?>
										&nbsp; | &nbsp;
										<?php echo Html::anchor("adm/categorias/del/{$m->id}", '', array('class' => 'icon-x', 'title' => 'excluir', 'data-confirm' => 'Tem certeza que deseja excluir este registro?')); ?>
									</td>
								</tr>
							<?php endforeach; ?>
							<?php else: ?>
								<tr class="gradeA">
									<td colspan="3">Nenhum registro encontrado.</td>										
								</tr>
						<?php endif; ?>
					</tbody>
					<tfoot>
						<tr class="gradeA">
							<td colspan="3"><?php echo $pagination;?></td>											
						</tr>
					</tfoot>
			</table>	
	
				
		</div> <!-- .widget-content -->
			
	</div> <!-- .widget -->	
															
</div> <!-- .grid -->			