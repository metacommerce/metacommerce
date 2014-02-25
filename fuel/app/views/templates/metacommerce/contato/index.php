 <div class="base_produtos">   
	 <h1><?php echo $titulo;?></h1>
     <p>&nbsp;</p>   
     <?php if(isset($alerta)):?>
	 	<?php echo $alerta->exibir()?>
	 <?php endif;?>	  
     <div class="ckeditor"><?php echo $bloco->conteudo;?></div>
     <?php echo Form::open(array('action' => 'contato/enviar', 'id' => 'form-enviar')); ?>
	     <table width="100%" border="0" cellspacing="0" cellpadding="1">	     	
	       <tr class="limpa_espacos">
	         <td width="280" height="30" valign="bottom">Nome</td>
	         <td valign="bottom">Telefone</td>
	       </tr>
	       <tr>
	         <td><label for="remetente"></label>
	           <input type="text" name="data[nome]" id="remetente" required/></td>
	         <td><input type="text" name="data[telefone]" id="telefone" required/></td>
	       </tr>
	       <tr>
	         <td height="25" valign="bottom">Email</td>
	         <td valign="bottom">Assunto</td>
	       </tr>
	       <tr>
	         <td><input type="email" name="data[email]" id="email" required/></td>
	         <td><input type="text" name="data[assunto]" id="Assunto" required/></td>
	       </tr>
	       <tr>
	         <td height="25" colspan="2" valign="bottom">Mensagem</td>
	       </tr>
	       <tr>
	         <td colspan="2"><label for="mensagem"></label>
	           <textarea name="data[mensagem]" id="mensagem" cols="45" rows="5" required></textarea></td>
	       </tr>
	       <tr>
	         <td height="40" valign="bottom"><button class="btn_azul" type="submit">Enviar</button></td>
	         <td>&nbsp;</td>
	       </tr>
	     </table>
	  <?php echo Form::close(); ?>
     <p>&nbsp;</p>
    </div>