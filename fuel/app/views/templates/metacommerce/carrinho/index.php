 	<div class="base_produtos">    
     <h1>Seu carrinho de compras</h1>
    </div>
    <?php echo Form::open(array('action' => 'carrinho/update', 'id' => 'formCar')); ?>    
	    <table width="679" border="0" cellspacing="0" cellpadding="0" class="tabela_carrinho">
	      <tr class="subtitulo" >
	        <td width="202" height="25" align="center" valign="middle" class="tabela_carrinho">Imagem</td>
	        <td align="center" valign="middle" class="tabela_carrinho">Produto</td>        
	        <td width="74" align="center" valign="middle" class="tabela_carrinho">Quant.</td>
	        <td width="115" align="center" valign="middle" class="tabela_carrinho">Preço unitário</td>
	        <td width="93" align="center" valign="middle" class="tabela_carrinho">Preço total</td>
	        <td align="center" valign="middle" class="tabela_carrinho"></td>
	      </tr>
	      <?php if($produtos = $carrinho->listProducts()):?>
	      	<?php foreach($produtos as $p):?>
		      	 <tr>
			        <td  align="center" valign="middle" class="tabela_carrinho">
			        	<?php if($foto = $p['produto']->getFoto()):?>
			        		<p><?php echo Html::img("uploads/arquivos/{$foto->id}/thumb-{$foto->nome}", array('title' => $p['produto']->nome));?></p>
						<?php endif?>
			        </td>
			        <td width="127" align="center" valign="middle" class="tabela_carrinho"><?php echo $p['produto']->nome ?></td>        
			        <td height="76" align="center" valign="middle" class="tabela_carrinho"> 
			           <span class="texto_comun">			           		
			          		<input name="produtos[<?php echo $p['produto']->id ?>]" type="number" min="1" id="quantidade" value="<?php echo $p['qtd'] ?>" />
			        	</span>
			        </td>
			        <td align="center" valign="middle" class="tabela_carrinho"><span class="precoCar"><?php echo $p['produto']->getPriceFormated() ?></span></td>
			        <td align="center" valign="middle" class="tabela_carrinho"><span class="precoCar"><strong><?php echo $p['precoTotalFormatado'] ?></strong></span></td>
			        <td align="center" valign="middle" class="tabela_carrinho">
				        <a href="<?php echo Uri::base()."carrinho/remove/{$p['produto']->url}"?>">
			        		<?php echo Asset::img('produtos/excluir.png', array('title' => 'Remover do Carrinho', 'alt' => 'Remover do Carrinho', 'width' => '24', 'height' => '24', 'border' => 0));?>
			        	</a>
			        </td>
			    </tr>
			<?php endforeach;?>	  
			<tr>
				<td colspan="2">&nbsp;</td>
	        	<td align="center" valign="middle" class="tabela_carrinho">
	        		<a href="javascript:;" data-submit="#formCar">
	        			<?php echo Asset::img('produtos/atualizar.png', array('title' => 'Atualizar Carrinho', 'alt' => 'Atualizar Carrinho', 'width' => '24', 'height' => '24', 'border' => 0));?>
	        		</a> 
	        	</td>
	        	<td colspan="3">&nbsp;</td>        	
	      	</tr>    
	      <?php else:?>
		      <tr>
		      	<td colspan="6" align="center" valign="middle" class="tabela_carrinho">
		      		Não há produtos em seu carrinho.
		      	</td>
		      </tr>
	      <?php endif;?>     
	    </table>
    <?php echo Form::close(); ?>
    <br />
    
    <?php echo Form::open(array('action' => 'carrinho/tax', 'id' => 'formTaxas')); ?>
	    <table width="679" border="0" cellspacing="0" cellpadding="0">
	      <tr>
	        <td width="165" height="120" class="texto_comun">Digite seu CEP para calcular o frete</td>
	        <td width="10"><input name="cep" type="text" class="texto_comun cep" id="cep" size="10" /></td>
	        <td><a href="javascript:;" data-submit="#formTaxas" class="btn_detalhes">Calcular</a></td>	        
	        <td><span class="texto_comun">Possui cupom de desconto:</span></td>
	        <td><input name="cupom" type="text" class="texto_comun" id="cupom" size="20" /></td>
	        <td><a href="javascript:;" data-submit="#formTaxas" class="btn_detalhes">Adicionar</a></td>	   	           
	      </tr>
	    </table>
   <?php echo Form::close(); ?>
    <br />
    <table width="679" border="0" cellspacing="0" cellpadding="10">
     <tr>
        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>SubTotal:</strong></td>
        <td align="center" valign="middle" class="tabela_carrinho"><span class="precoCar"><strong><?php echo $carrinho->getSubTotalFormatado()?></strong></span></td>
      </tr>      
      <tr>
        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>Desconto:</strong></td>
        <td align="center" valign="middle" class="tabela_carrinho"><span class="precoCar"><strong><?php echo $carrinho->getDescontoTotalFormatado()?></strong></span></td>
      </tr>  
      <tr>
        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>Frete:</strong></td>
        <td align="center" valign="middle" class="tabela_carrinho"><span class="precoCar"><strong><?php echo $carrinho->getFreteTotalFormatado()?></strong></span></td>
      </tr>          
      <tr>
        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>Total:</strong></td>
        <td align="center" valign="middle" class="tabela_carrinho"><span class="precoCar"><strong><?php echo $carrinho->getCarrinhoTotalFormatado()?></strong></span></td>
      </tr>  
       <tr>
        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>Prazo de entrega:</strong></td>
        <td align="center" valign="middle" class="tabela_carrinho"><span class="precoCar"><strong><?php echo $carrinho->getPrazo()?></strong></span></td>
      </tr>          
    </table>
	<p>	
		<a href="<?php echo Uri::base()?>" class="btn_detalhes" title="Continuar comprando">Continuar comprando</a>		
		<span style="float:right;">			
			<a href="<?php echo Uri::base().'carrinho/paypal'?>">							
				<?php echo Asset::img('btConcluirPayPal.png', array('title' => 'Pagar com PayPal', 'alt' => 'Pagar com PayPal', 'border' => 0, 'style' => 'vertical-align:top;'));?>
			</a>
		</span>		
	</p>
	<br />
  	<br />