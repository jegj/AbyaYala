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
		<h1>Módulo de Gestión de Administradores</h1>

		<?php if(!$result):?>
			<h3>Administradores de AbyaYala:</h3>
			<form action="/AbyaYala/admins/resultsIndex" role="search" class="navbar-form" method="get">
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
				      <?php echo $this->Paginator->sort('name',$this->Html->image('ordenar.png'), array('escape'=>false));?>
				     </th>

				     <th>
				     	Apellido
				     	<?php echo $this->Paginator->sort('last_name',$this->Html->image('ordenar.png'), array('escape'=>false));?>
				     </th>


				     <th>
				     Email
				     	<?php echo $this->Paginator->sort('email',$this->Html->image('ordenar.png'), array('escape'=>false));?>
				     </th>

				     <th>
				     Tipo.Admin
				     	<?php echo $this->Paginator->sort('type',$this->Html->image('ordenar.png'), array('escape'=>false));?>
				     </th>

				     <th>
				     	Eliminar
				     </th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($admins as $admin):?>
						<tr>
							<td>
								<?php
				 					echo $admin['Admin']['name'];
				 				?>
							</td>

							<td>
								<?php
				 					echo $admin['Admin']['last_name'];
				 				?>
							</td>

							<td>
								<?php
				 					echo $admin['Admin']['email'];
				 				?>
							</td>

							<td>
								<?
				 					echo $admin['Admin']['type']==0?'Global':'Contenido';
								?>
							</td>

							<td>
								<?php if($admin['Admin']['type']):?>
								<?php
	              echo $this->Form->postLink(
                  'Eliminar',
                  array('action' => 'delete', $admin['Admin']['admin_id']),
                  array('confirm' => '¿Esta usted seguro que desea eliminar el Administrador '.$admin['Admin']['name'].'?')
              		);
	          		?>
	          	<?php else:?>
	          		<p style="color:red;">No Aplica</p>
	          	<?php endif;?>
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
				<div id="spinner" style="display:none;">
						<?php
			        echo $this->Html->image(
			            'spinner.gif',
			            array('id' => 'spinner:img')
			        );
	  				?>
				</div>
				<?php
					echo $this->Paginator->numbers();
				?>
			</div>
	</div>
</div>