<div class="row content">	
	<div class="col-md-12">
		<h1>Módulo de Carga de Contenido</h1>
		<h3>Subir Contenido</h3>
		<p>
			Atraves de este módulo podra subir contenido al servidor. Solo se permiten las siguiente extensiones: <b>png, jpg, gif, ogg, pdf</b> y los archivo deben ser a lo maximo de <b>10MB</b>.
		</p>
		<hr>
		<div class="row content">
			<div class="col-md-6">
				<form id="upload" method="post" action="/AbyaYala/contents/upload" enctype="multipart/form-data">
					<div id="drop">
						¡Arrastra el contenido hasta aquí!
						<a>Buscar</a>
						<input type="file" name="upl" multiple />
					</div>
				</form>
			</div>
			<div id="files" class="col-md-6">
				Contenido Subido:
				<ul id="upload_files">
				</ul>
				<button type="button" id="limpiarLista" class="btn btn-success">Limpiar	</button>
				<p></p>
				<div>
					<b>Leyenda:</b>
					<p></p>
					<p>
					<img  width=22 height=22 src="../app/webroot/assets/imagenes/test-pass-icon.png" alt="Exito"> Contenido Cargado con exito
					</p>
					<p>
					<img width=22 height=22 src="../app/webroot/assets/imagenes/test-warning-icon.png" alt="Exito"> Contenido Repetido
					</p>
					<p>
					<p>
					<img width=22 height=22 src="../app/webroot/assets/imagenes/test-fail-icon.png" alt="Exito"> Error al subir el Contenido		
					</p>
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
												    'Ir a Contenido Registrado',
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
	$(function(){
		$('#limpiarLista').click(function(){
			$('#upload_files').empty();
		});
	});
</script>