<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

	<title><?php if(isset($title)) echo $title;?></title>

	<meta charset="utf-8" />
	<meta name="description" content="" />
	<meta name="author" content="" />		
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	
	<?php echo Asset::css(array('reset.css', 'text.css', 'buttons.css', 'theme-default.css', 'login.css')); ?>

</head>

<body>

<div id="login">
	<h1>Dash</h1>
	<div id="login_panel">
		<?php if(isset($message)):?>
			<div class="field notify <?php echo $message->getType();?>">
				<?php echo $message->getMessages('<span>','</span>');?>
			</div>
		<?php endif; ?>		
		<?php if(isset($content)) echo $content;?>		
	</div> <!-- #login_panel -->		
</div> <!-- #login -->

<?php echo Asset::js('all.js'); ?>

</body>
</html>