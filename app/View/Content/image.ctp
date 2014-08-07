<?php if(isset($content)): ?>
	<div>
    <p><b>Nombre: </b><?php echo $content['Content']['name']?></p>
    <p><b>Descripción: </b><?php echo $content['Content']['description']?></p>
  </div>

  <div class="row">
  	<div class="center">
  		<center><img  id='spinner' src="/AbyaYala/assets/imagenes/ajax-loader-white.gif"></center>
    	<img id='img-modal' src="<?php echo utf8_decode($content['Content']['access_path']).'?'.rand()?>" alt="<?php echo $content['Content']['name']?>" class="img-responsive" width=250 height=250>
  	</div>
  </div>
<?php endif;?>

<?php if(isset($error)):?>
  <div class="alert alert-danger">
     <strong>Oops!</strong> No se pudo acceder al contenido. Aseguerese que se cargo correctamente o no fue eliminado.
  </div>
<?php endif;?>

<script>
	$(document).ready(function(){
		$('#img-modal').hide();
		$('#spinner').show();
		$('#img-modal').load(function(){
  			$('#spinner').hide();
  			$('#img-modal').show();
		});
	});
</script>