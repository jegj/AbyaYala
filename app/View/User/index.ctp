<div class="row">
	<div class="container">
		<h1>Temas del Día</h1>
		<hr>

		<div class="col-md-6">
			<div id="Carousel" class="carousel slide">
				<div class="carousel-inner">
					<div class="item active peopleCarouselImg">
							<img src='<?php echo $news[0]['Content']['access_path']?>' alt="<?php echo $news[0]['Content']['name']?>"  class='img-responsive'>

							<div class="carousel-caption">
								<h3><?php echo $news[0]['Content']['name']?></h3>
		            <p><?php echo $news[0]['Content']['description']?></p>
							</div>
					</div>
				</div>
			</div>
		</div>	

		<div class="col-md-6">
			<?for ($i=1; $i < count($news); $i++):?>				
			<div class="row">
				<div class="col-md-12">
					<img class="img-thumbnail" src='<?php echo $news[$i]['Content']['access_path']?>' alt="<?php echo $news[$i]['Content']['name']?>"  height='140', width='140'>
				</div>
			</div>
			<?endfor;?>
		</div>

	</div>
</div>