		<!--Banner-->
    	<div id="content">
			<div class="border_box">
				<div class="box_skitter box_skitter_large">
					<ul>
						<?php foreach($banners as $m):?>
							<?php if($img = $m->getBanner()):?>
								<li>							
									<a href="<?php echo $m->link ?: 'javascript:;';?>" title="<?php echo $m->nome;?>">
										<img src="<?php echo Uri::base()."uploads/arquivos/{$img->id}/{$img->nome}";?>" class="cube" title="<?php echo $m->link;?>" />
									</a>
									<div class="label_text"><p><?php echo $m->nome;?></p></div>
								</li>	
							<?php endif?>																		
						<?php endforeach;?>						
                      </ul>
				</div>
			</div>
		</div>