<div class="row content">
	<div style='margin-left:15px;'>
		<h1>Etnias Indigenas</h1>
		<h3>
			Modificar Ancla(<?echo $name?>)
		</h3>
	</div>	
	<hr>
	<div class="col-md-12">
		<?php
		echo $this->Form->create('Anchor', array('class'=>'form-horizontal'));
		?>

		<div class="form-group">
			<label for="data[Anchor][name]" class="col-sm-1 control-label">Nombre:</label>
			<div class="col-sm-11">
					<?php echo $this->Form->input('name',array('label'=>false));?>
			</div>
		</div>

		<?php echo $this->Form->hidden('ethnicitiesId',array('value'=>$ethnicityId));?>

		<div class="form-group" style="margin-left:2px;">
			<?php
			echo $this->Form->input('description', array('label'=>'Descripción:'));
			?>
		</div>

		<div class="form-group">
			<div class="col-sm-10">
				<?php
				echo $this->Form->submit('Modificar Ancla', array('class'=>'btn btn-success'));
				?>
			</div>
		</div>
	</div>

</div>


<div class="row content">
	<div class="col-md-12">
		<div>
			<h3>Acciones:</h3>
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
	</div>
</div>

<script>
	CKEDITOR.replace( 'AnchorDescription', {
    filebrowserBrowseUrl: '/ckeditor/posts/browse',
    filebrowserUploadUrl: '/ckeditor/posts/upload',
    width: "100%",
    height: "250px"
	});
</script>
