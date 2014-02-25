<div class="grid-24">
			
		<div class="box plain">
			<?php echo Html::anchor('adm/clientes/create', 'Incluir Cliente', array('class' => 'btn btn-primary btn-small')); ?>
		</div>	
		<div class="box plain">
												
			<div class="widget-content">
				<?php echo Form::open(array('action' => 'adm/clientes/index', 'class' => 'form validateForm', 'method' => 'get')); ?>
					<div class="field-group">
						<label for="find">Pesquise por email ou nome</label>
						<div class="field">
							<?php echo Form::input('s', null, array('placeholder' => 'Insira o email ou nome do cliente', 'id' => 'find', 'size' => '42', 'class' => ''));?>
							<button type="submit" class="btn btn-primary btn-small" tabindex="3">								
								<span class="icon-magnifying-glass-alt"></span>
								Pesquisar
							</button>
							<button type="button" class="btn btn-green btn-small" tabindex="3" data-submit="#form-txt">								
								<span class="icon-download"></span>
								Exportar selecionados para Email Marketing
							</button>
						</div>						
					</div>		
				<?php echo Form::close(); ?>							
				<table class="table table-striped">
					<thead>
						<tr>	
							<th><?php echo Form::checkbox(null, null, false, array('data-check' => '.box-mail')); ?></th>						
							<th>Nome</th>
							<th>E-mail</th>
							<th>Sexo</th>
							<th>Nascimento</th>
							<th>Data de cadastro</th>								
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php echo Form::open(array('action' => 'adm/clientes/txt', 'class' => 'form validateForm', 'method' => 'post', 'id' => 'form-txt')); ?>
							<?php if(count($model)): ?>
								<?php foreach($model as $m): ?>
									<tr class="gradeA">
										<td><?php echo Form::checkbox('emails[]', $m->email, false, array('class' => 'box-mail')); ?></td>
										<td><?php echo $m->nome; ?></td>
										<td><?php echo $m->email; ?></td>
										<td><?php echo $sexos[$m->sexo]; ?></td>
										<td><?php echo $m->getNascimento(); ?></td>
										<td><?php echo $m->dt_cadastro; ?></td>
										<td>
											<?php echo Html::anchor("adm/clientes/edit/{$m->id}", '', 	array('class' => 'icon-pen-alt-fill', 'title' => 'editar')); ?>
											&nbsp; | &nbsp;
											<?php echo Html::anchor("adm/clientes/del/{$m->id}", '', array('class' => 'icon-x', 'title' => 'excluir', 'data-confirm' => 'Tem certeza que deseja excluir este registro?')); ?>
										</td>
									</tr>
								<?php endforeach; ?>
								<?php else: ?>
									<tr class="gradeA">
										<td colspan="7">Nenhum registro encontrado.</td>										
									</tr>
							<?php endif; ?>
					  <?php echo Form::close(); ?>
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