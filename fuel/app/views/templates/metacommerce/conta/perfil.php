 <div class="base_produtos">   
	 <h1><?php echo $titulo;?></h1>
     <p>&nbsp;</p>       	
     	 <?php if(isset($alerta)):?>
		 	<?php echo $alerta->exibir()?>
		 <?php endif;?>	   
		 <?php echo Form::open(array('action' => 'conta/perfil', 'id' => 'form-cadastrar')); ?>          
			 <table width="100%" border="0" cellspacing="0" cellpadding="0">
		       <tr>	         	        
		         <td align="left" valign="top">		         
			         <table width="260" border="0" cellspacing="0" cellpadding="0">		          
			           <tr>
			             <td height="30">Nome</td>
			           </tr>
			           <tr>
			             <td><input value="<?php echo $cliente->nome?>" type="text" name="cadastro[nome]" required /></td>
			           </tr>
			           <tr>
			             <td height="30">E-mail</td>
			           </tr>
			           <tr>
			             <td><input value="<?php echo $cliente->email?>" type="email" name="cadastro[email]" required /></td>
			           </tr>	
			           <tr>
			             <td height="30">Telefone Fixo</td>
			           </tr>
			           <tr>
			             <td>        
			               <input value="<?php echo $cliente->tel_fixo?>" class="phone" type="text" name="cadastro[tel_fixo]" required />
			             </td>
			           </tr>			         
			         </table>			      
		        </td>
		        <td align="left" valign="top">
		        	<table width="260" border="0" cellspacing="0" cellpadding="0">		          			       
			           <tr>
			             <td height="30">Telefone Celular</td>
			           </tr>
			           <tr>
			             <td>        
			               <input value="<?php echo $cliente->tel_celular ?>" class="phone" type="text" name="cadastro[tel_celular]" required />
			             </td>
			           </tr>		          
			           <tr>
			             <td height="30">Troque sua senha</td>
			           </tr>
			           <tr>
			             <td>
			               <label for="cadastro_senha"></label>
			               <input type="password" name="senha" maxlength="20" />
			             </td>
			           </tr>	
			            <tr>
			             <td height="30">Confirme sua senha</td>
			           </tr>
			           <tr>
			             <td>
			               <label for="cadastro_confirmar_senha"></label>
			               <input type="password" name="senha_confirmar" maxlength="20" />
			             </td>
			           </tr>		         
			           <tr>
			             <td height="35">&nbsp;</td>
			           </tr>
			           <tr>
			             <td>
			             	<button class="btn_azul" type="submit" title="Salvar Cadastro">Salvar</button>
			             </td>
			           </tr>
			         </table>
		        </td>
		       </tr>
		     </table>
	 <?php echo Form::close(); ?>
     <p>&nbsp;</p>
    </div>