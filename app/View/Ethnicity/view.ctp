<div class="row content">
	<div style='margin-left:15px;'>
		<h1>Módulo de Etnias Indigenas</h1>
		<hr>
		<h3>Etnia 
		<?php echo $ethnicity['Ethnicity']['name']; ?>
		</h3>
		<p>
		<b>Clasificación:</b>
		<?php echo h($ethnicity['Ethnicity']['type']);?>
		</p>

		<h3>Anclas(<?php echo $ethnicity['Ethnicity']['name']; ?>)</h3>
		
		<div class="table-responsive">
		<table id="anchors" class="table table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($ethnicity['Anchors'] as $anchors):?>
					<tr>
						<td>
							<?php 
								echo $this->Html->link($anchors['name'],
								array('controller'=>'anchors', 'action'=>'view', $anchors['anchor_id'],$ethnicity['Ethnicity']['ethnicity_id'])
								);
							?>
						</td>
						<td>
							<?php 
								echo $this->Html->link('Modificar',
								array('controller'=>'anchors', 'action'=>'edit', $anchors['anchor_id'],$ethnicity['Ethnicity']['ethnicity_id']));
							?>
						</td>
						<td>
							<?php 
								echo $this->Form->postLink(
									__('Eliminar'), 
									array('controller'=>'anchors','action' => 'delete', $anchors['anchor_id'],$ethnicity['Ethnicity']['ethnicity_id']),
									array('confirm' => '¿Esta usted seguro que desea eliminar la ancla '.$anchors['name'].'?')
								);
							?>
						</td>
					</tr>
				<?endforeach;?>
			</tbody>
		</table>
		</div>

		<h3>Notas(<?php echo $ethnicity['Ethnicity']['name']; ?>)</h3>
		<div class="table-responsive">
			<table id="notes" class="table table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Modificar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($ethnicity['Notes'] as $notes):?>
					<tr>
						<td>
							<?= 
							$this->Html->link(
								$notes['name'],
								array(
									'controller'=>'notes',
									'action' => 'view',
									$notes['note_id'],
								)
							);
							?>
						</td>

						<td>
							<?= 
							$this->Html->link(
								'Modificar',
								array(
									'controller'=>'notes',
									'action' => 'edit',
									$notes['note_id']
								)
							);
							?>
						</td>

						<td>
							  <?= 
							  $this->Form->postLink(
	                  'Eliminar',
	                  array(
	                  	'controller'=>'notes',
	                  	'action' => 'delete',
	                  	$notes['note_id'],
	                  	$ethnicity['Ethnicity']['ethnicity_id']
	                  ),
	                  array('confirm' => '¿Esta usted seguro que desea eliminar la Nota '.$notes['name'].'?'));
	              ?>
						</td>

					</tr>
				<?php endforeach;?>
				</tbody>
			</table>
		</div>

	</div>
</div>


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
							$ethnicity['Ethnicity']['ethnicity_id'],
							$ethnicity['Ethnicity']['name']));
					?>
				</li>
				<li>
					<?php	 
						echo $this->Html->link(
							'Agregar Nota',
							array(
							'controller'=>'notes',
							'action' => 'add',
							$ethnicity['Ethnicity']['ethnicity_id'],
							$ethnicity['Ethnicity']['name']));
					?>
				</li>
				<li>
					<?php	 
						echo $this->Html->link(
							'Ir a Etnias Registradas',
							array(
							'action' => 'index',
						));
					?>
				</li>
			</ul>
		</div>
	</div>
</div>