<div class="row content">
	<div style='margin-left:15px;'>
		<h1>Etnias Indigenas</h1>
		<hr>
		<div class="col-md-12">
			<div class="panel panel-success">
	  		<div class="panel-heading">
	  			<h3>Registrar Etnia</h3>
	  			<p>En esta sección podra agregar una Etnia Indigena al portal AbyaYala y poder administrar su contenido.
						</p>
	  		</div>
	  		<div class="panel-body">
				  <?php
					echo $this->Form->create('Ethnicity', array('role'=>'form'));
					?>

					<div class="form-group">
						<label for="data[Ethnicity][name]">		Nombre:
						</label>
						<?php echo $this->Form->input('name',array('label'=>false, 'class'=>'form-control', 'placeholder'=>' Nombre de la Etnia'));?>
					</div>

					<div class="form-group">
						<label for="data[Ethnicity][type]">		Clasificación:
						</label>
						<?php echo $this->Form->input('type',array('label'=>false,'class'=>'form-control', 'placeholder'=>' Clasificación de la Etnia'));?>
					</div>

					<div class="form-group">
						<?php
						echo $this->Form->submit('Crear Etnia', array('class'=>'btn btn-success'));
						?>
					</div>
					
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