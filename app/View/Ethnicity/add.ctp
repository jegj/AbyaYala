<div class="row content">
	<div style='margin-left:15px;'>
	<h1>Etnias Indigenas</h1>
	<hr>
	<h3>Registrar Etnia</h3>
	<p>En esta sección podra agregar una Etnia Indigena al portal AbyaYala y poder administrar su contenido.
	</p>

	<div class="col-md-12 center">
		<?php
		echo $this->Form->create('Ethnicity', array('class'=>'form-horizontal'));
		?>

		<div class="form-group">
			<label for="data[Ethnicity][name]" class="col-sm-4 control-label">Nombre:</label>
			<div class="col-sm-8">
					<?php echo $this->Form->input('name',array('label'=>false));?>
			</div>
		</div>

		<div class="form-group">
			<label for="data[Ethnicity][type]" class="col-sm-4 control-label">Clasificación:</label>
			<div class="col-sm-8" style="margin-left:0px;">
				<?php echo $this->Form->input('type',array('label'=>false));?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-10">
				<?php
				echo $this->Form->submit('Crear Etnia', array('class'=>'btn btn-success'));
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
						echo $this->Html->link(
						    'Regresar',
						    array(
						        'action' => 'index',
						    ));
					?>
				</li>
			</ul>
		
		</div>
	</div>	
</div>

<script>
	$(document).ready(function(){
		$('#EthnicityAddForm').validate({
			rules: {
				"data[Ethnicity][name]":{
					required:true,
					rangelength: [5, 45]
				},
				"data[Ethnicity][type]":{
					required:true,
					rangelength: [5, 45]
				},
			},
			messages: {
				"data[Ethnicity][name]":{
					required: 'Campo Obligatorio',
					rangelength: 'El campo debe tener entre 5 y 45 caracteres'
				},
				"data[Ethnicity][type]":{
					required: 'Campo Obligatorio',
					rangelength: 'El campo debe tener entre 5 y 45 caracteres'
				},

			},
			 highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
			errorElement: 'span',
      errorClass: 'help-block',
		});
	});
</script>