<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

	<title><?php if(isset($title)) echo $title; ?></title>

	<meta charset="utf-8" />
	<meta name="description" content="" />
	<meta name="author" content="" />		
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	<?php echo Asset::css('all.css'); ?>
	
</head>

<body>

<div id="wrapper">
	
	<div id="header">
		<h1>		
			<?php  echo Html::img('assets/css/img/metacommerce.png');?>			
		</h1>				
		<a href="javascript:;" id="reveal-nav">
			<span class="reveal-bar"></span>
			<span class="reveal-bar"></span>
			<span class="reveal-bar"></span>
		</a>
	</div> <!-- #header -->
	
	<!-- 
	<div id="search">
		<form>
			<input type="text" name="search" placeholder="Search..." id="searchField" /> 
		</form>		
	</div> 
	-->
	
	<div id="sidebar">	
		<?php echo Form::hidden(null, Uri::segment(2) ?: Uri::segment(1), array('id' => 'nav-active')); ?>	
		<?php if(isset($menu)) echo $menu; ?>			
	</div> <!-- #sidebar -->
	
	<div id="content">		
		
		<div id="contentHeader">
			<h1><?php if(isset($title)) echo $title; ?></h1>
		</div> <!-- #contentHeader -->	
		
		<div class="container">
					
			<?php if(isset($message)) 	echo $message; ?>
			
			<?php if(isset($content)) 	echo $content; ?>		
			
		</div> <!-- .container -->
		
	</div> <!-- #content -->
	
	<div id="topNav">
		 <ul>
		 	<li id="name-user">		 		
		 		Olá, <?php echo $usuario_nome; ?>. 			 			 				 				 	
		 		<?php echo Html::anchor("adm/administradores/edit/{$usuario_id}", 'Alterar cadastro'); ?> |	 		
		 		<?php echo Html::anchor('/', 'Ver loja', array('target' => '_blank')); ?> |
		 		<?php echo Html::anchor('login/sair', 'Sair', array('data-confirm' => 'Tem certeza que deseja sair da área administrativa?')); ?>		 				 					 		
	 		</li>		 
		 </ul>
	</div> <!-- #topNav -->

	
	
</div> <!-- #wrapper -->

<div id="footer">
	<?php echo Html::anchor('http://metacommerce.com.br', Html::img('assets/css/img/logo-cliente-adm.png'), array('target' => '_blank', 'title' => 'metacommerce.com.br')); ?>
</div>

<?php echo Asset::js(array('all.js', 'ckeditor/ckeditor.js')); ?>

</body>
</html>