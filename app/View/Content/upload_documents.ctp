<h1>Módulo de Carga de Documentos</h1>
<?php
	if(isset($result)){
		print_r($result);
	}
?>
<div class="row content">	
	<div class="col-md-12">
		<p>
			Atraves de este módulo podra subir contenido al servidor. Solo se permiten las siguiente extensiones: <b>pdf</b> y los archivo deben ser a los maximo de <b>10MB</b>.
		</p>
	</div>
</div>
<div class="row content">
	<div class="col-md-6">
		<?php echo $this->Form->create('Content', array('type'=>'file')); ?>

		<fieldset>
			<legend>
				<?php echo __('Agregar Documento'); ?>
			</legend>
			<?php echo $this->Form->input('description');?>
			<?php echo $this->Form->input('year');?>
			<?php echo $this->Form->input('author');?>
			<?php 
				$options = array('0' => 'Trab.Inves/Articulo', '1' => 'Ley');
			?>
			<?php echo $this->Form->input('type_document', array('options'=>$options, 'default'=>'0'));?>
			<?php echo $this->Form->input('file', array('type' => 'file'));?>
			<?php echo $this->Form->end(__('Agregar')); ?>
		</fieldset>
	</div>
</div>
<?php 
		echo $this->Html->link(
							    'Ver Contenido',
							    array(
							        'action' => 'index',
							    ));
?>