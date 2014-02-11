<div class="row">
	<div style="margin-left:10px;">
		<h3>Imagenes Cargadas</h3>
	</div>
	<hr>
	<div id="contenedor_imagenes" class='row'>
		<?foreach ($content as $imagen):?>
			<div class="col-xs-6 col-md-3 back">
				<div class="img">
  				<a  href="#" onclick="return cargarImagenLocal('<?php echo $imagen['Content']['access_path']?>')">
  					<img height="90" width="110" src="<?echo $imagen['Content']['access_path']?>" alt="Imagen">	
  				</a>
  				<div class="desc">
  					<h5><?php echo $imagen['Content']['name']?></h5>
  				</div>
				</div>
			</div>
		<?endforeach;?>
	</div>
	<div class='row' style="margin-top:20px;">
		<div class="col-md-12">
			<?php

				echo $this->Paginator->counter(array(
				'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count}')
				));
			?>
			<?php
				echo $this->Paginator->prev("<span class='glyphicon glyphicon-chevron-left'></span>", array('escape'=>false, 'tag'=>false), "<span class='glyphicon glyphicon-chevron-left'></span>", array('escape'=>false, 'tag'=>false));

				echo('|');
				echo $this->Paginator->next("<span class='glyphicon glyphicon-chevron-right'></span>", array('escape'=>false, 'tag'=>false), "<span class='glyphicon glyphicon-chevron-right'></span>", array('escape'=>false, 'tag'=>false));
			?>
		</div>	
	</div>
</div>

<?php
    echo $this->Html->scriptBlock("
      function cargarImagenLocal(url){
      		window.opener.CKEDITOR.tools.callFunction($ckeditor, url, '');	
					cargaExitosa();
      		return false;
      }
    ");
?>

