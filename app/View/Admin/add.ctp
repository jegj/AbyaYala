<div class="row content">
	<div style='margin-left:15px;'>
		<h1>Módulo de Gestión de Administradores</h1>
		<hr>
		<div class="col-md-12">
			<div class="panel panel-success">
	  		<div class="panel-heading">
	  			<h3>Registrar Administrador</h3>
	  			<p>En esta sección podra agregar un Administrador para que tenga control sobre el contenido publicado en AbyaYala.
					</p>
	  		</div>
	  		<div class="panel-body">
	  			<?php
						echo $this->Form->create('Admin', array('role'=>'form'));
					?>

					<div class="form-group">
						<label for="data[Admin][name]">			
							Nombre:
						</label>
						<?php 
							echo $this->Form->input('name',array('label'=>false, 'class'=>'form-control', 'placeholder'=>' Nombre'));
							echo ('Debe tener mínimo 3 caracteres, solo letras');
						?>
					</div>

					<div class="form-group">
						<label for="data[Admin][last_name]">	Apellido:
						</label>
						<?php 
							echo $this->Form->input('last_name',array('label'=>false, 'class'=>'form-control', 'placeholder'=>' Apellido'));
							echo ('Debe tener mínimo 3 caracteres, solo letras');
						?>
					</div>

					<div class="form-group">
						<label for="data[Admin][email]">	Email:
						</label>
						<?php 
							echo $this->Form->input('email',array('label'=>false, 'class'=>'form-control', 'placeholder'=>'Email'));
							echo ('Ej: perdro123@gmail.com');
						?>
					</div>
					
					<div class="form-group">
						<label for="data[Admin][password]">	Contraseña:
						</label>
						<?php 
							echo $this->Form->input('password',array('label'=>false, 'class'=>'form-control', 'placeholder'=>'Contraseña', 'type' => 'password'));
							echo ('Debe tener mínimo 8 caracteres entre números y letras');
						?>
					</div>

					<div class="form-group">
						<label for="data[Admin][passwd_confirm]">	Confirmación de Contraseña:
						</label>
						<?php 
							echo $this->Form->input('passwd_confirm',array('label'=>false, 'class'=>'form-control', 'placeholder'=>'Confirmación de Contraseña', 'type' => 'password'));
							echo ('Debe tener mínimo 8 caracteres entre números y letras, ademas de ser igual al campo anterior');
						?>
					</div>

					
					<label>
						<?php echo $this->Form->checkbox('type');?>
						Administrador Contenido
					</label>
					<span class="help-block">Si esta opcion  esta seleccionada, el administrador a crear sera de Contenido( Solo sube y modifica contenido).</span>
			  	
					<div class="form-group">
						<?php
						echo $this->Form->submit('Crear Administrador', array('class'=>'btn btn-success'));
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
						    'Ir a Administradores Registrados',
						    array(
						        'action' => 'allAdmins',
						    ));
					?>
				</li>
			</ul>
		
		</div>
	</div>	
</div>

<script>
	$(document).ready(function(){
		$('#AdminAddForm').validate({
	    rules: {
	        "data[Admin][name]": {
	            required:true,
	            rangelength: [3, 45]
	        },
	        "data[Admin][last_name]": {
	            required:true,
	            rangelength: [3, 45]
	        },
	        "data[Admin][email]": {
	            required:true,
	            rangelength: [3, 45],
	            email: true
	        },
	        "data[Admin][password]": {
	            required:true,
	            rangelength: [5, 45],
	        },
	        "data[Admin][passwd_confirm]": {
	            required:true,
	            rangelength: [5, 45],
	            equalTo: "#AdminPassword"
	        },
	    },
	    messages: {
	    	"data[Admin][name]": {
	    		required: 'Campo Obligatorio',
	    		rangelength: 'El campo debe tener entre 3 y 45 caracteres'
	    	},
	    	"data[Admin][last_name]": {
	    		required: 'Campo Obligatorio',
	    		rangelength: 'El campo debe tener entre 3 y 45 caracteres'
	    	},
	    	"data[Admin][email]": {
	        required: 'Campo Obligatorio',
	    		rangelength: 'El campo debe tener entre 3 y 45 caracteres',
	    		email: 'El campo debe ser un Correo valido'
	      },
	      "data[Admin][password]": {
	        required: 'Campo Obligatorio',
	    		rangelength: 'El campo debe tener entre 5 y 45 caracteres'
	      },
	       "data[Admin][passwd_confirm]": {
	        required: 'Campo Obligatorio',
	    		rangelength: 'El campo debe tener entre 5 y 45 caracteres',
	    		equalTo: 'Las contraseñas deben ser iguales.'
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