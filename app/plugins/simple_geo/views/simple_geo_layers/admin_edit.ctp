<div class="simpleGeoLayers form">
<?php echo $this->Form->create('SimpleGeoLayer');?>
	<fieldset>
 		<legend><?php __('Admin Edit Simple Geo Layer'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('SimpleGeoLayer.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('SimpleGeoLayer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Simple Geo Layers', true), array('action' => 'index'));?></li>
	</ul>
</div>