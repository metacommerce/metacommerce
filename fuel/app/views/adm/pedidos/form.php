<div class="grid-24">																					
	<div class="widget">			
		<div class="widget-content">						
			<?php echo Form::open(array('action' => 'adm/pedidos/save', 'class' => 'form validateForm', 'enctype' => 'multipart/form-data')); ?>
				
				<?php echo Form::hidden('id', $model->id);?>	
					
				<h2>Dados do Pedido</h2>
					
				<div class="field-group">												
					<div class="field">
						<b>Nº do Pedido:</b>
						<?php echo $model->id?>	
					</div>
					<br>
					<div class="field">
						<b>Data da Compra:</b>
						<?php echo $model->getDtCadastro()?>
					</div>
					<div class="field">
						<b>Status:</b>
						<?php echo $model->getStatus()?>
					</div>
					<div class="field">
						<b>Forma de Pagamento:</b>
						<?php echo $model->getPagto()?>
					</div>
				</div>	
				
				<hr>
				
				<?php if($model->endereco):?>
				
					<h2>Endereço de entrega</h2>
					
					<div class="field-group">												
						<div class="field">
							<b>CEP:</b>
							<?php echo $model->endereco->cep?>
						</div>
						<br>
						<div class="field">
							<b>Endereço:</b>
							<?php echo $model->endereco->endereco?>
						</div>					
						<div class="field">
							<b>Bairro:</b>
							<?php echo $model->endereco->bairro?>
						</div>
						<div class="field">
							<b>Cidade / Estado:</b>
							<?php echo $model->endereco->cidade .' / '. $model->endereco->estado?>
						</div>					
					</div>	
					<div class="field-group">
						<div class="field">
							<b>Observações:</b>
							<?php echo $model->endereco->complemento?>
						</div>
					</div>	
					
					<hr>
					
				<?php endif;?>
				
				<h2>Detalhes dos Produtos</h2>
													      
			    <table class="table table-striped">			      
				  <tbody>
				      <tr class="subtitulo" >	        
				        <td  class="tabela_carrinho">Produto</td>        
				        <td  class="tabela_carrinho">Quant.</td>
				        <td  class="tabela_carrinho">Preço unitário</td>
				        <td  class="tabela_carrinho">Preço total</td>       
				      </tr>
				      <?php if($produtos = $model->produtos):?>
				      	<?php foreach($produtos as $p):?>
					      	 <tr>			        
						        <td class="tabela_carrinho"><?php echo $p->produto->nome ?></td>        
						        <td class="tabela_carrinho"> 
						          <?php echo $p->quantidade ?>
						        </td>
						        <td  class="tabela_carrinho"><?php echo $p->valorFormatado() ?></td>
						        <td  class="tabela_carrinho"><?php echo $p->valorTotalFormatado() ?></td>		       
						    </tr>
						<?php endforeach;?>	
					  <?php else:?>
					      <tr>
					      	<td colspan="4"  class="tabela_carrinho">
					      		Não há produtos.
					      	</td>
					      </tr>
			      <?php endif;?>    
				  </tbody>
				 <tfoot>
				 	 <tr class="sub_total">
				 	 	<td>&nbsp;</td>
				 	 	<td>&nbsp;</td>
				 	 	<td>&nbsp;</td>
			        	<td class="tabela_carrinho" colspan="">
			        		<table>
			        			<tr><td><b>SubTotal:</b></td><td><?php echo $model->detalhes()->subTotal()?></td></tr>
			        			<tr><td><b>Desconto:</b></td><td><?php echo $model->detalhes()->descontoTotal()?></td></tr>
			        			<tr><td><b>Frete:</b></td><td><?php echo $model->detalhes()->freteTotal()?></td></tr>
			        			<tr><td><b>Total:</b></td><td><?php echo $model->detalhes()->carrinhoTotal()?></td></tr>
			        		</table>			        		
			        	</td>			     
			      	 </tr>      			    			      
				 </tfoot> 		     
			    </table>  			    	    				  			
					
				<div class="actions">
					<?php if($model->status != $model::STATUS_DESPACHADO &&
							 $model->status != $model::STATUS_CRIADO):?>	
						<button type="submit" class="btn btn-black btn-small" tabindex="3" data-confirm="Tem certeza que deseja despachar este Pedido? Esta alteração não poderá ser desfeita.">
							<span class="icon-steering-wheel"></span>
							Despachar Pedido
						</button>
					<?php endif;?>
					<?php echo Html::anchor('adm/pedidos', 'Cancelar', array('class' => 'btn btn-error btn-small')); ?>
				</div>
			<?php echo Form::close(); ?>
		</div>
	</div>
</div>