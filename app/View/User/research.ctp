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
	<h1 class="titulo">Investigación</h1>
	<hr>
	<div class="row">
		<?php foreach ($content as $pdf):?>
		<div class="col-sm-12"> 
			<div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
				<div class="media">
					<p class="imgHolder">
	        	<img alt="Icono PDF" src="/AbyaYala/img/icon_pdf.png" width="30" height="30">
					</p>
					<p>
		        <h3 class="media-heading">
			        <a target='_blank' href= '<?echo $pdf['Content']['access_path'].'?'.rand()?>'>
			        	<?php echo $pdf['Content']['name']?>
			        </a>
		        </h3>
					</p>
	        <div class="clearfix visible-sm"></div>
	        <div class="media-body fnt-smaller">
	        		<p class="hidden-xs">
								<?php echo $pdf['Content']['description'];?>
              </p>
	            <span class="fnt-smaller fnt-lighter fnt-arial">
	                <b>Fecha Publicación:</b> <?php echo $pdf['Content']['create_date'];?>
	            </span>
	            <p></p>
              <span class="fnt-smaller fnt-lighter fnt-arial">
                  <b> Autor:</b> <?php echo $pdf['Content']['author'];?>
              </span>
	        </div>
	      </div>
	  	</div>
		</div>
	<?php endforeach;?>
	</div>

  <div class='row' style="margin-top:20px;">
      <div class="col-md-11">
          <?php

              echo $this->Paginator->counter(array(
              'format' => __('Página {:page} de {:pages}, mostrando {:current} documentos.')
              ));
          ?>
          <?php
              echo $this->Paginator->prev("<span class='glyphicon glyphicon-chevron-left'></span>", array('escape'=>false, 'tag'=>false), "<span class='glyphicon glyphicon-chevron-left'></span>", array('escape'=>false, 'tag'=>false));

              echo('|');
              echo $this->Paginator->next("<span class='glyphicon glyphicon-chevron-right'></span>", array('escape'=>false, 'tag'=>false), "<span class='glyphicon glyphicon-chevron-right'></span>", array('escape'=>false, 'tag'=>false));
          ?>
      </div>  
      <div class="col-md-1">
        <?php
					echo $this->Paginator->numbers();
        ?>
      </div>
  </div>

</div>

<? echo $this->Js->writeBuffer();?>

