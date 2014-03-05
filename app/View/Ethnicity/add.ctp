<div class="row content">
	<div style='margin-left:15px;'>
		<h1>Módulo de Etnias Indigenas</h1>
		<hr>
		<div class="col-md-12">
			<div class="panel panel-success">
	  		<div class="panel-heading">
	  			<?if(!$synonym):?>
		  			<h3>Registrar Etnia</h3>
		  			<p>En esta sección podra agregar una Etnia Indigena al portal AbyaYala y poder administrar su contenido.
							</p>
					<?else:?>
						<h3>Registrar Sinónimo(<?= $ethnicityName?>)</h3>
		  			<p>En esta sección podra agregar un Sinónimo a la Etnia Indigena <?=$ethnicityName?>.
							</p>
					<?endif;?>
	  		</div>
	  		<div class="panel-body">
				  <?php
					echo $this->Form->create('Ethnicity', array('role'=>'form'));
					?>

					<div class="form-group">
						<label for="data[Ethnicity][name]">		Nombre:
						</label>
						<?php 
						$place=$synonym?'Nombre del Sinónimo':'Nombre de la Etnia';
						echo $this->Form->input('name',array('label'=>false, 'class'=>'form-control', 'placeholder'=>$place));
						?>
					</div>

					<?if(!$synonym):?>
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
						<?else:?>
							<?php echo $this->Form->hidden('ethnicity_father_id ',array('value'=>$ethnicityId));?>
						<?endif;?>

					<div class="form-group">
						<?if(!$synonym):?>
							<?php
							echo $this->Form->submit('Crear Etnia', array('class'=>'btn btn-success'));
							?>
						<?else:?>
							<?php
							echo $this->Form->submit('Crear Sinónimo', array('class'=>'btn btn-success'));
							?>
						<?endif;?>
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
		$('#EthnicityAddForm').validate({
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