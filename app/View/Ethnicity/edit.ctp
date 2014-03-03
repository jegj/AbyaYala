<div class="row content">
	<div style='margin-left:15px;'>
		<h1>Módulo de Etnias Indigenas</h1>
		<hr>
		<div class="col-md-12">
			<div class="panel panel-success">
	  		<div class="panel-heading">
	  			<h3>Modifcar Etnia</h3>
	  			<p>En esta sección podra modificar una Etnia Indigena del portal AbyaYala.
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
						<?php 
							$type = array(
								'Independiente' => 'Independiente', 
								'Guajibo' => 'Guajibo', 
								'Tupi-Guarani' => 'Tupi-Guarani',
								'Chibcha' => 'Chibcha',
								'Karibe' => 'Karibe',
								'Arawak' => 'Arawak'
							);
							echo $this->Form->input('type', array('label'=>false, 'options'=>$type, 'default'=>'Independiente', 'class'=>'form-control'));
						?>
					</div>

					<div class="form-group">
						<?php
						echo $this->Form->submit('Modificar Etnia', array('class'=>'btn btn-success'));
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
						    'Ir a Etnias Registradas',
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
		$('#EthnicityEditForm').validate({
			rules: {
				"data[Ethnicity][name]":{
					required:true,
					rangelength: [3, 45]
				},
			},
			messages: {
				"data[Ethnicity][name]":{
					required: 'Campo Obligatorio',
					rangelength: 'El campo debe tener entre 3 y 45 caracteres'
				},
			},
			
		 	highlight: function(element) {
		 			$(element).closest('.form-group').removeClass('has-success');
          $(element).closest('.form-group').addClass('has-error');

      },
      unhighlight: function(element) {
          $(element).closest('.form-group').removeClass('has-error');
          $(element).closest('.form-group').addClass('has-success');
      },

			errorElement: 'span',
      errorClass: 'help-block',
		});
	});
</script>