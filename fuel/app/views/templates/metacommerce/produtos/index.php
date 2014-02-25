		<?php if(isset($titulo)):?>
			<div class="base_produtos">				
				<h1><?php echo $titulo;?></h1>
		    </div>
		 <?php endif;?>
		 <!--Produtos-->
	      <div class="produtos_base">
	      	<?php $i = 0;?>
		    <?php if($total = count($produtos)):?>
		    	<?php foreach($produtos as $p):?>		    	 					    	 					    	 			   	 	
		    	 	 <!--Produto 1-->
				      <div class="box_produtos">
				      	 <?php if($img = $p->getFoto()):?>
					      <center><?php echo  Html::img("uploads/arquivos/{$img->id}/thumb-{$img->nome}", array('alt' => 'foto', 'border' => 0, 'title' => $img->nome));?></center>
					     <?php endif;?>
					      
					       <h3><?php echo $p->nome;?></h3>
					        <p class="txt_produtos"><?php echo $p->resumo;?></p>
					        <p class="preco_produtos"><?php echo $p->getPriceFormated();?></p>
					       <?php echo Html::anchor("produtos/{$p->categoria->url}/{$p->url}",'+ detalhes',array('title' => '+ detalhes', 'class' => 'btn_detalhes')); ?>
			        	   <?php echo Html::anchor("carrinho/add/{$p->url}",'comprar',array('title' => 'comprar', 'class' => 'btn_comprar')); ?>
				      </div>
				      		    		
					  <?php if(++$i < 3):?>					  	 
						  <!--Separacao -->
						   <div class="separador_prod"></div>
						  <?php else: ?>
						  	<?php $i = 0;?>
						  	<div class="clear"></div>
					  <?php endif;?>
					  						  	 		
		    	<?php endforeach;?>
		    	<br clear="all">
		    	<?php echo $pagination;?>
		    	<?php else:?>
		    		<p>Nenhum registro encontrado.</p>
		    <?php endif;?>		     
      	</div>