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
));
?>

<div class="row content">	
	<div class="col-md-12">
		<h1>Módulo de Etnias Indigenas</h1>

		<?php if(!$result):?>
			<h3>Etnias Registradas en AbyaYala:</h3>
			<form action="/AbyaYala/ethnicities/resultsIndex" role="search" class="navbar-form" method="get">
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
			<table id="ethnicity" class="table table-hover">
				<thead>
		      <tr>
		          <th>
		          Nombre
		          <?php echo $this->Paginator->sort('name',$this->Html->image('ordenar.png'), array('escape'=>false));?>
		          </th>
		          <th>Tipo</th>
		          <th>Vista Previa</th>
		          <th>Sinónimos</th>
		          <th>Modificar</th>
		          <th>Eliminar</th>
		      </tr>
			   </thead>
				 <tbody>
				 	<?foreach ($ethnicity as $data):?>
				 		<tr>
				 			<td>
				 			<?
				 			echo $this->Html->link($data['Ethnicity']['name'], array('action' => 'view', $data['Ethnicity']['ethnicity_id'])); ?>
				 			</td>
				 			<td>
				 				<?echo $data['Ethnicity']['type']?>
				 			</td>

				 			<td>
				 				<?php
	              echo $this->Html->link('Vista Previa', array('action' => 'preview', $data['Ethnicity']['ethnicity_id'])); 
	          		?>
				 			</td>

							<td>
				 				<?php
	              echo $this->Html->link('Sinónimos', array('action' => 'synonyms', $data['Ethnicity']['ethnicity_id'],$data['Ethnicity']['name'])); 
	          		?>
				 			</td>				 			

			 				<td>
		    				<?php
	              echo $this->Html->link('Modificar', array('action' => 'edit', $data['Ethnicity']['ethnicity_id'], 0)); 
	          		?>
		    			</td>
		    			<td>
		    				<?php
	              echo $this->Form->postLink(
	                  'Eliminar',
	                  array('action' => 'delete', $data['Ethnicity']['ethnicity_id'], 0),
	                  array('confirm' => '¿Esta usted seguro que desea eliminar la etnia '.$data['Ethnicity']['name'].'?')
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