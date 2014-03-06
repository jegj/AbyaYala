<div class="row content">
	<div class="col-md-12">
		<h1>Módulo de Mensajes</h1>
		<hr>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<?php echo $message['Message']['subject']?>
				</h3>
			</div>
			<div class="panel-body">
				<?php echo $message['Message']['body']?>
				<hr>
				<div>
					<p>
						<b>Fecha de Registro: </b> <?php echo MiscLib::dateFormat($message['Message']['create_date']);?>
					</p>

					<p>
						<b>Remitente: </b><?php echo $message['Message']['author']?>
					</p>

					<p>
						<b>Email: </b><?php echo $message['Message']['email']?>
					</p>
				</div>
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
					<?php echo $this->Html->link('Ir a Mensajes de Contacto', array('action' => 'index')); ?>
				</li>
			</ul>
		</div>
	</div>
</div>