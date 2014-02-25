<ul id="mainNav">
	<li id="" class="nav nav-loja">
		<span class="icon-home"></span>
		<?php echo Html::anchor('adm/loja', 'Loja'); ?>						
	</li>
	<li id="" class="nav nav-pedidos nav-adm">
		<span class="icon-curved-arrow"></span>
		<?php echo Html::anchor('adm/pedidos', 'Pedidos'); ?>						
	</li>	
	<li id="" class="nav nav-paypal">
		<span class="icon-cog-alt"></span>
		<?php echo Html::anchor('javascript:;', 'Faturamento'); ?>				
		<ul class="subNav">
			<li>
				<?php echo Html::anchor('adm/paypal', 'Integração com PayPal'); ?>			
			</li>									
		</ul>			
	</li>	
	<li id="" class="nav nav-textos">
		<span class="icon-article"></span>
		<?php echo Html::anchor('javascript:;', 'Textos'); ?>				
		<ul class="subNav">
			<li>
				<?php echo Html::anchor('adm/textos/quem_somos', 'Página Quem Somos'); ?>	
			</li>
			<li>
				<?php echo Html::anchor('adm/textos/como_comprar', 'Página Como Comprar'); ?>	
			</li>				
			<li>
				<?php echo Html::anchor('adm/textos/contato', 'Página Contato'); ?>	
			</li>								
		</ul>			
	</li>	
	<li id="" class="nav nav-ferramentas">
		<span class="icon-wrench"></span>
		<?php echo Html::anchor('javascript:;', 'Ferramentas'); ?>				
		<ul class="subNav">
			<li>
				<?php echo Html::anchor('adm/ferramentas/sharethis', 'ShareThis'); ?>	
			</li>
			<li>
				<?php echo Html::anchor('adm/ferramentas/disqus', 'Disqus'); ?>	
			</li>
			<li>
				<?php echo Html::anchor('adm/ferramentas/google', 'Google Analytics'); ?>	
			</li>		
		</ul>			
	</li>	
	<li id="" class="nav nav-cupons">
		<span class="icon-document-stroke"></span>
		<?php echo Html::anchor('adm/cupons', 'Cupons de desconto'); ?>						
	</li>		
	<li id="" class="nav nav-categorias">
		<span class="icon-folder-fill"></span>
		<?php echo Html::anchor('adm/categorias', 'Categorias'); ?>						
	</li>
	<li id="" class="nav nav-produtos">
		<span class="icon-iphone"></span>
		<?php echo Html::anchor('adm/produtos', 'Produtos'); ?>						
	</li>
	<li id="" class="nav nav-banners">
		<span class="icon-document-alt-fill"></span>
		<?php echo Html::anchor('adm/banners', 'Banners'); ?>						
	</li>	
	<li id="" class="nav nav-administradores">
		<span class="icon-user"></span>
		<?php echo Html::anchor('adm/administradores', 'Administradores'); ?>						
	</li>	
	<li id="" class="nav nav-clientes">
		<span class="icon-user"></span>
		<?php echo Html::anchor('adm/clientes', 'Clientes'); ?>						
	</li>	
	<li id="" class="nav nav-blog">
		<span class="icon-share"></span>
		<?php echo Html::anchor('adm/blog', 'Blog'); ?>						
	</li>			
</ul>