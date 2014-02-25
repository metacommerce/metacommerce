  		  
   <!--Base Produtos-->
    <div class="base_produtos">
    <p>
    	<?php echo Html::anchor('/','home');?> &gt; <?php echo Html::anchor("produtos/{$produto->categoria->url}",$produto->categoria->nome, array('title' => $produto->categoria->nome));?> &gt; <strong><?php echo $produto->nome;?></strong>    	
    </p>
  
  	<br>
	<div>
		<?php if($sharethis->conteudo):?>	      
	      <p><?php echo $sharethis->conteudo;?></p>
	    <?php endif?>		
	</div>
   <!--Produto Foto--> 
   <?php if($fotos = $produto->getGaleria()):?>
	    <div class="produto_foto">
			<div id="box">
				<div id="gallery" class="ad-gallery">
				      <div class="ad-image-wrapper">
				      </div>	      
				      <div class="ad-nav">
				        <div class="ad-thumbs">
				          <ul class="ad-thumb-list">				          
				           	<?php foreach($fotos as $f):?>		        
					            <li>
					            	<?php echo Html::anchor("uploads/arquivos/{$f->id}/{$f->nome}", Html::img("uploads/arquivos/{$f->id}/thumb-{$f->nome}", array('alt'=> '', 'title' => '', 'border' => 'none'))); ?>						              
					            </li>
					         <?php endforeach;?>  
				          </ul>
				        </div>
				    </div>
	            </div>
			</div> <!-- box js -->
		</div><!--Fecha Produto Foto-->
 	<?php endif;?>

    <!--Produtos Info-->
    <div class="produto_info">
              
      <h1><?php echo $produto->nome;?></h1>
      <h2>Cod.<?php echo $produto->codigo;?></h2>
      <p><?php echo $produto->resumo;?></p>
      
      <!--Comprar-->
      <div class="produto_diversos">
      	 <p><span class="preco"><?php echo $produto->getPriceFormated();?></span></p>
     	 <p><?php echo Html::anchor("carrinho/add/{$produto->url}",'COMPRAR',array('title' => 'comprar', 'style' => 'color:#FFF; text-decoration:none', 'class' => 'btn_azul')); ?></p>
     	 <br />
      </div>
      
      <h3>Detalhes do produto</h3>
      <div class="ckeditor">
      	<?php echo html_entity_decode($produto->detalhes,  ENT_QUOTES, 'UTF-8');?> 
      </div>     
    </div><!--Fecha Produtos Info-->
      
      <!--Produtos Especificações-->
      <div class="produto_diversos">
      
	      <h3>Outras Características</h3>	
	      <div class="ckeditor">      
	      	<?php echo html_entity_decode($produto->caracteristicas,  ENT_QUOTES, 'UTF-8');?>
	      </div> 
	      
	      <?php if($iframe = $produto->getVideoIframe()):?>
	      	<h3>Vídeo do Produto</h3>
	      	<p><?php echo $iframe?></p>
	      <?php endif?>
	      
	      <p>
	       <?php if($manual = $produto->getManual()): ?>
	       	<br clear="all"><br> 
	      	<?php echo Html::anchor("uploads/arquivos/{$manual->id}/{$manual->nome}",'Download do Manual', array('target' => '_blank', 'class'   => 'btn_azul', 'title' => 'manual', 'style' => 'color:#FFF; text-decoration:none'));?>
	       <?php endif;?>
	       <?php if($folheto = $produto->getFolheto()): ?>          
	      	<?php echo Html::anchor("uploads/arquivos/{$folheto->id}/{$folheto->nome}",'Download do Folder', array('target' => '_blank', 'class' => 'btn_azul', 'title' => 'folheto', 'style' => 'color:#FFF; text-decoration:none'));?>
	       <?php endif;?>
	      
	      </p>
      </div><!--Fecha Produtos Especificações-->
      
       <!--Comprar-->
      <div class="produto_diversos">
      	 <p><span class="preco"><?php echo $produto->getPriceFormated();?></span></p>
     	 <p><?php echo Html::anchor("carrinho/add/{$produto->url}",'COMPRAR',array('title' => 'comprar', 'style' => 'color:#FFF; text-decoration:none', 'class' => 'btn_azul')); ?></p>
      </div>
      
     <!--Produtos compartilhe
      <div class="produto_diversos">
      	  <h3>Compartilhe este Produto</h3>
	      <table width="100%" border="0" cellspacing="0" cellpadding="1">
	        <tr class="limpa_espacos">
	          <td width="280" height="30" align="left" valign="bottom">Nome do Remetente</td>
	          <td height="30" align="left" valign="bottom">Nome do Destinatário</td>
	        </tr>
	        <tr>
	          <td><label for="remetente"></label>
	          <input type="text" name="remetente" id="remetente" /></td>
	          <td><input type="text" name="destinatario" id="destinatario" /></td>
	        </tr>
	        <tr>
	          <td height="25" align="left" valign="bottom">Email do Remetente</td>
	          <td align="left" valign="bottom">Email do Destinatário</td>
	        </tr>
	        <tr>
	          <td><input type="text" name="email_remetente" id="email_remetente" /></td>
	          <td><input type="text" name="email_destinatario" id="email_destinatario" /></td>
	        </tr>
	        <tr>
	          <td height="25" colspan="2" align="left" valign="bottom">Mensagem</td>
	        </tr>
	        <tr>
	          <td colspan="2"><label for="mensagem"></label>
	          <textarea name="mensagem" id="mensagem" cols="45" rows="5"></textarea></td>
	        </tr>
	        <tr>
	          <td height="40" valign="bottom"><a href="#" title="Compartilhe este Produto" class="btn_azul" style="color:#FFF; text-decoration:none">Compartilhar</a></td>
	          <td>&nbsp;</td>
	        </tr>
	      </table>
      </div> 
      Fecha Produtos compartilhe-->
      
      <br><br>
      <div><?php echo $disqus->conteudo;?></div>
      
      <?php if($produtosRelacionados = $produto->getRelated()):?>
      	 <!--Produtos Relacionados -->
	      <div class="produto_diversos">
	      	<h3>Produtos Relacionados</h3>
	        <div class="produtos_relacionados">
	      		<?php $i = 0;?>
	      		<?php foreach($produtosRelacionados as $p):?>		    	 					    	 					    	 			   	 	
				      <div class="box_produtos">
				      	<?php if($foto = $p->getFoto()):?>
					      	<center><?php echo  Html::img("uploads/arquivos/{$foto->id}/thumb-{$foto->nome}", array('alt' => 'foto', 'border' => 0, 'title' => $p->nome));?></center>
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
	       </div>
	      </div>
	     <!--Fecha Produtos Relacionados--> 
	   <?php endif;?>
    
    </div><!--Fecha Base Produtos-->