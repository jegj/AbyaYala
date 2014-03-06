<div class="row content">	
	<div class="col-md-12">
		<h1>Módulo de Noticias</h1>
		
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