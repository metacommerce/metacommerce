 <div class="base_produtos">   
	 <h1><?php echo $titulo;?></h1>
     <p>&nbsp;</p>       	
     	 <?php if(isset($alerta)):?>
		 	<?php echo $alerta->exibir()?>
		 <?php endif;?>	             
		 <table width="100%" border="0" cellspacing="0" cellpadding="0">
	       <tr>
	         <td width="50%" align="left" valign="top">
	          <?php echo Form::open(array('action' => 'conta/lembrar-senha', 'id' => 'form-lembrar')); ?>
		          <table width="260" border="0" cellspacing="0" cellpadding="0">		           
		           <tr>
		             <td height="30">Informe seu e-mail:</td>
		           </tr>
		           <tr>
		             <td><input type="email" name="email" required /></td>
		           </tr>
		           <tr>
		             <td height="35">&nbsp;</td>
		           </tr>		          
		           <tr>
		             <td>
		            	<button class="btn_azul" type="submit" title="lembrar Senha">Lembrar</button>
		            	<a href="<?php echo Uri::base().'conta'?>" class="btn_detalhes" title="Voltar">Voltar</a>		             		             	
		             </td>	            
		           </tr>       
		          </table>
		       <?php echo Form::close(); ?>
	         </td>	       		      
	       </tr>
	     </table>
     <p>&nbsp;</p>
    </div>