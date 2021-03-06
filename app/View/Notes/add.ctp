<div class="row content">
	<div style='margin-left:15px;'>
		<h1>Módulo de Etnias Indigenas</h1>
		<hr>
		<div class="col-md-12">
			<div class="panel panel-success">
	  		<div class="panel-heading">
	  			<h3>Registrar Nota(<?php echo $ethName?>)</h3>
	  			<p>En esta sección podra agregar una Nota para ser referenciada en el cuerpo de las Anclas perteneciente a la Etnia 
	  			<?php echo  $ethName?>
					</p>
	  		</div>

	  		<div class="panel-body">
	  			<?php echo $this->Form->create('Note', array('role'=>'form'));?>

	  			<div class="form-group">
						<label for="data[Note][name]">		Nombre:
						</label>
						<?php echo $this->Form->input('name',array('label'=>false, 'class'=>'form-control', 'placeholder'=>'Nombre de la Nota'));?>
					</div>

						<?php echo
							$this->Form->input('Ethnicity.ethnicity_id',array('value'=>$ethId));
						?>

					<div class="form-group">
						<label for="data[Note][description]">		Descripción:
						</label>
						<?php echo
							$this->Form->input('description',array('label'=>false, 'class'=>'form-control'));
						?>
					</div>

		  		<div class="form-group">
						<?php echo
						$this->Form->submit('Crear Nota', array('class'=>'btn btn-success'));
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
					    'Ir a Etnia '.$ethName,
					    array(
				    		'controller' => 'ethnicities',
					      'action' => 'view',
					      $ethId
					    ));
					?>
				</li>
			</ul>
		
		</div>
	</div>	
</div>

<script>
	$(document).ready(function(){
		
		$.validator.addMethod("nameRegex", function(value, element) {
    	    return this.optional(element) || /^[a-z0-9]+$/i.test(value);
    	}, "El campo debe tener solo letras y números.");
    
		$('#NoteAddForm').validate({
			ignore: [],
			rules: {
				"data[Note][name]":{
					required:true,
					rangelength: [3, 45],
					nameRegex: true
				},
				"data[Note][description]":{
					required:true,
				},
			},

			messages: {
				"data[Note][name]":{
					required: 'Campo Obligatorio',
					rangelength: 'El campo debe tener entre 3 y 45 caracteres',
					nameRegex: "El campo debe tener solo letras y números"
				},
				"data[Note][description]":{
					required: 'Campo Obligatorio',
				},
			},

			highlight: function(element) {
		 		$(element).closest('.form-group').removeClass('has-success');
				$(element).closest('.form-group').addClass('has-error');					
      },

      unhighlight: function(element)  {
				$(element).closest('.form-group').removeClass('has-error');
				$(element).closest('.form-group').addClass('has-success');
      },

      errorElement: 'span',
      errorClass: 'help-block',

		});

	});

</script>
