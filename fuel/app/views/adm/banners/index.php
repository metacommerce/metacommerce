<div class="grid-24">
			
		<div class="box plain">
			<?php echo Html::anchor('adm/banners/create', 'Incluir Banner', array('class' => 'btn btn-primary btn-small')); ?>
		</div>	
		<div class="box plain">
												
			<div class="widget-content">
											
				<table class="table table-striped">
					<thead>
						<tr>						
							<th>Nome</th>	
							<th>Publicado</th>												
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php if(count($model)): ?>
							<?php foreach($model as $m): ?>
								<tr class="gradeA">								
									<td><?php echo $m->nome; ?></td>
									<td><?php echo Form::checkbox(null, $m->id, (bool)$m->publicado, array('data-field' => 'publicado', 'data-model' => 'Banner', 'data-url' => Uri::base().'adm/ajax/activate', 'class' => 'activate')); ?></td>																
									<td>
										<?php echo Html::anchor("adm/banners/edit/{$m->id}", '', 	array('class' => 'icon-pen-alt-fill', 'title' => 'editar')); ?>
										&nbsp; | &nbsp;
										<?php echo Html::anchor("adm/banners/del/{$m->id}", '', array('class' => 'icon-x', 'title' => 'excluir', 'data-confirm' => 'Tem certeza que deseja excluir este registro?')); ?>
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