 <div class="base_produtos">   
	 <h1><?php echo $titulo;?></h1>
     <p>&nbsp;</p>       	
     <table width="679" border="0" cellspacing="0" cellpadding="0" class="tabela_carrinho tabela_pedidos">
     	<thead>
	      <tr class="subtitulo" height="40" >
	        <td width="80" align="center" valign="middle" class="texto_comun">Pedido</td>
	        <td width="199" align="center" valign="middle" class="texto_comun">Data</td>
	        <td width="199" align="center" valign="middle" class="texto_comun">Status</td>
	        <td width="83" align="center" valign="middle">&nbsp;</td>
	      </tr>
	    </thead>     
     	 <tbody>	
     	  <?php if(count($model)): ?>
			<?php foreach($model as $m): ?>
			      <tr height="30">
			        <td align="center" valign="middle"  class="texto_comun"><?php echo $m->id?></td>
			        <td align="center" valign="middle"  class="texto_comun"><?php echo $m->dt_cadastro?></td>
			        <td align="center" valign="middle"  class="texto_comun"><?php echo $m->getStatus()?></td>
			        <td align="center" valign="middle"><a href="<?php echo \Uri::base()."conta/pedidos/detalhes/{$m->id}"?>" class="btn_detalhes" title="Detalhes do Pedido">Exibir Detalhes</a></td>
			      </tr>
			 <?php endforeach;?>
			 <?php else:?>
			 	<tr>
					<td colspan="4" align="center" valign="middle">Nenhum pedido realizado</td>											
				</tr>
		 <?php endif;?>
		</tbody>		
	     <tfoot>
				<tr>
					<td colspan="4" align="left" valign="middle" >&nbsp;<?php echo $pagination;?></td>											
				</tr>
		  </tfoot>
    </table>
 </div>