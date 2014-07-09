<div class="container">
	<h1 class="titulo">Galeria de Videos</h1>
	<hr>

	<?php if($videos['videos'] && count($videos['videos']) && $videos['exito']):?>
	  <?php foreach ($videos['videos'] as $key => $video):?>
				<?php if($key%4 == 0):?>
					<div class="row galeria">
				<?php endif;?>
					<?php $url = "https://www.youtube.com/watch?v=".$video['id'];?>
					<div class="col-md-3 col-sm-3 col-xs-6 ">
						<a href= '<?php echo $url?>' rel='prettyPhoto' title= '<?php echo $video['title'];?>'>
							<img class="img-responsive gallery" src='<?php echo $video['thumbail'];?>'  alt ='<?php echo $video['title']?>'/>
						</a>
						<b><?php echo $video['title'] ?></b>
						<p></p>
					</div>
				<?php if(($key+1) %4 == 0):?>
					</div>
					<p></p>
				<?php endif;?>
	  <?php endforeach;?>
  <?php elseif(!$videos['exito']):?>
  	<div class="row galeria">
      <div class="col-md-12">
          <div class="alert alert-danger" role="alert">
              <strong>Ocurrió un error al obtener los videos de AbyaYala: </strong><?php echo $videos['msg'];?>
          </div>
      </div>
    </div>
  <?php else:?>
  	<div class="row galeria">
      <div class="col-md-12">
          <div class="alert alert-warning" role="alert">
              <strong>Actualmente no existen videos en AbyaYala</strong>
          </div>
      </div>
    </div>
  <?php endif;?>

<style>
.gallery {
  filter: gray; /* IE6-9 */
  -webkit-filter: grayscale(1); /* Google Chrome, Safari 6+ & Opera 15+ */
    -webkit-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
    box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
    margin-bottom:20px;
    width:250px;
    height:175px;
    overflow:hidden;
}
</style>