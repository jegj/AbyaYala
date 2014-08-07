<?php
$this->Paginator->options(array(
  'update' => '#container-usuario',
  'evalScripts' => true,
  'before' => $this->Js->get('#spinner')->effect(
        'fadeIn',
        array('buffer' => false)
  ),
  'complete' => $this->Js->get('#spinner')->effect(
      'fadeOut',
      array('buffer' => false)
  ),
  
  'convertKeys'=>array('term')
));

?>

<div class="container">
	
	<h1 class="titulo">Galeria de Imagenes</h1>
	<hr>
	<!-- <div class="row galeria"> -->
		<?php if($content && count($content)):?>
			<?php foreach ($content as $key => $image):?>
					<?php if($key%4 == 0):?>
						<div class="row galeria">
					<?php endif;?>
						<div class="col-md-3 col-sm-3 col-xs-6 ">
							<a href= '<?echo utf8_decode($image['Content']['access_path']).'?'.rand()?>'
		                                            rel='prettyPhoto' title= '<?php echo $image['Content']['description']?>'
		                                            >
									<img class="img-responsive gallery" src='<?php echo utf8_decode($image['Content']['access_path']);?>'   alt ='<?php echo $image['Content']['name']?>'/>
							</a>
							<b><?php echo $image['Content']['name'];?></b>
							<p></p>
						</div>
					<?php if(($key+1) %4 == 0 ||$key == count($content)-1 ):?>
						</div>
					<?php endif;?>
			<?php endforeach;?>
		<?php else:?>
			<div class="row galeria">
				<div class="col-md-12">
          <div class="alert alert-warning" role="alert">
              <strong>Actualmente no existen imagenes en AbyaYala</strong>
          </div>
        </div>
			</div>
		<?php endif;?>
	<!-- </div> -->
	

	<div class='row' style="margin-top:20px;">
		<div class="col-md-12">
			<?php

				echo $this->Paginator->counter(array(
				'format' => __('Página {:page} de {:pages}, mostrando {:current} imagenes.')
				));
			?>
			<?php
				echo $this->Paginator->prev("<span class='glyphicon glyphicon-chevron-left'></span>", array('escape'=>false, 'tag'=>false), "<span class='glyphicon glyphicon-chevron-left'></span>", array('escape'=>false, 'tag'=>false));

				echo('|');
				echo $this->Paginator->next("<span class='glyphicon glyphicon-chevron-right'></span>", array('escape'=>false, 'tag'=>false), "<span class='glyphicon glyphicon-chevron-right'></span>", array('escape'=>false, 'tag'=>false));
			?>
			<div style="text-align:right;">
				<div id="spinner" style="display:none;">
						<?php
			        echo $this->Html->image(
			            'spinner.gif',
			            array('id' => 'spinner:img')
			        );
	  				?>
				</div>
			</div>
			
		</div>	
		
	</div>
	
</div>
</div>

<? echo $this->Js->writeBuffer();?>

<script>
    $(document).ready(function(){
        $("a[rel^='prettyPhoto']").prettyPhoto({
                animation_speed:'normal',
                theme:'light_square',
                social_tools: false,
        });
        	
		$('#nav-usuario li').removeClass("activetae");
        $('#galeria').addClass('activetae');

    });
</script>

<style>
.galeria img {

    -webkit-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
    box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
    margin-bottom:20px;
    width:300px;
    height:175px;
    overflow:hidden;

}

</style>