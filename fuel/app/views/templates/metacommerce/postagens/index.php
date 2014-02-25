<div class="base_produtos">
	 <h1><?php echo $titulo;?></h1>
     <p>&nbsp;</p>
     <?php if(count($model)):?>
     	<?php foreach($model as $val):?>     		
     		 <div class="box_duvidas">
     		 <span style="font-style:italic;"><?php echo $val->dt_cadastro;?></span>
   				<h2><?php echo Html::anchor("postagens/{$val->url}",$val->titulo,array('title' => $val->titulo, 'class' => 'link_blog'));?></h2>
				<div><?php echo $val->resumo;?></div>
			 </div>
     	<?php endforeach;?> 
     	<br clear="all">
		<?php echo $pagination;?>    	
     	<?php else:?>
     		<p>Nenhum registro encontrado.</p>
     <?php endif;?>
     <!--Duvida 1 -->
</div>