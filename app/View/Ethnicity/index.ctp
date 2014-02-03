<div class="row content">	
	<div class="col-md-12">
		<h1>Etnias Indigenas</h1>
		<h3>Etnias Registradas en AbyaYala:</h3>
		<div style="width:830px;">
			<table id="ethnicity" style="width:830px;">
				<thead>
		      <tr>
		          <th>Nombre</th>
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
		<p></p>
		<p><b>Notas:</b></p> 
		<ul>
			<li>
				<p>
				Para cambiar la información de una etnia entre en <i>Modificar</i>.</p>
			</li>
			<li>
				<p>
					Puede ver la etnia haciendo click en <i>Nombre.</i>
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