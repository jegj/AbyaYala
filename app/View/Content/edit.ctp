<h1>Editar Contenido</h1>
<div class="row content">	
	<div class="col-md-12">
		<?php
			echo $this->Form->create('Content', array('type'=>'file'));
			echo $this->Form->input('name');
			echo $this->Form->input('file', array('type' => 'file'));
		?>
	</div>
</div>
<p></p>
<p></p>
<?php 
		echo $this->Html->link(
							    'Regresar',
							    array(
							        'action' => 'index',
							    ));
?>