<?php
	echo $javascript->link('http://platform.twitter.com/anywhere.js?id=rEEmmgMVnfiU2gBUdFWN9Q&amp;v=1', false);
	echo $javascript->codeBlock("$(document).ready(function() {twttr.anywhere(function(T) {
		T('#twitter-login').connectButton();
	});})");
?>
<div class="clearfix"></div>
<div id="left-col">
	<div class="box"  style="width:99%">
		<div class="topleft">
			<div class="topright">
				<div>
					<h2 class="login"><?php echo sprintf(__('Welcome to %s', true), $html->tag('span', $appConfigurations['name']))?></h2>
					<p><?php echo sprintf(__('Welcome to %s', true), $appConfigurations['name'])?></p>
					<p><?php echo sprintf(__('%s helps you view your electrical usage and compare it on a global scale.', true), strtolower($appConfigurations['name']))?>
					<fieldset>
					    <legend><?php echo __('Optional: Start with an existing account', true); ?></legend>   
					    <?php echo $html->image('login-fb-connect.png', array('alt' => __('Sign in with Facebook', true), 'url' => array('controller' => 'oauth', 'action' => 'authorize', 'facebook'))); ?><br />
					    <?php echo __('or', true); ?><br /> 
						<span id="twitter-login"></span> 
					   
					</fieldset>
					<hr />
					<?php echo $form->create('User'); ?>
					<fieldset>
					    <legend><?php echo __('Or start a new account', true); ?></legend>
					    <?php
					        echo $form->input('username', array('label' => __('Choose a username (no spaces)', true)));
					        echo $form->input('before_password', array('type' => 'password', 'label' => __('Choose a password', true))); 
					        echo $form->input('retype_password', array('type' => 'password', 'label' => __('Retype a password', true)));
					        echo $form->input('email', array('label' => __('Email address (must be real!)', true)));  
				  			echo $form->input('Account.location', array('label' => __('Current Location', true)));  
					        echo $form->input('Account.newsletter', array('label' => __('Send me occasional update', true)));
					        echo $form->input('Account.date_of_birth', array('minYear' => (date('Y') - $appConfigurations['Dob']['year_min']), 'maxYear' => (date('Y') -$appConfigurations['Dob']['year_max']), 'label' => __('Date of birth', true), 'after' => $html->tag('div', $html->link(__('Why do we need this?', true), array('controller' => 'pages', 'action' => 'display', 'why:birth'), array('class' => 'modal blue')))));
					    	echo $form->input('Account.gender_id', array('label' => __('Gender', true)));
						?> 
						
					    <?php if (Configure::read('Recaptcha.enabled')): ?>
					        <label><?php echo __('Enter the text in the image', true) ?></label>
					        <?php echo $recaptcha->getHtml(!empty($recaptchaError) ? $recaptchaError : null); ?>
					    <?php endif; ?> 

					    <?php 
					        echo $html->div('terms', sprintf(__('I agree to the %s and %s', true), $html->link(__('terms and conditions', true), array('controller' => 'pages', 'action' => 'view', 'terms'), array('class' => 'modal blue')), $html->link(__('privacy policy', true), array('controller' => 'pages', 'action' => 'view', 'privacy'), array('class' => 'modal blue'))));
					        echo $form->end(__('I agree, continue', true));
					    ?>

					</fieldset>
				</div>
			</div>
		</div>
		<div class="bottomleft">
			<div class="bottomright"> </div>
		</div>
	</div>
</div>
<div id="right-col">
	<div id="signup_steps">
		<div class="step selected">
			<h2><?php echo __('Join', true); ?></h2>
		</div>
		<div class="step">
			<h2><?php echo __('Verify your account ', true); ?></h2>      
		</div>
		<div class="step">
			<h2><?php echo __('Connect with friends', true); ?></h2>
		</div>
	</div>
</div>




