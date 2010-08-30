<ul class="menu">
	<li><?php echo $html->link(__('Home', true), array('/'))?></li>
	<li><?php echo $html->link(__('Site Map', true), array('/'));?></li>
	<li><?php echo $html->link(__('Privacy Policy', true), array('/'));?></li>
	<li class="last"><?php echo $html->link(__('Contact Us', true), array('/'));?></li>
</ul>
<div class="logo">
	<?php echo $html->link($html->image('logo-sm.gif', array('alt' => '')), array('/'), array('escape' => false))?>
</div>
<div style="clear:both"></div>