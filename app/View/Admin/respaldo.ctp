<div class="row content">
	<div style='margin-left:15px;'>
		<h1>Módulo de Respaldos</h1>
		<hr>
		<div class="row">
			<div class="container">
				<div class="col-md-3">
	          		<div class="thumbnail">
	            		<?php echo $this->Html->image('respaldo_aplicacion.jpg', array('alt' => 'Respaldo de Aplicación'));?>
	              		<div class="caption">
	                		<h4>Respaldo de Aplicación</h4>
	                		<p>Respalde todo el contenido de la aplicación, incluyendo el código fuente, los log generados por la aplicación y todos los archivos de media relacionados.</p>
	                		<?php echo $this->Html->link('Respaldar Aplicación', array('action'=>'respaldo_aplicacion', 1), array('class' => 'btn btn-info btn-xs'));?>
	                		<!-- <a href="#" class="btn btn-info btn-xs" role="button">Respaldar Aplicación</a> -->
	            		</div>
	          		</div>
	        	</div>
	        	
				<div class="col-md-3">
	          		<div class="thumbnail">
	            		<?php echo $this->Html->image('respaldo_base_datos.jpg', array('alt' => 'Respaldo de Base de Datos'));?>
	              		<div class="caption">
	                		<h4>Respaldo de Base de Datos</h4>
	                		<p>Respalde toda la información guardada en la base de datos de la aplicación.</p>
	                		<?php echo $this->Html->link('Respaldar Base de Datos', array('action'=>'respaldo_aplicacion', 2), array('class' => 'btn btn-info btn-xs'));?>
	                		<!-- <a href="#" class="btn btn-info btn-xs" role="button">Respaldar Base de Datos</a>  -->
	            		</div>
	          		</div>
	        	</div>
	        	
	        	<div class="col-md-3">
	          		<div class="thumbnail">
	            		<?php echo $this->Html->image('respaldo_media.jpg', array('alt' => 'Respaldo de Media'));?>
	              		<div class="caption">
	                		<h4>Respaldo de Media</h4>
	                		<p>Respalde las imagenes, documentos PDF y las pistas de audio que se han subido a la aplicación.</p>
	                		<?php echo $this->Html->link('Respaldar Archivos de Media', array('action'=>'respaldo_aplicacion', 3), array('class' => 'btn btn-info btn-xs'));?>
	                		<!-- <a href="#" class="btn btn-info btn-xs" role="button" >Respaldar Archivos de Media</a> -->
	            		</div>
	          		</div>
	        	</div>
	        </div>
        </div>
	</div>
</div>


<div class="modal fade" id="modal-respaldo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Generando Respaldo</h4>
      </div>
      <div class="modal-body" id="modal-respaldo-body">
      	<div id = url style="display: none">
      		Se genero el respaldo correctamente
      	</div>
      	<div  id="spinner" style=" margin-left: auto ; margin-right: auto ;  width: 200px; display: block;">
			<?php echo $this->Html->image('spinner_respaldo.gif', array('alt' => 'Generando Respaldo'));?>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>