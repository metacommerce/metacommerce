 	<div class="base_produtos">    
     <h1>Confirme se as informações do seu pedido estão corretas</h1>
    </div> 
    
    <table width="679" border="0" cellspacing="0" cellpadding="10">
	    <thead>
	    	<tr><th class="tabela_carrinho" colspan="2">Dados Pessoais</th></tr>	    	
	    </thead>
	   <tbody>
	      <tr>
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>Nome:</strong></td>
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><?php echo $carrinho->cliente->nome?></td>       
	      </tr> 
	       <tr>        
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>Email:</strong></td>
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><?php echo $carrinho->cliente->email?></td>
	      </tr>
		</tbody>           
    </table>    
    <br />
    
    <table width="679" border="0" cellspacing="0" cellpadding="10">
	    <thead>
	    	<tr><th class="tabela_carrinho" colspan="2">Endereço de entrega</th></tr>	    	
	    </thead>
	   <tbody>
	      <tr>
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>CEP:</strong></td>
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><?php echo $carrinho->endereco->cep?></td>       
	      </tr> 
	      <tr>        
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>Endereço:</strong></td>
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><?php echo $carrinho->endereco->endereco?></td>
	      </tr>
	       <tr>        
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>Bairro:</strong></td>
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><?php echo $carrinho->endereco->bairro?></td>
	      </tr>
	      <tr>        
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>Cidade / Estado:</strong></td>
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><?php echo $carrinho->endereco->cidade .' / '. $carrinho->endereco->estado?></td>
	      </tr>
	       <tr>        
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>Observações:</strong></td>
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><?php echo $carrinho->endereco->complemento?></td>
	      </tr>
		</tbody>           
    </table>    
    <br />
     
    <table width="679" border="0" cellspacing="0" cellpadding="10" class="tabela_carrinho">
      <thead>
	    <tr><th class="tabela_carrinho" colspan="5">Detalhes do pedido</th></tr>	    	
	  </thead>
	  <tbody>
	      <tr class="subtitulo" >
	        <td width="202" height="25" align="center" valign="middle" class="tabela_carrinho">Imagem</td>
	        <td align="center" valign="middle" class="tabela_carrinho">Produto</td>        
	        <td width="74" align="center" valign="middle" class="tabela_carrinho">Quant.</td>
	        <td width="115" align="center" valign="middle" class="tabela_carrinho">Preço unitário</td>
	        <td width="93" align="center" valign="middle" class="tabela_carrinho">Preço total</td>       
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
			          		<input name="produtos[<?php echo $p['produto']->id ?>]" type="number" min="1" id="quantidade" value="<?php echo $p['qtd'] ?>" disabled/>
			        	</span>
			        </td>
			        <td align="center" valign="middle" class="tabela_carrinho"><span class="precoCar"><?php echo $p['produto']->getPriceFormated() ?></span></td>
			        <td align="center" valign="middle" class="tabela_carrinho"><span class="precoCar"><strong><?php echo $p['precoTotalFormatado'] ?></strong></span></td>		       
			    </tr>
		<?php endforeach;?>	
	  </tbody>  		
      <?php else:?>
	      <tr>
	      	<td colspan="5" align="center" valign="middle" class="tabela_carrinho">
	      		Não há produtos em seu carrinho.
	      	</td>
	      </tr>
      <?php endif;?>     
    </table>    
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
		<br />
  		<br />
		<a href="<?php echo Uri::base().'carrinho'?>" class="btn_detalhes" title="Voltar">Voltar</a>		
		<span style="float:right">
			<a href="<?php echo Uri::base().'carrinho/paypal-confirm'?>" class="btn_detalhes" title="Confirmar Pedido">CONFIRMAR PEDIDO</a>			
		</span>
		<br />
  		<br />
	</p>	