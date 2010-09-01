<div class="simpleGeoLayers form">
<?php echo $this->Form->create('SimpleGeoLayer');?>
	<fieldset>
 		<legend><?php __('Admin Add Simple Geo Layer'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Simple Geo Layers', true), array('action' => 'index'));?></li>
	</ul>
</div>