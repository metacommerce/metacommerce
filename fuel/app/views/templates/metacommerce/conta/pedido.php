 	<div class="base_produtos">    
     <h1><?php echo $titulo?></h1>
    </div> 
    
    <table width="679" border="0" cellspacing="0" cellpadding="10">
	    <thead>
	    	<tr><th class="tabela_carrinho" colspan="2">Dados do Pedido</th></tr>	    	
	    </thead>
	   <tbody>
	      <tr>
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>Nº do Pedido:</strong></td>
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><?php echo $carrinho->id?></td>       
	      </tr> 
	      <tr>
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>Data:</strong></td>
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><?php echo $carrinho->getDtCadastro()?></td>       
	      </tr> 
	      <tr>
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>Status:</strong></td>
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><?php echo $carrinho->getStatus()?></td>       
	      </tr>
	      <tr>
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>Forma de Pagamento:</strong></td>
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><?php echo $carrinho->getPagto()?></td>       
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
	    <tr><th class="tabela_carrinho" colspan="5">Detalhes dos Produtos</th></tr>	    	
	  </thead>
	  <tbody>
	      <tr class="subtitulo" >	        
	        <td align="center" valign="middle" class="tabela_carrinho">Produto</td>        
	        <td width="74" align="center" valign="middle" class="tabela_carrinho">Quant.</td>
	        <td width="115" align="center" valign="middle" class="tabela_carrinho">Preço unitário</td>
	        <td width="93" align="center" valign="middle" class="tabela_carrinho">Preço total</td>       
	      </tr>
	      <?php if($produtos = $carrinho->produtos):?>
	      	<?php foreach($produtos as $p):?>
		      	 <tr>			        
			        <td width="127" align="center" valign="middle" class="tabela_carrinho"><?php echo $p->produto->nome ?></td>        
			        <td height="76" align="center" valign="middle" class="tabela_carrinho"> 
			          <?php echo $p->quantidade ?>
			        </td>
			        <td align="center" valign="middle" class="tabela_carrinho"><span class="precoCar"><?php echo $p->valorFormatado() ?></span></td>
			        <td align="center" valign="middle" class="tabela_carrinho"><span class="precoCar"><strong><?php echo $p->valorTotalFormatado() ?></strong></span></td>		       
			    </tr>
			<?php endforeach;?>	
		  <?php else:?>
		      <tr>
		      	<td colspan="4" align="center" valign="middle" class="tabela_carrinho">
		      		Não há produtos.
		      	</td>
		      </tr>
      <?php endif;?>    
	  </tbody>  		     
    </table>    
    <br />
    <table width="679" border="0" cellspacing="0" cellpadding="10">
     <tr>
        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>SubTotal:</strong></td>
        <td align="center" valign="middle" class="tabela_carrinho"><span class="precoCar"><strong><?php echo $carrinho->detalhes()->subTotal()?></strong></span></td>
      </tr>      
      <tr>
        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>Desconto:</strong></td>
        <td align="center" valign="middle" class="tabela_carrinho"><span class="precoCar"><strong><?php echo $carrinho->detalhes()->descontoTotal()?></strong></span></td>
      </tr>  
      <tr>
        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>Frete:</strong></td>
        <td align="center" valign="middle" class="tabela_carrinho"><span class="precoCar"><strong><?php echo $carrinho->detalhes()->freteTotal()?></strong></span></td>
      </tr>          
      <tr>
        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>Total:</strong></td>
        <td align="center" valign="middle" class="tabela_carrinho"><span class="precoCar"><strong><?php echo $carrinho->detalhes()->carrinhoTotal()?></strong></span></td>
      </tr>              
    </table>
    <p>
		<br />
  		<br />
		<a href="<?php echo Uri::base().'conta/pedidos'?>" class="btn_detalhes" title="Voltar">Voltar</a>				
		<br />
  		<br />
	</p>	