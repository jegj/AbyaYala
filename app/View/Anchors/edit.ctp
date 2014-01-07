<div class="anchors form">
<?php echo $this->Form->create('Anchor'); ?>
	<fieldset>
		<legend><?php echo __('Edit Anchor'); ?></legend>
	<?php
		echo $this->Form->input('anchor_id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->hidden('ethnicitiesId',array('value'=>$ethnicityId));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Modificar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Anchor.anchor_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Anchor.anchor_id'))); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Todas las Anclas'), array('controller'=>'ethnicities','action' => 'view',$ethnicityId)); ?>
		</li>
	</ul>
</div>

<script>
	CKEDITOR.replace( 'AnchorDescription', {
    filebrowserBrowseUrl: '/ckeditor/posts/browse',
    filebrowserUploadUrl: '/ckeditor/posts/upload',
    width: "100%",
    height: "300px"
	});
</script>
