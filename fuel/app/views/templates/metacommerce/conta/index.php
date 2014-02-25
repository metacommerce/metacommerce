 <div class="base_produtos">   
	 <h1><?php echo $titulo;?></h1>
     <p>&nbsp;</p>       	
     	 <?php if(isset($alerta)):?>
		 	<?php echo $alerta->exibir()?>
		 <?php endif;?>	             
		 <table width="100%" border="0" cellspacing="0" cellpadding="0">
	       <tr>
	         <td width="50%" align="left" valign="top">
	          <?php echo Form::open(array('action' => 'conta/entrar', 'id' => 'form-entrar')); ?>
		          <table width="260" border="0" cellspacing="0" cellpadding="0">
		           <tr>
		             <td height="40" class="subtitulo">Já é cadastrado?</td>
		           </tr>
		           <tr>
		             <td height="30">Seu e-mail</td>
		           </tr>
		           <tr>
		             <td><label for="login_email"></label>
		               <input type="email" name="login[email]" required /></td>
		           </tr>
		           <tr>
		             <td height="30">Sua senha</td>
		           </tr>
		           <tr>
		             <td><label for="login_senha"></label>
		               <input type="password" name="login[senha]" required /></td>
		           </tr>
		            <tr>
		             <td height="35">&nbsp;</td>
		           </tr>
		           <tr>
		             <td>
		            	<button class="btn_azul" type="submit" title="Entrar em sua conta">Entrar</button>		             
		             	<a href="<?php echo \Uri::base().'conta/lembrar-senha'?>" title="Esqueci minha senha">Esqueci minha senha</a>		             	
		             </td>	            
		           </tr>	         
		          </table>
		       <?php echo Form::close(); ?>
	         </td>
	         <td align="left" valign="top">
	          <?php echo Form::open(array('action' => 'conta/cadastrar', 'id' => 'form-cadastrar')); ?>
		         <table width="260" border="0" cellspacing="0" cellpadding="0">
		           <tr>
		             <td height="40" class="subtitulo">Ainda não é cadastrado no site?</td>
		           </tr>
		           <tr>
		             <td height="30">Nome</td>
		           </tr>
		           <tr>
		             <td><label for="cadastro_nome"></label>
		               <input type="text" name="cadastro[nome]" required /></td>
		           </tr>
		           <tr>
		             <td height="30">E-mail</td>
		           </tr>
		           <tr>
		             <td><label for="cadastro_email"></label>
		               <input type="email" name="cadastro[email]" required /></td>
		           </tr>	
		           <tr>
		             <td height="30">Telefone</td>
		           </tr>
		           <tr>
		             <td>
		               <label for="cadastro_telefone"></label>
		               <input class="phone" type="text" name="cadastro[tel_fixo]" required />
		             </td>
		           </tr>
		           <tr>
		             <td height="30">Data de nascimento</td>
		           </tr>
		           <tr>
		             <td>
		               <label for="cadastro_nascimento"></label>
		               <input type="text" name="nascimento[dia]" style="display:inline !important; width:20px;" maxlength="2" required />
		               <input type="text" name="nascimento[mes]" style="display:inline !important; width:20px;" maxlength="2" required />
		               <input type="text" name="nascimento[ano]" style="display:inline !important; width:30px;" maxlength="4" required />
		               dd/mm/aaaa
		             </td>
		           </tr>		
		           <tr>
		             <td height="30">Sexo</td>
		           </tr>
		           <tr>
		             <td>		               
		               <input type="radio" name="cadastro[sexo]" value="m" style="display:inline !important; width:30px;" checked  />
		               Masculino
		               <br />
		               <input  type="radio" name="cadastro[sexo]" value="f" style="display:inline !important; width:30px;" />
		               Feminino
		             </td>
		           </tr>		                   
		           <tr>
		             <td height="30">CPF</td>
		           </tr>
		           <tr>
		             <td>
		               <label for="cadastro_cpf"></label>
		               <input class="cpf" type="text" name="cadastro[documento]" required />
		             </td>
		           </tr>
		           <tr>
		             <td height="30">Crie sua senha</td>
		           </tr>
		           <tr>
		             <td>
		               <label for="cadastro_senha"></label>
		               <input type="password" name="cadastro[senha]" maxlength="20" required />
		             </td>
		           </tr>	
		            <tr>
		             <td height="30">Confirme sua senha</td>
		           </tr>
		           <tr>
		             <td>
		               <label for="cadastro_confirmar_senha"></label>
		               <input type="password" name="senha_confirmar" maxlength="20" required />
		             </td>
		           </tr>		         
		           <tr>
		             <td height="35">&nbsp;</td>
		           </tr>
		           <tr>
		             <td>
		             	<button class="btn_azul" type="submit" title="Cadastrar-se no site">Cadastrar</button>
		             </td>
		           </tr>
		         </table>
		       <?php echo Form::close(); ?>
	        </td>
	       </tr>
	     </table>
     <p>&nbsp;</p>
    </div>