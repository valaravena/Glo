<?php $pages = $this->requestAction('/pages/getpages/bottom');?>
<ul class="menu">
	<li><?php echo $html->link(__('Home', true), '/');?></li>
	<?php if(!empty($pages)): ?>
		<?php foreach ($pages as $page): ?>
			<li><?php echo $html->link($page['Page']['name'], array('controller' => 'pages', 'action' => 'view', $page['Page']['slug'])); ?></li>
		<?php endforeach; ?>
		<li class="last"><?php echo $html->link(__('Contact Us', true), array('controller' => 'pages', 'action' => 'contact')); ?></li>
	<?php endif; ?>
</ul>
<div class="logo">
	<?php echo $html->link($html->image('logo-sm.gif', array('alt' => '')), array('/'), array('escape' => false))?>
</div>
<div style="clear:both"></div>