<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?> ::
		<?php echo $appConfigurations['name']; ?>
	</title>
	<?php
		if(!empty($meta_description)) :
			echo $html->meta('description', $meta_description);
		endif;
		if(!empty($meta_keywords)) :
			echo $html->meta('keywords', $meta_keywords);
		endif;
		echo $html->css('reset');
		echo $html->css('style');
		echo $html->css('clear');
		echo $javascript->link('http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'); 
		echo $javascript->link('jquery/jquery.inlineedit'); 
		echo $javascript->link('common');
		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="message">
		<?php
			if($session->check('Message.flash')){
				echo $session->flash();
			}

			if($session->check('Message.auth')){
				echo $session->flash('auth');
			}
		?>
	</div>
	<div id="container">
		<?php $this->log('Test');?>
		<div id="header">
			<div id="logo">
				<?php echo $html->link($html->image('logo.gif', array('alt' => $appConfigurations['name'], 'title' => $appConfigurations['name'])), '/', array('escape' => false)); ?>
			</div>
			<div id="top-menu">
				<?php echo $this->element('menu_top');?>
			</div>
		</div>

		<div id="content" class="clearfix">
			<?php echo $content_for_layout; ?>
			<span class="clearFix"></span>
		</div>
		<?php echo $this->element('footer');?>
	</div>
	<div id="mask"><div id="modal" class="modal-container"><div id="modal-content"></div><div id="modal-close">&nbsp;</div></div></div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
