<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php Asset::add_path('assets/templates/metacommerce/');?>
	<?php echo Asset::css(array('style.css','internas.css','skitter.styles.css','menu.css','botoes_ie.css', 'jquery.ad-gallery.css')); ?>
	<title><?php echo $title;?></title>

	<link rel="Shortcut Icon" href="favicon.ico" />
	<meta name="DESCRIPTION" content="<?php echo $description;?>" />
	<meta name="KEYWORDS" content="<?php echo $keywords;?>" />
	<meta name="ABSTRACT" content="<?php echo $abstract;?>" />
	<meta name="URL" content="<?php echo Uri::base();?>" />
	<meta name="AUTOR" content="metacommerce - http://www.metacommerce.com.br" />
	<meta name="COMPANY" content="metacommerce.com.br" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta property="og:description" content="<?php echo $description;?>"/> 
	<meta property="og:url" content="<?php echo Uri::base();?>"/> 
	<meta property="og:site_name" content="<?php echo $loja->nome;?>"/> 
	<meta property="og_type" content="website" />
	<meta itemprop="name" content="<?php echo $loja->nome;?>" />
	<meta itemprop="description" content="<?php echo $description;?>" />

	<!--[if lte IE 6]>
		<style type='text/css'>
		  * html #main, * html #container, #side a, a.trigger, .accordion .inner {height:1%}
		  #lenta{height:52px}
		</style>
		<script type="text/javascript">
		   try { document.execCommand( "BackgroundImageCache", false, true); } catch(e) {};
		</script>
	<![endif]-->
	<!--[if lte IE 7]>
		<style type="text/css">
		  .accordion .inner {position:static; overflow:visible}
		</style>
	<![endif]-->

</head>
<body>

<!--TOPO -->

<div id="topo">
	<!--Logomarca -->
	
	<div class="logomarca">
		<?php echo Html::img('assets/css/img/logo-cliente-adm.png', array('title' => 'logo', 'alt' => 'logo'));?>
	</div>
	
    <!--Pesquisa Carrinho e Login-->
  <div class="itens_topo">
  	 <!--Procurar-->
    <div class="procurar">
    <?php echo Form::open(array('action' => 'produtos/busca', 'id' => 'form-procurar')); ?>    	
     	<label for="procurar" for="procurar">Procurar</label>
        <input type="text" name="busca" id="procurar" />
     	<a href="javascript:;" id="procurar_botao" title="procurar" data-submit="#form-procurar"></a> 
     <?php echo Form::close(); ?>
   </div>
     <!--Carrinho-->
     <div class="carrinho">
     	<a href="<?php echo Uri::base().'carrinho'?>" title="Ver seu carrinho de compras"><?php echo Asset::img('ico_carrinho.gif', array('title' => 'carrinho', 'alt' => 'carrinho', 'width' => '33', 'height' => '31', 'border' => 0));?><input name="carrinho" type="text" id="carrinho-info" value="<?php echo $carrinho->getInfo() ?>" disabled></a>     	
     </div>
     <?php if($autenticado):?>
     		 <!--Pedidos -->
      		<div class="login">
      			Olá, <a href="<?php echo Uri::base().'conta/perfil'?>" title="Editar Cadastro"><?php echo \Session::get('cliente.nome')?></a> <a href="<?php echo Uri::base().'conta/sair'?>" class="btn_azul" title="Sair da conta">Sair</a>
      			&nbsp; <a href="<?php echo Uri::base().'conta/pedidos'?>" class="btn_azul" title="Consultar Pedidos">Meus Pedidos</a>      			
      		</div>
     	<?php else:?>
     	 <!--Login-->
     	 <div class="login"> Entre com seu <a href="<?php echo Uri::base().'conta'?>" class="btn_azul" title="Faça seu login">Login</a> ou <a href="<?php echo Uri::base().'conta'?>" class="btn_azul" title="Crie sua conta">Crie sua Conta</a></div>
     <?php endif;?>
     
  </div><!--FECHA Pesquisa Carrinho e Login-->
  
</div><!--FECHA TOPO -->

<!--MENU-->
<div id="menu_base">
  <?php echo $loja->menuTopo;?>
</div>
<!--Fecha MENU-->

<!--MEIO-->

<div id="meio">

	<!--ESQUERDA-->
    <div class="base_esquerda">
    
    	<!-- Menu em categorias -->
    	<?php echo $loja->menuLateral;?>
   		   
   		<!--Produtos em Destaques-->     
        <?php echo $loja->produtosEmDestaque;?>
                  
	</div><!--FECHA ESQUERDA-->
    
    <!--DIREITA-->
    <div class="base_direita">
    
	    <!--Banners-->    
	    <?php if(empty($controller)):?> 
       	 <?php echo $loja->banners;?>	
       	<?php endif;?>
               	    	    
    	<?php if(isset($content)) echo $content;?>
    
	      <!--Footer-->
	      <div id="clear"></div>
	      <div class="footer">	     
	      	<div class="footer_texto">	      			      		
	      		<?php echo "{$loja->nome} - {$loja->endereco} - {$loja->cidade}/{$loja->estado} <br> {$loja->documento} <br> {$loja->telefone}"; ?>	      		
	      	</div>			
	        <div class="footer_logo" style="margin-right:200px;">	        
	        	<a href="http://metacommerce.com.br" target="_blank" title="metacommerce.com.br">
	        		<?php echo Asset::img('logo.png', array('title' => 'metacommerce.com.br', 'alt' => 'metacommerce.com.br', 'width' => '268', 'height' => '50', 'border' => 0));?>
	        	</a>
	        	<div class="footer_texto">
		      		<p>
		      		 COPYRIGHT © 2014 MetaCommerce <br>
		      		 www.metacommerce.com.br
		      	    </p>
	      		</div>	        	 
	        </div>
	      </div>
      
   </div><!--FECHA DIREITA-->
   
</div><!--Fecha CONTEUDO-->

	
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
	<?php echo Asset::js(array('home.js')); ?>

	<?php echo $google->getConteudo() ?>
</body>
</html>
