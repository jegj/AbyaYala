<div class="row content">
	<div style='margin-left:15px;'>
	<h1>Etnias Indigenas</h1>
	<hr>
	<h3>Modificar Etnia: <?php echo $ethnicity['Ethnicity']['name'] ?></h3>
	<p>En esta sección modificar la informacion Básica de las etnias indigenas.
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
			<div class="col-sm-8">
				<?php echo $this->Form->input('type',array('label'=>false));?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-10">
				<?php
				echo $this->Form->submit('Modificar Etnia', array('class'=>'btn btn-success'));
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