<div class="row content">
	<div class="col-md-12">
		<h1>Noticias</h1>
		<hr>

		<h3>Vista en Página Independiente</h3>
		<div class="panel panel-default">
		
			<div class="panel-body">
				<h2>
					<?php echo $news['News']['title']?>
				</h2>
				<img class="img-responsive" src="<?php echo $news['Content']['access_path']?>" alt="<?php echo $news['Content']['name']?>"width=800 height=400>
				<div class="picture-caption">
					<p align="justify"><?php echo $news['News']['previous_text']?></p>
				</div>
				<br>
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

		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<div class="holder col-sm-8">
						<img class="img-responsive" src="<?php echo $news['Content']['access_path']?>" alt="<?php echo $news['Content']['name']?>"width=800 height=400>
					<div class="carousel-caption">
						<h2>
							<?php
								echo $news['News']['title'];
	            ?>
            </h2>
            <p align="justify"><?php echo $news['News']['previous_text']?></p>
					</div>
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
					<?php echo $this->Html->link('Modificar Información de Imagen Principal', array('action' => 'edit', 'controller' =>'contents',$news['Content']['content_id']),array('target'=>'_blank')); ?>
				</li>

				<li>
					<?php echo $this->Html->link('Ir a Noticias Registradas', array('action' => 'index')); ?>
				</li>
			</ul>
		</div>
	</div>
</div>