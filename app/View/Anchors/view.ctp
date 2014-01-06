<div class="anchors view">
<h2><?php echo __('Anchor'); ?></h2>
	<dl>
		<dt><?php echo __('Anchor Id'); ?></dt>
		<dd>
			<?php echo h($anchor['Anchor']['anchor_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($anchor['Anchor']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo html_entity_decode(h($anchor['Anchor']['description'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Anchor'), array('action' => 'edit', $anchor['Anchor']['anchor_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Anchor'), array('action' => 'delete', $anchor['Anchor']['anchor_id']), null, __('Are you sure you want to delete # %s?', $anchor['Anchor']['anchor_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Anchors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Anchor'), array('action' => 'add')); ?> </li>
		<li>
			<?php echo $this->Html->link('Regresar', array('controller'=>'ethnicities','action' => 'view', $ethnicityId)); ?>
		</li>
	</ul>
</div>
