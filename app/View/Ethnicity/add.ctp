<h1>Registrar Etnia</h1>
<?php
echo $this->Form->create('Ethnicity');
echo $this->Form->input('name');
echo $this->Form->input('type');
echo $this->Form->end('Guardar Etnia');
?>

<?php 
		echo $this->Html->link(
							    'Regresar',
							    array(
							        'action' => 'index',
							    ));
?>