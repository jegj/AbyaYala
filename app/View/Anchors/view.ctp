<div class="anchors view">
	<h3>
		<?php echo h($anchor['Anchor']['name']); ?>
	</h3>
	<dl>
		<dt><?php echo __('Id Ancla'); ?></dt>
		<dd>
			<?php echo h($anchor['Anchor']['anchor_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripción'); ?></dt>
		<div style="width:550px margin-left:auto; margin-right:auto;">
			<dd>
				<?php echo html_entity_decode(h($anchor['Anchor']['description'])); ?>
				&nbsp;
			</dd>
		</div>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li>
			<?php echo $this->Html->link('Regresar', array('controller'=>'ethnicities','action' => 'view', $ethnicityId)); ?>
		</li>
	</ul>
</div>
