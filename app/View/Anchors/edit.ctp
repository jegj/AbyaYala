<div class="anchors form">
<?php echo $this->Form->create('Anchor'); ?>
	<fieldset>
		<legend><?php echo __('Edit Anchor'); ?></legend>
	<?php
		echo $this->Form->input('anchor_id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Anchor.anchor_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Anchor.anchor_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Anchors'), array('action' => 'index')); ?></li>
	</ul>
</div>
