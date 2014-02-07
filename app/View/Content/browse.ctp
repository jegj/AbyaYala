<div class="row">
	<div class="col-md-12">
		<h3>Módulo de contenidos</h3>
		<div class="panel panel-default" style="margin-top:30px;">
		  <div class="panel-body">
		    <p>
		    	A través de este módulo podra acceder al contenido subido por la aplicación administrativa de AbyaYala, así tambien como subir el contenido de su preferencia.
		    	<div style="text-align:center">
			    	<?php	
			    	echo $this->Html->image('/img/carga_descarga.jpeg', array('width' => '300', 'height' => '200'));
			    	?>
		    	</div>
		    </p>
		  </div>
		</div>
	</div>
</div>

<script>
  $(document).ready(function(){
		$('#link_imagenes').find('span').removeClass().addClass("glyphicon glyphicon-folder-close")
	});
</script>