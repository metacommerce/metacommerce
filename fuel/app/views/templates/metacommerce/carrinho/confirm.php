 	<div class="base_produtos">    
     <h1>Obrigado por comprar conosco</h1>
    </div> 
    <table width="679" border="0" cellspacing="0" cellpadding="10">
	    <thead>
	    	<tr><th class="tabela_carrinho" colspan="2">Dados do seu pedido</th></tr>	    	
	    </thead>
	   <tbody>
	      <tr>        
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><strong>Número do seu pedido:</strong></td>
	        <td height="25" align="right" valign="middle" class="tabela_carrinho"><?php echo $carrinho->id?></td>
	      </tr>
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
    
    <p>
		<br />
  		<br />
		<a href="<?php echo Uri::base()?>" class="btn_detalhes" title="Comprar outros produtos">Comprar outros produtos</a>				
		<br />
  		<br />
	</p>	