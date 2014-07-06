<div class="row content">
	<div class="col-md-12">
		<h1>Nota</h1>
		<hr>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<?php echo $note['Note']['name']?>
				</h3>
			</div>
			<div class="panel-body">
				<p>
					<?php echo $note['Note']['description']?>
				</p>
			</div>
		</div>
	</div>
</div>

<div class="row content">
	<div class="col-md-12">
		<div>
			<h3>Acciones:</h3>
			<ul>
				<li>
					<?php echo $this->Html->link('Regresar', array(
							'controller'=>'ethnicities',
							'action' => 'view',
							$ethId
							)
						); ?>
				</li>
			</ul>
		</div>
	</div>
</div>