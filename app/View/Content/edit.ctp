<div class="row content">
	<h1 style='margin-left:15px;'>Modificar Información Contenido</h1>
	<div class="col-md-6">
		<h3>Descripción Contenido</h3>
		<p>Contenido: <b><?php echo $content['Content']['name']?></b></p>
		<p>Tipo: <b><?php echo $content['Content']['type']?></b></p>
		<?php if($content['Content']['type']=='documento'):?>
			<p>Documento:</p>
			<?php
				echo $this->Html->link(
			  $content['Content']['name'],
			   array('action' => 'download',$content['Content']['content_id'])
				);
			?>
		<?php elseif($content['Content']['type']=='imagen'):?>
			<p>Imagen:</p>
			<a href='<?php echo  $content['Content']['access_path']?>' rel="prettyPhoto" title='<?php echo $content['Content']['name']?>'>
			<img src='<?php echo  $content['Content']['access_path']?>' width="60" height="60" alt='<?php echo $content['Content']['name']?>' />
			</a>
		<?php else:?>
			<p>Pista:</p>
			<?php echo $this->element('player', array('name'=>$content['Content']['name'], 'audio'=>$content['Content']['access_path']));?>
		<?php endif;?>
	</div>
	<div class="col-md-6">
		<h3>Información Básica</h3>	
		<?php
			echo $this->Form->create('Content', array('type'=>'file'));
			echo $this->Form->input('description', array('label'=>'Descripción'));
			echo $this->Form->input('file', array('type' => 'file', 'label'=>'Archivo'));

			if($content['Content']['type']=='documento'){
				echo $this->Form->input('author', array('label'=>'Autor'));
				echo $this->Form->input('year', array('label'=>'Año'));
				$type = array(0 => 'Ley', 1 => 'Trabajo/Articulo');
				echo $this->Form->input('type_document', array('label'=>'Tipo Documento', 'options'=>$type, 'default'=>0));
			}

			echo $this->Form->end('Guardar Cambios');
		?>
	</div>
</div>
<div>
	<h3>Acciones:</h3>
	<ul>
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
<script>
	$(document).ready(function(){
		$("a[rel^='prettyPhoto']").prettyPhoto({
					animation_speed:'normal',
					theme:'light_square',
					social_tools: false,
		});
	});
</script>