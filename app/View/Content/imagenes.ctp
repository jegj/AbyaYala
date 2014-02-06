<div class="row">
	<div style="margin-left:10px;">
		<h3>Imagenes</h3>
	</div>
	<hr>
	<div id="contenedor_imagenes">
		<?foreach ($content as $imagen):?>
			<div class="col-xs-6 col-md-3 back">
				<div class="img">
  				<a  href="#" onclick="return cargarImagen('<?php echo $imagen['Content']['access_path']?>')">
  					<img height="90" width="110" src="<?echo $imagen['Content']['access_path']?>" alt="Imagen">	
  				</a>
  				<div class="desc">
  					<h5><?php echo $imagen['Content']['name']?></h5>
  				</div>
				</div>
			</div>
		<?endforeach;?>
	</div>
</div>