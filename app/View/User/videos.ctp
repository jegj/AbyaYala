<div class="container">
	<h1 class="titulo">Galeria de Videos</h1>
	<hr>
	<?php
		error_reporting(E_ALL);
		$feedURL = 'http://gdata.youtube.com/feeds/api/users/farfanestella/uploads';
		$sxml = simplexml_load_file($feedURL);
	?>
	<div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
    <div class="carousel-inner">
    	<div class="item active">
    			<?php $index = 0;?>
			    <?php foreach ($sxml->entry as $key => $entry):?>
			        <?php  
			            $media = $entry->children('media',true);
			            $watch = (string)$media->group->player->attributes()->url;
			            $thumbnail = (string)$media->group->thumbnail[0]->attributes()->url;
			        ?>
			        <?php if($index%4 == 0):?>
								<div class="row">
							<?php endif;?>
				        <div class="col-sm-3">
			            <div >
	                	<a href="<?php echo $watch; ?>" class="watchvideo" target='_blank'>
	                    <img class="gallery" src="<?php echo $thumbnail;?>" alt="<?php echo $media->group->title; ?>" />
	                	</a>
                    <b>
                      <a href="<?php echo $watch; ?>" target='_blank'> <?php echo $media->group->title; ?></a>
                    </b>
                    <p></p>
				          </div>                        
				        </div>
				      <?php if(($index+1) %4 == 0):?>
								</div>
							<?php endif;?>
							<?php $index++;?>
			    <?php endforeach;?>
          </div>
      </div>
  </div>
</div>

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