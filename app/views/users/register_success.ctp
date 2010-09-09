

<div class="clearfix"></div>
<div id="left-col">
	<div class="box"  style="width:99%">
		<div class="topleft">
			<div class="topright">
				<div>
					<h2 class="login"><?php echo __('Now, please check your email', true); ?></h2>
					<ul>
					    <li><?php echo __('You must click on the link in the email we just sent you in order to complete your registration', true); ?></li>
					    <li><?php echo sprintf(__('The email was sent to %s', true), $html->tag('strong', $email)); ?></li>
					</ul>
					<hr />
					<h2 class="platform"><?php echo __('Never received the email?', true); ?></h2>
					<ul>
					    <li><?php echo __('Has it been less than 10 minutes? Please wait -- it sometimes just takes a bit', true); ?></li>
					    <li><?php echo __('Check your spam folder just in case', true); ?></li>
					    <li><?php echo sprintf(__('Try %s your email', true), $html->link(__('resending', true), array('action' => 'resend', $email))); ?></li>
					</ul>
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
		<div class="step">
			<h2><?php echo __('Join', true); ?></h2>
		</div>
		<div class="step selected">
			<h2><?php echo __('Verify your account ', true); ?></h2>
		</div>
		<div class="step">
			<h2><?php echo __('Connect with friends', true); ?></h2>
		</div>
	</div>
</div>




