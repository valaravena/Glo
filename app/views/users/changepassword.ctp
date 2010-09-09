<div class="clearfix"></div>
<div id="left-col">
	<?php
		$html->addCrumb(__('Change Password', true), '/users/changepassword');
	?>
	<div class="box" style="width:99%">
		<div class="topleft">
			<div class="topright">
				<div>
					<h2 class="login"><?php echo __('Change Password', true); ?></h2>
					<fieldset>
						<?php echo $form->create('User', array('url' => '/users/changepassword'));?>
						<p><?php __('To change your password enter in your old password and your new password twice.');?></p>
						<?php
							echo $form->input('old_password', array('value' => '', 'type' => 'password', 'label' => __('Old Password', true)));
							echo $form->input('before_password', array('value' => '', 'type' => 'password', 'label' => __('New Password', true)));
							echo $form->input('password_confirmation', array('value' => '', 'type' => 'password', 'label' => __('Password Confirmation', true)));
						?>
						<?php echo $form->end(__('Change Password', true));?>
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
	<?php echo $this->element('account_menu')?>
</div>









