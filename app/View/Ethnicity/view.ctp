<h1>Etnia 
	<?php echo h($ethnicity['ethnicity']['Ethnicity']['name']); ?>
</h1>
<p>
	Clasificación:
	<?php echo h($ethnicity['ethnicity']['Ethnicity']['type']);?>
</p>
<h3>Anclas</h3>
<p><b>Nota</b>:Para poder visualizar la ancla haga click en su nombre.</p>
<div style="width:600px">
<table id="anchors" style="width:600px;">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Modificar</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($ethnicity['anchors'] as $anchors):?>
			<tr>
				<td>
					<?php 
						echo $this->Html->link($anchors['Anchor']['name'],
						array('controller'=>'anchors', 'action'=>'view', $anchors['Anchor']['anchor_id'],$ethnicity['ethnicity']['Ethnicity']['ethnicity_id'])
						);
					?>
				</td>
				<td>
					<?php 
						echo $this->Html->link('Modificar',
						array('controller'=>'anchors', 'action'=>'edit', $anchors['Anchor']['anchor_id'],$ethnicity['ethnicity']['Ethnicity']['ethnicity_id']));
					?>
				</td>
				<td>
					<?php 
						echo $this->Form->postLink(
							__('Eliminar'), 
							array('controller'=>'anchors','action' => 'delete', $anchors['Anchor']['anchor_id'],$ethnicity['ethnicity']['Ethnicity']['ethnicity_id']),
							array('confirm' => '¿Esta usted seguro que desea eliminar la ancla '.$anchors['Anchor']['name'].'?')
						);
					?>
				</td>
			</tr>
		<?endforeach;?>
	</tbody>
</table>
</div>

<div class="actions" style="margin-top:60px;">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li>
			<?php 
			  echo $this->Html->link(
					'Agregar Ancla',
					array(
					'controller'=>'anchors',
					'action' => 'add',
					$ethnicity['ethnicity']['Ethnicity']['ethnicity_id'],$ethnicity['ethnicity']['Ethnicity']['name']));
			?>
		</li>
		<li>
			<?php	 
					echo $this->Html->link(
						'Regresar',
						array(
						'action' => 'index',
					));
			?>
		</li>
	</ul>
</div>

<script>
	  $('#anchors').dataTable({
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