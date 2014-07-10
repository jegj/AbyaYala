<?php
	echo $this->element('ethnicity_index',
		array(
		'ethnicity'=> $ethnicity,
		'result' => true
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
<?php echo $this->Js->writeBuffer();?>