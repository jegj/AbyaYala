<?php
	echo $this->element('admins_index',
		array(
		'admins'=> $admins,
		'result' => false
		)
	);
?>

<div class="row content">
	<div class="col-md-12">
		<p></p>
		<p><b>Notas:</b></p> 
		<ul>
			<li>
				<p>
					La búsqueda se realiza en base al nombre de los Administradores.
				</p>
			</li>
		</ul>
		<div class="acciones">
			<h3>Acciones:</h3>
			<ul>
				<li>
					<?php 
						echo $this->Html->link(
							'Agregar Administrador',
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