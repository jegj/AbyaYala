<h1>Modificar Etnia</h1>
<?php
echo $this->Form->create('Ethnicity');
echo $this->Form->input('name');
echo $this->Form->input('type');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Actualizar');
?>

<?php 
		echo $this->Html->link(
							    'Regresar',
							    array(
							        'action' => 'index',
							    ));
?>