<div class="box" style="width:100%">
	<div class="topleft">
		<div class="topright">
			<div>
				<h2 class="login"><?php echo __('Forget your username or password?', true)?></h2>				
				<fieldset>
				    <legend><?php echo __('Forgot your username or password?', true); ?></legend>
				    <?php
				        echo $form->create('User', array('action' => 'recover'));
				        echo $form->input('email', array('label' => __('Enter your email address', true)));
				        echo $form->end(__('Retrieve Password', true));
				    ?> 
				</fieldset>
			</div>
		</div>
	</div>
	<div class="bottomleft">
		<div class="bottomright"> </div>
	</div>
</div>

