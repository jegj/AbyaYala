<div class="row content">
	<div class="col-md-8">
		<div class="panel panel-default" id='panel_news'>		
			<div class="panel-body">
				<h2>
					<?php echo $news['News']['title']?>
				</h2>
				<div style="overflow:hidden height:400px; width:100%">
					<img class="img-responsive" src="<?php echo $news['Content']['access_path']?>" alt="<?php echo $news['Content']['name']?>">
				</div>
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
	</div>
	<div class="col-md-4">
		COntenido Aletorio
	</div>
</div>

<div>		
	<div style="margin-right: 10px; width:70px; float:left; ">
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
		width: 100%;
	}
</style>