<?php
	$javascript->link('http://platform.twitter.com/anywhere.js?id=rEEmmgMVnfiU2gBUdFWN9Q&amp;v=1', false);
?>

<div class="clearfix"></div>
<div id="left-col">
	<div class="box" style="width:100%">
		<div class="topleft">
			<div class="topright">
				<h2 class="login"><?php echo __('Login to Gridglo', true); ?></h2>
				<div style="margin:25px;float:left;">
					<fieldset>    
					    <?php echo $html->image('login-fb-connect.png', array('alt' => __('Sign in with Facebook', true), 'url' => array('controller' => 'oauth', 'action' => 'authorize', 'facebook'))); ?><br />
					    <?php echo __('or', true); ?><br /> 
						<span id="twitter-login"></span> 
					</fieldset>
					<fieldset>
					    <legend><?php echo sprintf(__('Login to %s', true), $appConfigurations['name']); ?></legend>
					    <?php 
					        echo $form->create('User', array('action' => 'login'));
					        echo $form->input('username', array('label' => __('Username', true)));
					        echo $form->input('password', array('label' => __('Password', true)));
					        echo $form->input('remember_me', array('type' => 'checkbox', 'label' => __('Keep me logged in on this computer', true)));
					        echo $form->end(__('Login', true));
					    ?> 
					</fieldset>
				</div>
				<div style="margin:25px;float:right">
					<h2><?php echo __('Don\'t have an account?', true); ?></h2>
					<p><?php echo sprintf(__('It\'s easy! Just %s now!', true), $html->link(__('Sign up', true), array('action' => 'register'))); ?> </p>     
				</div>
				<span class="clearFix"></span>
								
					<script type="text/javascript">
						twttr.anywhere(function(T) {
							T('#twitter-login').connectButton();
						});
					</script>

			</div>
		</div>
		<div class="bottomleft">
			<div class="bottomright"> </div>
		</div>
	</div>
</div>
<div id="right-col">


</div>















