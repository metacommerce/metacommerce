<div class="grid-24">																					
	<div class="widget">			
		<div class="widget-content">
						
			<?php echo Form::open(array('action' => 'adm/categorias/save', 'class' => 'form validateForm', 'enctype' => 'multipart/form-data')); ?>
				
				<?php echo Form::hidden('id', $model->id);?>	
				
				<div class="field-group">
					<label for="categoria_id">Categoria Pai</label>					
					<div class="field">
						<?php echo Form::select('data[categoria_id]',  $model->categoria_id, $categorias, array('id' => 'categoria_id', 'class' => ''));?>
					</div>
				</div>	
																														
				<div class="field-group">
					<label for="nome">Nome</label>
					<div class="field">
						<?php echo Form::input('data[nome]',  $model->nome, array('placeholder' => 'Nome', 'id' => 'nome', 'size' => '52', 'class' => ''));?>	
					</div>
				</div>
				<div class="field-group">
					<label for="url" title="url-otimizada-de-categoria">URL SEO da categoria</label>
					<p>Evite acentos e caracteres especiais. Hífens são permitidos.</p>
					<div class="field">
						<?php echo Form::input('data[url]',  $model->url, array('placeholder'  => 'url-otimizada-de-categoria', 'id' => 'url', 'size' => '52', 'class' => ''));?>	
					</div>
				</div>
								
				<div class="actions">	
					<button type="submit" class="btn btn-primary btn-small" tabindex="3">Salvar</button>
					<?php echo Html::anchor('adm/categorias', 'Cancelar', array('class' => 'btn btn-error btn-small')); ?>
				</div>
			<?php echo Form::close(); ?>
		</div>
	</div>
</div>