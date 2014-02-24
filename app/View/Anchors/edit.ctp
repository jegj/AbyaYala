<div class="row content">
	<div style='margin-left:15px;'>
		<h1>Etnias Indigenas</h1>
	</div>	
	<hr>
	<div class="col-md-12">
		<div class="panel panel-success">
	  	<div class="panel-heading">
	  		<h3>
	  			Modificar Ancla
	  		</h3>
	  		<p>
  				En esta sección podra modificar la ancla seleccionada.
				</p>
	  	</div>
	  	<div class="panel-body">
	  		<?php
					echo $this->Form->create('Anchor', array('role'=>'form'));
				?>
				<div class="form-group">
					<label for="data[Anchor][name]">		Nombre:
					</label>
					<?php echo $this->Form->input('name',array('label'=>false, 'class'=>'form-control', 'placeholder'=>' Nombre de la Ancla'));?>
				</div>

				<?php echo $this->Form->hidden('ethnicitiesId',array('value'=>$ethnicityId));?>

				<div class="form-group">
					<label for="data[Ethnicity][description]">		Descripción:
					</label>
					<?php echo $this->Form->input('description',array('label'=>false,));?>
				</div>


				<div class="form-group">
					<?php
					echo $this->Form->submit('Crear Ancla', array('class'=>'btn btn-success', ));
					?>
				</div>

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
	$(document).ready(function(){
		CKEDITOR.replace( 'AnchorDescription', {
	    filebrowserBrowseUrl: '/AbyaYala/contents/browse',
		  filebrowserUploadUrl: '/AbyaYala/contents/upload',
	    width: "100%",
	    height: "250px"
		});

	});
</script>
