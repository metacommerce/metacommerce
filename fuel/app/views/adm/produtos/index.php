<div class="grid-24">
			
		<div class="box plain">
			<?php echo Html::anchor('adm/produtos/create', 'Incluir Produto', array('class' => 'btn btn-primary btn-small')); ?>
		</div>	
		<div class="box plain">
												
			<div class="widget-content">
				<?php echo Form::open(array('action' => 'adm/produtos/index', 'class' => 'form validateForm', 'method' => 'get')); ?>
					<div class="field-group">
						<label for="find">Pesquise por código ou nome</label>
						<div class="field">
							<?php echo Form::input('s', null, array('placeholder' => 'Insira o código ou nome do produto', 'id' => 'find', 'size' => '42', 'class' => ''));?>
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
							<th>Código</th>
							<th>Nome</th>
							<th>Categoria</th>
							<th>Publicado</th>
							<th>Destaque</th>								
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php if(count($model)): ?>
							<?php foreach($model as $m): ?>
								<tr class="gradeA">
									<td><?php echo $m->codigo; ?></td>
									<td><?php echo $m->nome; ?></td>
									<td><?php echo $m->categoria->nome; ?></td>
									<td><?php echo Form::checkbox(null, $m->id, (bool)$m->publicado, array('data-field' => 'publicado', 'data-model' => 'Produto', 'data-url' => Uri::base().'adm/ajax/activate', 'class' => 'activate')); ?></td>
									<td><?php echo Form::checkbox(null, $m->id, (bool)$m->destaque, array('data-field' => 'destaque','data-model' => 'Produto', 'data-url' => Uri::base().'adm/ajax/activate', 'class' => 'activate')); ?></td>																		
									<td>
										<?php echo Html::anchor("adm/produtos/edit/{$m->id}", '', 	array('class' => 'icon-pen-alt-fill', 'title' => 'editar')); ?>
										&nbsp; | &nbsp;
										<?php echo Html::anchor("adm/produtos/del/{$m->id}", '', array('class' => 'icon-x', 'title' => 'excluir', 'data-confirm' => 'Tem certeza que deseja excluir este registro?')); ?>
									</td>
								</tr>
							<?php endforeach; ?>
							<?php else: ?>
								<tr class="gradeA">
									<td colspan="7">Nenhum registro encontrado.</td>										
								</tr>
						<?php endif; ?>
					</tbody>
					<tfoot>
						<tr class="gradeA">
							<td colspan="7"><?php echo $pagination;?></td>											
						</tr>
					</tfoot>
			</table>	
	
				
		</div> <!-- .widget-content -->
			
	</div> <!-- .widget -->	
															
</div> <!-- .grid -->			