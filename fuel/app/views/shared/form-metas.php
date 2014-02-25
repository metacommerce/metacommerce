<div>																					
<div class="widget">
	<div class="widget-header">
		<span class="icon-article"></span>
		<h3><a href="javascript:;" data-open="#box-metas">Otimização (SEO)</a></h3>
	</div>			
	<div class="widget-content hide" id="box-metas">
	 						  						  												
		<div class="field-group">
			<label for="meta_title">Title</label>
			<div class="field">
				<?php echo Form::input('meta[title]',  $model->title, array('placeholder' => 'Title', 'id' => 'meta_title', 'size' => '62', 'class' => ''));?>	
			</div>
		</div>	
		<div class="field-group">
			<label for="meta_description">Description</label>
			<div class="field">
				<?php echo Form::textarea('meta[description]',  $model->description, array('placeholder' => 'Description', 'id' => 'meta_description', 'cols' => '40', 'rows' => '5',));?>	
			</div>
		</div>	
		<div class="field-group">
			<label for="meta_keywords">Keywords</label>
			<div class="field">
				<?php echo Form::input('meta[keywords]', $model->keywords, array('placeholder' => 'Keywords', 'id' => 'meta_keywords', 'size' => '62', 'class' => ''));?>	
			</div>
		</div>	
		<div class="field-group">
			<label for="meta_abstract">Abstract</label>
			<div class="field">
				<?php echo Form::input('meta[abstract]',  $model->abstract, array('placeholder' => 'Abstract', 'id' => 'meta_abstract', 'size' => '62', 'class' => ''));?>	
			</div>
		</div>								
	</div> <!-- .widget-content -->
</div> <!-- .widget -->																
</div> <!-- .grid -->	
<br>