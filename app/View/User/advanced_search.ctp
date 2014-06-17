<div class="row">
	<div class="container">    

		<div class="panel panel-info">
 		 	<div class="panel-heading">
 		 		<h3 class="titulo">Búsqueda Avanzada</h3>
 		 	</div>
  		<div class="panel-body">
				<?php
					echo $this->Form->create('Buscador', array(
						'url' => array_merge(
								array(
									'controller' => 'users',
									'action' => 'search'
								),
								$this->params['pass']
							),
							'role' => 'search'
						)
					);
				?>
  			<div class="row">
  				<div class="col-md-6">
  					<label for="data[Search][name]">Nombre del Contenido</label>
  					<?php echo $this->Form->input('name', array(
								'div' => false,
								'label' => false,
								'class' => 'form-control',
								'type' => 'text',
								'placeholder' => 'Nombre',
								'name' => 'data[Search][name]'
							)
						);
						?>
  				</div>

  				<div class="col-md-6">
  					<label for="data[Search][description]">Parte de la  descripción del Contenido</label>
  					<?php echo $this->Form->input('name', array(
								'div' => false,
								'label' => false,
								'class' => 'form-control',
								'type' => 'text',
								'placeholder' => 'Descripción',
								'name' => 'data[Search][description]'
							)
						);
						?>
  				</div>
  			</div>

  			<div class="row" style="margin-top:20px;">
  				<div class="col-md-6">
  					<label for="data[Search][date]">Fecha de subida del Contenido</label>
  					<?php echo $this->Form->input('name', array(
								'div' => false,
								'label' => false,
								'class' => 'form-control',
								'type' => 'text',
								'placeholder' => 'Fecha',
								'name' => 'data[Search][date]',
								'id' => 'search_date'
							)
						);
						?>
  				</div>
  				<div class="col-md-6">
  					<label for="data[Search][author]">Autor del Contenido</label>
  					<?php echo $this->Form->input('name', array(
								'div' => false,
								'label' => false,
								'class' => 'form-control',
								'type' => 'text',
								'placeholder' => 'Autor del contenido',
								'name' => 'data[Search][author]'
							)
						);
						?>
  				</div>
  			</div>

  			<div class="row" style="margin-top:20px;">
  				<div class="col-md-12">
  					<label for="data[Search][type]">Tipo de Contenido</label>
  					<select class="form-control" name ="data[Search][type]" >
						  <option value='cualquiera'>Cualquiera</option>
						  <option value='noticia'>Noticias</option>
						  <option value="etnia">Etnias</option>
						  <option value="imagen">Imagenes</option>
						  <option value="audio">Audio</option>
						  <option value="documento">Documentos</option>
						</select>
  				</div>
  			</div>

  			<div class="row" style="margin-top:20px;">
  				<div class="col-md-12">
		  			<?php
							echo $this->Form->submit('Buscar', 
								array('class'=>'btn btn-success btn-lg'));
						?>
					</div>
				</div>
    				
  		</div>
  		<div class="panel-footer">
  			<p class="help-block">Indique los campos por lo cual desea realizar la búsqueda</p>
  		</div>
		</div>

	</div>
</div>

<script>
	$(document).ready(function() {
		$('#search_date').datepicker({
			language: "es",
			format: 'yyyy-mm-dd'
		})
	});
</script>