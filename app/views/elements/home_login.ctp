<?php echo $javascript->codeBlock(); ?>
	$(document).ready(function() {
		$("#loginSubmit").click(function() {
			$('#UserHomeLogin').submit();
			return false;
		})
	});
<?php echo $javascript->blockEnd(); ?>
<div class="box" style="width: 290px">
	<div class="topleft">
		<div class="topright">
			<div>
				<h2 class="login"><?php echo sprintf(__('Sign in to %s', true), $html->tag('span', $appConfigurations['name']))?></h2>
				<?php echo $form->create('User', array('url' => array('controller' => 'users', 'action' => 'login'), 'id' => 'UserHomeLogin', 'class' => 'middle-forms')); ?>
				<?php echo $form->input('User.username', array('label' => __('User ID', true)))?>
				<?php echo $form->input('User.password', array('label' => __('Password', true)))?>
				<?php echo $form->end(); ?>
				<?php echo $html->div('input', $html->link($html->tag('span',  __('Sign in', true)), array('/'), array('class'=>'button', 'escape' => false, 'id' =>'loginSubmit', 'style' => 'float:right;margin-right:10px;')))?>
				<span class="clearFix"></span>
				<ul class="login_sub">
					<li><?php echo $html->link(__('Forgot Password', true), '/recover', array('class' => 'blue'))?></li>
					<li class="last"><?php echo $html->link(__('New user register', true), '/register', array('class' => 'blue')); ?></li>
				</ul>
				<span class="clearFix"></span>
			</div>
		</div>
	</div>
	<div class="bottomleft">
		<div class="bottomright"> </div>
	</div>
</div>