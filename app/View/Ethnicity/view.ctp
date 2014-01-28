<div class="row content">
	<div style='margin-left:15px;'>
		<h1>Etnias Indigenas</h1>
		<hr>
		<h3>Etnia 
		<?php echo $ethnicity['ethnicity']['Ethnicity']['name']; ?>
		</h3>
		<p>
		<b>Clasificación:</b>
		<?php echo h($ethnicity['ethnicity']['Ethnicity']['type']);?>
		</p>

		<h3>Anclas</h3>
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
	</div>
</div>
<p></p>
<p><b>Notas:</b></p>
<div class="row content">
	<div class="col-md-12">
		<div class="actions">
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
	</div>
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