<h1>Etnias Indigenas</h1>
<div class="row content">	
	<div class="col-md-12">
		<div style="width:550px;margin-left:auto;
margin-right:auto;">
			<table id="ethnicity" style="width:550px;">
				<thead>
		      <tr>
		          <th>Nombre</th>
		          <th>Tipo</th>
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

<p></p>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
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


<script>
	  $('#ethnicity').dataTable({
	 		'oLanguage': {
				'sLengthMenu': 'Mostrando _MENU_ registros por página',
				'sZeroRecords': 'No hay información',
				'sInfo': 'Mostrando _START_ - _END_ de _TOTAL_ registros',
				'sInfoEmpty': 'Mostrando 0 de 0 de 0 registros',
				'sInfoFiltered': '(filtrado de _MAX_ registros)',
				'sSearch': 'Búsqueda',
				'oPaginate': {
           'sNext': 'Siguiente',
           'sPrevious': 'Anterior'
         }
			}
	 });
</script>