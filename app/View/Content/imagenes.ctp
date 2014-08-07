<div class="row">
	<div class="col-md-12">
		<h2>Imagenes Cargadas</h2>
		<div class="alert alert-info" role="alert">
			<p><strong>Seleccione la imagen que desea cargar en contenido del editor de texto</strong></p>
		</div>
		<?php if($content && count($content)):?>
			<?php foreach ($content as $key => $image):?>
					<?php if($key%4 == 0):?>
						<div class="row galeria">
					<?php endif;?>
						<div class="col-md-3 col-sm-3 col-xs-6 ">
							<a href= '<?php echo utf8_decode($image['Content']['access_path']).'?'.rand()?>' onclick="return cargarImagenLocal('<?php echo utf8_decode($image['Content']['access_path'])?>')">
								<img class="img-responsive gallery" src='<?php echo utf8_decode($image['Content']['access_path']);?>'   alt ='<?php echo $image['Content']['name']?>' width:"250px"/>
							</a>
							<b><?php echo $image['Content']['name'];?></b>
							<p></p>
						</div>
					<?php if(($key+1) %4 == 0 || $key == count($content)-1):?>
						</div>
					<?php endif;?>
			<?php endforeach;?>
			<p></p>
			<div class='row galeria' style="margin-top:20px;">
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
		<?php else:?>
			<div class="row galeria">
				<div class="col-md-12">
	      			<div class="alert alert-warning" role="alert">
	          			<strong>Actualmente no existen imagenes cargadas en AbyaYala</strong>
	      			</div>
	    		</div>
			</div>
		<?php endif;?>
	</div>
</div>

<?php
    echo $this->Html->scriptBlock("
      function cargarImagenLocal(url){
      		window.opener.CKEDITOR.tools.callFunction($ckeditor, url, '');	
					cargaExitosa();
      		return false;
      }
    ");?>
    
<style>
.galeria img {
    -webkit-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
    box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
    margin-bottom:20px;
    width:300px;
    height:175px;
    overflow:hidden;
}

</style>