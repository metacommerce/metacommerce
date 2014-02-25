<?php echo Form::open('login/entrar'); ?>		
	<div class="login_fields">											
		
		<div class="field">
			<label for="email">Usuário (e-mail)</label>
			<input type="text" name="data[email]" value="" id="email" tabindex="1" placeholder="email@exemplo.com" autocomplete="off" />		
		</div>
		
		<div class="field">
			<label for="password">Senha<small><a href="javascript:;" id="lembrar-senha" data-url="<?php echo Uri::base().'login/lembrar'; ?>">Lembrar senha</a></small></label>					
			<input type="password" name="data[senha]" value="" id="senha" tabindex="2" placeholder="senha" />			
		</div>
						
	</div> <!-- .login_fields -->
	
	<div class="login_actions">
		<button type="submit" class="btn btn-primary" tabindex="3">Entrar</button>
	</div>
<?php echo Form::close(); ?>