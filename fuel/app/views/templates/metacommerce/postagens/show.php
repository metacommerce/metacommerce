  <div class="base_produtos">
  	<?php echo Html::anchor('/','home');?> &gt; 
  	<?php echo Html::anchor('postagens','Blog');?> &gt;
  	<strong><?php echo $model->titulo;?></strong>
	<h1><?php echo $model->titulo;?></h1>
	<br>
	<div><?php echo $sharethis->conteudo;?></div>
	<br>
	<?php echo $model->getDtCadastro();?>
	<?php if($foto = $model->getFoto()):?>
		<p>
			<a href="<?php echo $model->link ?: 'javascript:;';?>" title="<?php echo $model->titulo;?>">
				<?php echo Html::img("uploads/arquivos/{$foto->id}/{$foto->nome}", array('width' => '400', 'title' => $model->titulo));?>
			</a>
		</p>	
	<?php endif;?>
    <?php echo $model->conteudo;?>
    <div><?php echo $disqus->conteudo;?></div>
  </div>