<?php if(isset($content)): ?>
	<div>
    <p><b>Nombre: </b><?php echo $content['Content']['name']?></p>
    <p><b>Descripción: </b><?php echo $content['Content']['description']?></p>
  </div>

  <div class="row">
  	<div class="center">
    	<img src="<?echo $content['Content']['access_path'].'?'.rand()?>" alt="<?php echo $content['Content']['name']?>" class="img-responsive" width=250 height=250>
  	</div>
  </div>
<?php endif;?>

<?php if(isset($error)):?>
  <div class="alert alert-danger">
    <strong>Oops!</strong> Hubo un error por favor intentalo mas tarde.
  </div>
<?php endif;?>