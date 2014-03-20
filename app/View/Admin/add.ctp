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
						?>
					</div>

					<div class="form-group">
						<label for="data[Admin][last_name]">	Apellido:
						</label>
						<?php 
							echo $this->Form->input('last_name',array('label'=>false, 'class'=>'form-control', 'placeholder'=>' Apellido'));
						?>
					</div>

					<div class="form-group">
						<label for="data[Admin][email]">	Email:
						</label>
						<?php 
							echo $this->Form->input('email',array('label'=>false, 'class'=>'form-control', 'placeholder'=>'Email'));
						?>
					</div>
					
					<div class="form-group">
						<label for="data[Admin][password]">	Contraseña:
						</label>
						<?php 
							echo $this->Form->input('password',array('label'=>false, 'class'=>'form-control', 'placeholder'=>'Contraseña', 'type' => 'password'));
						?>
					</div>

					<div class="form-group">
						<label for="data[Admin][passwd_confirm]">	Confirmación de Contraseña:
						</label>
						<?php 
							echo $this->Form->input('passwd_confirm',array('label'=>false, 'class'=>'form-control', 'placeholder'=>'Confirmación de Contraseña', 'type' => 'password'));
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