<div id="footer">
	<?php echo $this->element('footer_menu'); ?>
	<?php echo $html->tag('span', sprintf(__('Copyright (C) %d %s. All rights reserved', true), date('Y'), $appConfigurations['name']), array('class' => 'copyright'))?>
</div>
