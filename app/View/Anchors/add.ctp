<div class="anchors form">
<?php echo $this->Form->create('Anchor'); ?>
	<fieldset>
		<legend>
			<?php echo __('Agregar Ancla('.$ethnicityName.')'); ?>
		</legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->hidden('ethnicitiesId',array('value'=>$ethnicityId));
	?>
	</fieldset>
	<p></p>
<?php echo $this->Form->end(__('Agregar Ancla')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li>
			<?php
				echo $this->Html->link('Agregar Nota', 
					array('controller'=>'notes', 'action'=>'add',$ethnicityId)
				);
			?>
		</li>
		<li>
			<?php	 
			echo $this->Html->link(
		    'Regresar',
		    array(
		    		'controller' => 'ethnicities',
		        'action' => 'view',
		        $ethnicityId
		    ));
			?>
		</li>
	</ul>
</div>
<script>
	$(document).ready(function(){
		CKEDITOR.replace( 'AnchorDescription', {
	    filebrowserBrowseUrl: '/AbyaYala/contents/browse',
	    filebrowserUploadUrl: '/AbyaYala/contents/upload',
	    width: "100%",
	    height: "300px"
		});
	});
</script>