	<div id="login_panel" class="modal_panel">	
		<?php echo Form::open('login/lembrar'); ?>		
			<div class="login_fields">
										
				<div class="field">
					<label for="email">Informe seu e-mail</label>
					<input type="email" name="data[email]" value="" id="email" tabindex="1" placeholder="email@exemplo.com" required autocomplete="off"/>		
				</div>
						
			</div> <!-- .login_fields -->
			
			<div class="login_actions">
				&nbsp;&nbsp;<button type="submit" class="btn btn-primary" tabindex="3">Lembrar</button>
				&nbsp;&nbsp;<button type="button" class="btn btn-error close-modal" tabindex="3">Cancelar</button>
			</div>
			<br>
		<?php echo Form::close(); ?>
	</div>
	
