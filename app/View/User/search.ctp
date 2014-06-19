<?php

print FeedLib::prueba();



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
  
  'convertKeys'=>array('name')
));
?>

<div class="row">
	<div class="container">
	  <hgroup class="mb20">
			<h1 class="titulo">Resultados de la búsqueda</h1>
			<div class="row">
				<div class="col-md-6">
					<h2 class="lead">
					<strong class="text-danger">
						<?php echo $this->Paginator->counter(
					    '{:count}'
						);?>
					</strong> resultados encontrados para <strong class="text-danger"><?php echo $term?></strong>
					</h2>
				</div>
				<div class="col-md-6" style="text-align:right">
					<h2 class="lead">
						<strong>
							<?php
								echo $this->Html->link(
									'¿Búsqueda Avanzada?',
									array('action'=> 'advanced_search')
			          );
							?>
						</strong>
					</h2>		
				</div>
			</div>
		</hgroup>

	  <section class="col-md-12">
			<?php foreach ($results as $result):?>
				<article class="search-result row">
					<div class="col-md-12 excerpet">

						<?php if($result['Search']['model'] == 'Content' && ($result['Search']['type'] == 'imagen' || $result['Search']['type'] == 'audio')):?>
							<h3>
								<a href="#" onclick="return getContentSearch('<?php echo $result['Search']['type'] ?>', <?php echo $result['Search']['model_pk']?>);">
									<?php echo $result['Search']['name']?>
								</a>
							</h3>
						<?php else:?>
							<h3>
								<?php
	                echo $this->Html->link(
	   								$result['Search']['name'],
	   								MiscLib::generateUrl($result['Search']['model'], $result['Search']['model_pk'], $result['Search']['type'])
	                );
	              ?>
							</h3>
						<?php endif;?>

						<?php if($result['Search']['model'] == 'News'):?>
							<p><?php echo $result['Search']['previous_text'];?></p>
						<?php else:?>
							<p>
								<?php if($result['Search']['description']):?>
									<?php echo $result['Search']['description'];?>
								<?php else:?>
									<b>No hay descripción disponible</b>
								<?php endif;?>
							</p>
						<?php endif;?>


						<?php if($result['Search']['model'] == 'Content'):?>
							<p> Clasificación: <b><?php echo $result['Search']['type'];?></b></p>
						<?php endif;?>

						<ul id ="tags_resultado_busqueda" class="meta-search">

							<li>
								<i class="glyphicon glyphicon-time"></i> 
								<span>
									<?php if($result['Search']['date']):?>
										<?php echo MiscLib::dateFormat($result['Search']['date']);?>
									<?php else:?>
										<b>No Aplica</b>
									<?php endif;?>
								</span>
							</li>

							<li>
								<i class="glyphicon glyphicon-tags"></i> 
								<span>
									<?php if($result['Search']['model'] == 'News'):?>
										Noticias
									<?php elseif($result['Search']['model'] == 'Content'):?>
										Media
									<?php elseif($result['Search']['model'] == 'Ethnicity'):?>
										Etnia Indigena
									<?php else:?>
										No Aplica
									<?php endif;?>
								</span>
							</li>

						</ul>
					</div>
					<span class="clearfix borda"></span>
				</article>		
			<?php endforeach;?>
		</section>
	</div>
</div>

<div class="container">
	<div class='row' style="margin-top:20px;">
  	<div class="col-md-11">
      <?php
          echo $this->Paginator->counter(array(
          'format' => __('Página {:page} de {:pages}, mostrando {:current} resultados.')
          ));
      ?>
      <?php
          echo $this->Paginator->prev("<span class='glyphicon glyphicon-chevron-left'></span>", array('escape'=>false, 'tag'=>false), "<span class='glyphicon glyphicon-chevron-left'></span>", array('escape'=>false, 'tag'=>false));

          echo('|');
          echo $this->Paginator->next("<span class='glyphicon glyphicon-chevron-right'></span>", array('escape'=>false, 'tag'=>false), "<span class='glyphicon glyphicon-chevron-right'></span>", array('escape'=>false, 'tag'=>false));
      ?>
  	</div>  
	  <div class="col-md-1" style="text-align:right">
	    <?php
				echo $this->Paginator->numbers();
	    ?>
	  </div>
	</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Resultado Buscador</h4>
      </div>
      <div class="modal-body" id="modal-body">
      </div>
      <div class="modal-footer">
      	<div class="row">
      		<div class="col-md-8" style="text-align:left;">
      			<span class="help-block">
      				Para más informacion visite la Galeria de AbyaYala
      			</span>
      		</div>
      		<div class="col-md-4">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      		</div>
      	</div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<? echo $this->Js->writeBuffer();?>

<script>
$(document).ready(function(){
		$('#myModal').on('hidden.bs.modal', function (e) {
  			$("#jquery_jplayer_1").jPlayer("stop");
		})
});

function getContentSearch(type, id)
{
	if(type == 'audio')
		return getMusic(id);
	else
		return getImage(id);
}

</script>