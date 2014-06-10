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
  
  'convertKeys'=>array('name')
));
?>
<div class="row">
	<div class="container">
	  <hgroup class="mb20">
			<h1 class="titulo">Resultados de la busqueda</h1>
			<h2 class="lead">
				<strong class="text-danger">
					<?php echo $this->Paginator->counter(
				    '{:count}'
					);?>
				</strong> resultados encontrados para <strong class="text-danger"><?php echo $term?></strong>
				<strong style="float:right">Busqueda Avanzada</strong>
			</h2>		
		</hgroup>

	  <section class="col-xs-12 col-sm-6 col-md-12">
			<?php foreach ($results as $result):?>
				<article class="search-result row">
					<div class="col-md-12 excerpet">
						<h3>
							<?php
                echo $this->Html->link(
   								$result['Search']['name'],
   								MiscLib::generateUrl($result['Search']['model'], $result['Search']['model_pk'])
                );
              ?>
						</h3>

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
  <div class="col-md-1">
    <?php
			echo $this->Paginator->numbers();
    ?>
  </div>
</div>
<? echo $this->Js->writeBuffer();?>