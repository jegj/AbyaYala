<h1>Cambiar	 Contenido</h1>


<!--Cambia segun el tipo de contenido que sea-->

<p>Nombre: <?php echo $content['Content']['name']?></p>
<p>Imagen:</p>
<a href='<?php echo  $content['Content']['access_path']?>' rel="prettyPhoto" title='<?php echo $content['Content']['name']?>'>
	<img src='<?php echo  $content['Content']['access_path']?>' width="60" height="60" alt='<?php echo $content['Content']['name']?>' />
</a>
<hr>
<div class="row content">	
	<div class="col-md-12">
		<?php
			echo $this->Form->create('Content', array('type'=>'file'));
			echo $this->Form->input('file', array('type' => 'file'));
			echo $this->Form->end('Cambiar Contenido');
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
<script>
	$(document).ready(function(){
		$("a[rel^='prettyPhoto']").prettyPhoto({
					animation_speed:'normal',
					theme:'light_square',
					social_tools: false,
		});
	});
</script>