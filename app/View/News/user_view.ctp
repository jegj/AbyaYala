<div class="row content">
	<div class="col-md-8">
		<div class="panel panel-default" id='panel_news'>		
			<div class="panel-body">
				<h1 class="titulo">
					<?php echo $news['News']['title']?>
				</h1>
				<div style="overflow:hidden height:400px; width:100%">
					<img class="img-responsive" src="<?php echo $news['Content']['access_path']?>" alt="<?php echo $news['Content']['name']?>">
				</div>
				<div class="picture-caption">
					<p align="justify"><?php echo $news['News']['previous_text']?></p>
				</div>
				<br>

				<div id="new_content">
					<?php echo $news['News']['description']?>
				</div>
				
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
					<span class="glyphicon glyphicon-print"></span>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4" style="margin-top:20px;">
		<div id="randomNews">
			<h3 class="titulo">Te podria Interesar...</h3>
			<hr>
			<?php foreach ($random['news'] as $new):?>
				<div class="row">
							<?php
	              echo $this->Html->link(
	                  "<img class='img-responsive' src='".$new['Content']['access_path']."' alt='".$new['Content']['name']."' height:130px;width:160px;'>",
	                  array('controller' => 'news', 
	                      'action' => 'user_view',
	                      $new['News']['new_id']
	                  ),array('escape' => false)   
	              );
	            ?>
	            <p class='title' align="justify">
								<?php echo $new['News']['title'];?>
	            </p>
				</div>
				<br>
			<?php endforeach;?>
		</div>

		<div id="randomImages" style="margin-top:20px;">
			<h3 class="titulo">Algunas Imagenes</h3>
			<div class="row">
				<ul class= "gallery clearfix" style="padding-left:20px;">
					<?php foreach ($random['images'] as $image):?>
						<li>
							<a href="<?php echo $image['Content']['access_path']?>" rel="prettyPhoto[gallery2]" title="<?php echo $image['Content']['description']?>">
								<img src="<?php echo $image['Content']['access_path']?>" alt="<?php echo $image['Content']['name']?>" width="60" height="60">
							</a>
						</li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>

		<div id="Trabajos" style="margin-top:20px;">
			<h3 class="titulo">Algunos Trabajos</h3>
		</div>

	</div>
</div>

<div>		
	<div style="margin-right: 10px; width:60px; float:left; ">
  	<a  href="https://twitter.com/share" class="twitter-share-button" data-lang="en" > </a>
  </div>
  <div style=" width:100px; float:left; margin-left:10px;">
  	<div id="fb-root"></div><div class="fb-share-button" data-href= "<?php echo $this->Html->url( null, true ); ?>" data-type="button_count" ></div>
	</div>
	<div style=" width:100px; float:left; margin-left:10px;">
  	<a><div class="g-plus" data-action="share"></div></a>
	</div>
</div>
<br>
<br>
<div style="float:left">
	<div class="fb-comments" data-href= "<?php echo $this->Html->url( null, true ); ?>" data-numposts="5" data-colorscheme="light"></div>
</div>


<style>
	#panel_news img{
		width: 100% !important;
	}
	.gallery li { 
		display: inline; 
	}
</style>


<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		
		$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});

	});
</script>
