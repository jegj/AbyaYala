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
		<h1>Etnias Indigenas</h1>
		<h3>Etnias Registradas en AbyaYala:</h3>
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
	              echo $this->Html->link('modificar', array('action' => 'edit', $data['Ethnicity']['ethnicity_id'])); 
	          		?>
		    			</td>
		    			<td>
		    				<?php
	              echo $this->Form->postLink(
	                  'Eliminar',
	                  array('action' => 'delete', $data['Ethnicity']['ethnicity_id']),
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

<div class="row content">
	<div class="col-md-12">
		<p></p>
		<p><b>Notas:</b></p> 
		<ul>
			<li>
				<p>
				Para cambiar la información de una etnia entre en <i>Modificar</i>.</p>
			</li>
			<li>
				<p>
					Puede administrar el contenido de la etnia haciendo click en el <i>Nombre</i> de la Etnia.
				</p>
			</li>
			<li>
				<p>
					Para visualizar la etnia con todo su contenido entre en <i>Vista Previa.</i>
				</p>
			</li>
		</ul>
		<div class="acciones">
			<h3>Acciones:</h3>
			<ul>
				<li>
					<?php 
						echo $this->Html->link(
							'Agregar Etnia',
							array(
							'action' => 'add',
						));	
					?>		
				</li>
			</ul>
		</div>
	</div>
</div>
<? echo $this->Js->writeBuffer();?>
