<div class="container" id ="adminContent">
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
				<?php if(($key+1) %4 == 0 || count($videos['videos'])-1 == $key):?>
					</div>
					<p></p>
				<?php endif;?>
	  <?php endforeach;?>
	  	<div class="row galeria">
		  	<div class="col-md-12">
				Se encontraron en total <?php echo $videos['total'] ?> videos.
				
				<?php if($videos['prevToken']):?>
					<a href="#" onclick ="return getVideos('<?php echo $videos['prevToken'];?>')"> <span class="glyphicon glyphicon-chevron-left"></span></a>
				<?php else:?>
					<span class="glyphicon glyphicon-chevron-left"></span>
				<?php endif;?>
				|
				<?php if($videos['nextToken']):?>
					<a href="#" onclick ="return getVideos('<?php echo $videos['nextToken'];?>')"> <span class="glyphicon glyphicon-chevron-right"></span></a>
				<?php else:?>
					<span class="glyphicon glyphicon-chevron-right"></span>
				<?php endif;?>
				
				<div style="text-align:right;">
					<div id="spinner" style="display:none;">
						<?php
					        echo $this->Html->image(
				            	'spinner.gif',
				        	    array('id' => 'spinner:img')
			    		    );?>
					</div>
				</div>
				
				<p class="help-block">Para más información sobre los videos de AbyaYala visite nuestra cuenta en 
					<a href="https://www.youtube.com/channel/UCLH_bLD2ELRO_3EHph6_drQ">
						<?php echo $this->Html->image('YoutubeIcon.png', array('alt' => 'Canal de You tube de AbyaYala'));?>
					</a>.
				</p>
				<p></p>
			</div>

		</div>
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
	
	<script>
	$(document).ready(function(){
		$('#nav-usuario li').removeClass("activetae");
        $('#galeria').addClass('activetae');
	});
	function getVideos(token)
	{
		 $.ajax({
		    url: '/AbyaYala/users/videos',
		    type: 'GET',
		    data:'token='+token,
		    dataType: 'HTML',
		    success: function (data) {
		    	var content = $(data); 
		    	var test = content.contents();
		    	$('#adminContent').html(test);
		    },
		      beforeSend: function(){
     			$('#spinner').show();
   			},
   			complete: function(){
     			$('#spinner').hide();
   			}
	  	});
	  	
  		return false;
	}
	</script>
</div>




