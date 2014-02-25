<div class="grid-24">				
		<div class="box plain">											
			<div class="widget-content">
				<?php echo Form::open(array('action' => 'adm/pedidos/index', 'class' => 'form validateForm', 'method' => 'get', 'id' => 'find')); ?>
					<div class="field-group">													
						<label for="find">Pesquise por Número</label>
						<div class="field">
							<?php echo Form::input('numero', null, array('placeholder' => 'Número do Pedido', 'id' => 'find', 'size' => '20'));?>	
							<button type="submit" class="btn btn-primary btn-small" tabindex="3">								
								<span class="icon-magnifying-glass-alt"></span>
								Pesquisar
							</button>						
						</div>
						<label for="find">Filtre por Status</label>
						<div class="field">
							<?php echo Form::select('status', null, $status, array('data-submit' => '#find'));?>												
						</div>
					</div>		
				<?php echo Form::close(); ?>							
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nº do Pedido</th>							
							<th>Cliente</th>
							<th>Status</th>	
							<th>Data da Compra</th>												
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php if(count($model)): ?>
							<?php foreach($model as $m): ?>
								<tr class="gradeA">
									<td><?php echo $m->id; ?></td>									
									<td><?php echo ($m->cliente) ? $m->cliente->nome : 'Indefinido'; ?></td>
									<td><?php echo $m->getStatus(); ?></td>
									<td><?php echo $m->getDtCadastro(); ?></td>								
									<td>
										<?php echo Html::anchor("adm/pedidos/read/{$m->id}", '', array('class' => 'icon-eye', 'title' => 'Visualizar')); ?>										
									</td>
								</tr>
							<?php endforeach; ?>
							<?php else: ?>
								<tr class="gradeA">
									<td colspan="5">Nenhum registro encontrado.</td>										
								</tr>
						<?php endif; ?>
					</tbody>
					<tfoot>
						<tr class="gradeA">
							<td colspan="5"><?php echo $pagination;?></td>											
						</tr>
					</tfoot>
			</table>	
	
				
		</div> <!-- .widget-content -->
			
	</div> <!-- .widget -->	
															
</div> <!-- .grid -->			