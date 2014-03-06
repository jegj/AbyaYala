<?php
$this->Paginator->options(array(
  'update' => '#container-administrador',
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

<div class="row content">	
	<div class="col-md-12">
		<h1>Módulo de Noticias</h1>

		<?php if(!$result):?>
			<h3>Noticias de AbyaYala:</h3>
			<form action="/AbyaYala/news/resultsIndex" role="search" class="navbar-form" method="get">
				<div class="input-group">
	        <input type="text" id="srch-term" name="term" placeholder="Buśqueda" class="form-control" required>
	        <div class="input-group-btn">
	          <button type="submit" class="btn btn-default">
	          	<span class="glyphicon glyphicon-search"></span>
	          </button>
	        </div>
				</div>
	    </form>
	  <?else:?>
	  	<h3>Resultados de la Búsqueda:</h3>
	  <?endif;?>

	  <div class="table-responsive">
			<table id="contenat" class="table table-hover">
				<thead>
					<tr>
						<th>
							Nombre
				      <?php echo $this->Paginator->sort('title',$this->Html->image('ordenar.png'), array('escape'=>false));?>
				     </th>

				     <th>
				     	Autor
				     	<?php echo $this->Paginator->sort('author',$this->Html->image('ordenar.png'), array('escape'=>false));?>
				     </th>


				     <th>
				     Fecha Registro
				     	<?php echo $this->Paginator->sort('current_date',$this->Html->image('ordenar.png'), array('escape'=>false));?>
				     </th>

				     <th>
				     Fecha Modificación
				     	<?php echo $this->Paginator->sort('modified_date',$this->Html->image('ordenar.png'), array('escape'=>false));?>
				     </th>


				     <th>
				     	Modificar
				     </th>

				     <th>
				     	Eliminar
				     </th>
					</tr>
				</thead>
				<tbody>
					<?foreach ($news as $myNew):?>
						<tr>
							<td>
								<?
				 					echo $this->Html->link($myNew['News']['title'], array('action' => 'view', $myNew['News']['new_id'])); 
				 				?>
							</td>

							<td>
								<?
									echo $myNew['News']['author'];
								?>
							</td>

							<td>
								<?
								echo MiscLib::dateFormat($myNew['News']['current_date']);
								?>
							</td>

							<td>
								<?
									if($myNew['News']['modified_date'])
										echo MiscLib::dateFormat($myNew['News']['modified_date']);
									else
										echo '---';
								?>
							</td>

						

							<td>
								<?
	              	echo $this->Html->link('Modificar', array('action' => 'edit', $myNew['News']['new_id'])); 
	          		?>
							</td>

							<td>
								<?php
	              echo $this->Form->postLink(
	                  'Eliminar',
	                  array('action' => 'delete', $myNew['News']['new_id']),
	                  array('confirm' => '¿Esta usted seguro que desea eliminar la Noticia '.$myNew['News']['title'].'?')
	              );
	          		?>
							</td>

						</tr>
					<?endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="row content">
	<div class="col-md-12">
			<?php
				echo $this->Paginator->counter(array(
				'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count}')
				));
			?>
			<?php
				echo $this->Paginator->prev("<span class='glyphicon glyphicon-chevron-left'></span>", array('escape'=>false, 'tag'=>false), "<span class='glyphicon glyphicon-chevron-left'></span>", array('escape'=>false, 'tag'=>false));

				echo $this->Paginator->next("<span class='glyphicon glyphicon-chevron-right'></span>", array('escape'=>false, 'tag'=>false), "<span class='glyphicon glyphicon-chevron-right'></span>", array('escape'=>false, 'tag'=>false));
			?>
			<div style="text-align:right;">
			<?php
				echo $this->Paginator->numbers();
			?>
			</div>
	</div>
</div>