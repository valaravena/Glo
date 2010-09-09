
<?php echo $this->element('home_flash')?>
<div class="clearfix"></div>
<div id="left-col">
	<div class="box" style="width: 100%">
		<div class="topleft">
			<div class="topright">
				<div>
					<h2 class="login"><?php __('Contact us using the contact form below');?>:</h2>
                     <?php echo $form->create(null, array('url' => '/contact')); ?>
                     <fieldset>
                             <legend></legend>

                             <?php
                             echo $form->input('name', array('label' => __('Name', true)));
                             echo $form->input('email', array('label' => __('Email', true)));
                             echo $form->input('phone');
                             echo $form->input('message', array('label' => __('Enquiry', true), 'type' => 'textarea'));
                             ?>

                             <?php if(Configure::read('Recaptcha.enabled')):?>
                             	<?php echo $recaptcha->getHtml(!empty($recaptchaError) ? $recaptchaError : null);?>
                             <?php endif;?>

                             <?php echo $form->end(__('Contact Us', true));?>
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
	<?php echo $this->element('home_demo');?>
</div>




