<div class="clearfix"></div>
<div id="left-col">
	<?php
		$html->addCrumb(__('Account Profile', true), '/accounts/profile');
	?>
	<div class="box" style="width:99%">
		<div class="topleft">
			<div class="topright">
				<div style="position:relative;">
					<h2 class="login"><?php echo __('Account Profile', true); ?></h2>
					<fieldset>
						<?php echo $form->create('Account');?>
						<?php echo $form->input('image', array('type' => 'file', 'label' => __('Profile Image', true)))?>
						<?php echo $form->input('full_name', array('label' => __('Full Name', true)))?> 
						<?php echo $form->input('location', array('label' => __('Current Location', true)))?> 
						<?php echo $form->input('bio', array('label' => __('About Yourself', true)));?>
						<?php echo $form->input('date_of_birth', array('label' => __('Date of Birth', true)))?>
						<?php echo $form->input('gender_id', array('label' => __('Gender', true)))?>
						<?php echo $form->end(__('Update Profile', true));?>
					</fieldset>
					<div class="profile_image" >
						<?php if (!empty($this->data['Account']['image'])): ?> 
							<?php echo $this->data['Account']['image']?>
						<?php else: ?>
							<?php echo $html->image('no_photo.png', array('alt' => __('No Profile Photo', true)))?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="bottomleft">
			<div class="bottomright"> </div>
		</div>
	</div>
</div>
<div id="right-col">
   <?php echo $this->element('account_menu'); ?>
</div>









