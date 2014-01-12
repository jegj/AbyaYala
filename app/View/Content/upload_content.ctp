<h1>Módulo de Carga de Imagenes y Audio</h1>
<div class="row content">	
	<div class="col-md-12">
		<p>
			Atraves de este módulo podra subir contenido al servidor. Solo se permiten las siguiente extensiones: <b>png,jpg,gif,ogg</b> y los archivo deben ser a los maximo de <b>10MB</b>.
		</p>
	</div>
</div>
<div class="row content">
	<div class="col-md-6">
		<form id="upload" method="post" action="/AbyaYala/contents/upload" enctype="multipart/form-data">
			<div id="drop">
				¡Arrastra el contenido hasta aqui!
				<a>Buscar</a>
				<input type="file" name="upl" multiple />
			</div>
		</form>
	</div>
	<div id="files" class="col-md-6">
		Contenido:
		<ul id="upload_files">

		</ul>
		<button type="button" id="limpiarLista" class="btn btn-success">Limpiar	</button>
	<?php 
		echo $this->Html->link(
							    'Ver Contenido',
							    array(
							        'action' => 'index',
							    ));
	?>
	</div>
</div>

<script>
	$(function(){
		$('#limpiarLista').click(function(){
			$('#upload_files').empty();
		});
	});
</script>