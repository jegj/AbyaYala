<h1>Etnias Indigenas</h1>
<div class="row content">	
	<div class="col-md-12">
		<table id="ethnicity" style="width:500px;">
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
                  array('confirm' => '¿Esta usted seguro?')
              );
          		?>
	    			</td>
			 		</tr>
			 	<?endforeach;?>
			 </tbody>
		</table>
	</div>
</div>
<?php 
		echo $this->Html->link(
							    'Agregar Etnia',
							    array(
							        'action' => 'add',
							    ));
?>

<script>
	  $('#ethnicity').dataTable({
	 		"oLanguage": {
				"sLengthMenu": "Display _MENU_ records per page",
				"sZeroRecords": "No hay información",
				"sInfo": "Mostrando _START_ - _END_ de _TOTAL_ registros",
				"sInfoEmpty": "Showing 0 to 0 of 0 records",
				"sInfoFiltered": "(filtered from _MAX_ total records)"
			}
	 });
</script>