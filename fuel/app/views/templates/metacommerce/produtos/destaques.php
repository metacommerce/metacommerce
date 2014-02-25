		<?php if(count($produtos)):?>
			<!--Destaques-->
			<br />
    		<strong class="titulo_categoria">Destaques</strong> 
			<?php foreach($produtos as $p):?>
		        <div class="box_destaques">
		         	<?php if($img = $p->getFoto()):?>
					    <center><?php echo  Html::img("uploads/arquivos/{$img->id}/thumb-{$img->nome}", array('alt' => 'foto', 'border' => 0, 'title' => $img->nome));?></center>
					 <?php endif;?>			       
			        <h3><?php echo $p->nome;?></h3>
			        <p class="txt_produtos"><?php echo $p->resumo;?></p>
			        <p class="preco_detaques"><?php echo $p->getPriceFormated();?></p>
			        <?php echo Html::anchor("produtos/{$p->categoria->url}/{$p->url}",'+ detalhes',array('title' => '+ detalhes', 'class' => 'btn_detalhes')); ?>
			        <?php echo Html::anchor("carrinho/add/{$p->url}",'comprar',array('title' => 'comprar', 'class' => 'btn_comprar')); ?>
		       </div>
		     <?php endforeach; ?>
	      <?php endif; ?>