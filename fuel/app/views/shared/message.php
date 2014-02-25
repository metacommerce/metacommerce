<?php if($message):?>

	<div class="widget" id="message">
									
		<div class="widget-content">
						
			<div class="notify <?php echo $message->getType(); ?>">
			
				<a href="javascript:;" class="close">&times;</a>
			
				<h3><?php echo $message->getTitle(); ?></h3>
			
				<ul>
					<?php echo $message->getMessages(); ?>
				</ul>
			
				
			</div> <!-- .notify -->
															
		</div>
		
	</div> <!-- #/message -->
<?php endif; ?>