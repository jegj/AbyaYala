<div class="row content">
	<div class="col-md-12">
		<h1>Noticias</h1>
		<hr>

		<h3>Vista en Página Independiente</h3>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<?php echo $news['News']['title']?>
				</h3>
			</div>
			<div class="panel-body">
				<p>
				<?php echo $news['News']['description']?>
				</p>
				<hr>
				<div>
					<p>
						<b>Fecha de Registro: </b> <?php echo MiscLib::dateFormat($news['News']['current_date']);?>
					</p>

					<p>
						<b>Autor: </b><?php echo $news['News']['author']?>
					</p>
					<?php if($news['News']['link']):?>
						<p>
						<b>Fuente: </b>
						<a  target='_blank' href=' <?php echo $news['News']['link']?>'>
							<?php echo $news['News']['title']?>
						</a>
						
						</p>
					<?php endif;?>
				</div>
			</div>
		</div>
		<hr>
		<h3>Vista en Página Principal</h3>
		<div id="Carousel" class="carousel slide">
			<div class="carousel-inner">
				<div class="item active">
				
					<img src='<?php echo $news['Content']['access_path']?>' alt="<?php echo $news['Content']['name']?>"  height='600', width='570' class='img-responsive'>

					<div class="carousel-caption">
						<h3><?php echo $news['Content']['name']?></h3>
            <p><?php echo $news['Content']['description']?></p>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<h3>Vista en Miniatura</h3>
		<div class="text-center">
		  <img class="img-thumbnail" src='<?php echo $news['Content']['access_path']?>' alt="<?php echo $news['Content']['name']?>"  height='140', width='140'>
		  <h3><?php echo $news['Content']['name']?></h3>
      <p><?php echo $news['Content']['description']?></p>
		  <p><a class="btn btn-default" href="#">Ver mas...</a></p>
		</div>
	</div>
</div>

<div class="row content">
	<div class="col-md-12">
		<div>
			<h3>Acciones:</h3>
			<ul>
				<li>
					<?php echo $this->Html->link('Modificar Información de Imagen Principal', array('action' => 'edit', 'controller' =>'contents',$news['Content']['content_id']),array('target'=>'_blank')); ?>
				</li>

				<li>
					<?php echo $this->Html->link('Ir a Noticias Registradas', array('action' => 'index')); ?>
				</li>
			</ul>
		</div>
	</div>
</div>