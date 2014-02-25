	<strong class="titulo_categoria">Categorias</strong>    
     <!--Menu Prod -->        
       <div id="wrapper"> 
      	<div id="content">  
            <div id="container"></div>
                <div id="side">         
                	<ul class="accordion">
                		<?php if(count($categorias)):?>					
                			<?php foreach($categorias as $m):?>   
                				<?php $categoriasFilhas = $m->categorias;?>
                				<li class="last-child">
                					<?php echo Html::anchor((($categoriasFilhas)? 'javascript:;' : "produtos/{$m->url}"), $m->nome, array('class' => 'menu1', 'style' => 'display: block;', 'title' => $m->nome, 'id' => $m->url));?>
                					<?php if($categoriasFilhas):?>
                						<ul style="display: none;">
                							<?php foreach($categoriasFilhas as $f):?>   
	                           					 <li class="last-child">
	                           					 	<?php echo Html::anchor("produtos/{$f->url}", "{$f->nome} ({$f->totalProdutosPublicados()})", array('class' => 'trigger2', 'style' => 'display: block;', 'title' => $f->nome, 'id' => $f->url));?>
	                           					 </li>   
                           					<?php endforeach;?>                        						
                        				</ul>
                					<?php endif?>
                				</li>
                			<?php endforeach;?>
                		<?php endif;?>                                                                  
                	</ul>
        	</div>
  		</div>
	</div><!--./#wrapper -->