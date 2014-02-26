<div class="row content">
	<div style='margin-left:15px;'>
		<h1>Módulo de Contenido</h1>
		<hr>
		<div class="col-md-12">
			<div class="panel panel-success">
		  	<div class="panel-heading">
					<h3 >
						Modificar Contenido
					</h3>
					<p>
						En esta sección podra visualizar el contenido anteriormente cargado en AbayYala, así tambien como poder modificar su información básica.
					</p>
		  	</div>
		  	<div class="panel-body">
					<h3>Información Básica</h3>	
					<?php
						echo $this->Form->create('Content', array('role'=>'form'));
					?>

					<div class="form-group">
						<label for="data[Content][extesion_document]">			
							Extension:
						</label>
						<?php echo $this->Form->input('extesion_document',array('label'=>false, 'class'=>'form-control', 'disabled'));?>
					</div>

					<div class="form-group">
						<label for="data[Content][extesion_document]">			
							Vista Previa:
						</label>
						<p></p>
						<?php if($content['Content']['type']=='documento'):?>
							<?php 
								echo $this->Html->link($content['Content']['name'],
									 array('action' => 'download',$content['Content']['content_id'], true));
			        ?>

						<?php elseif($content['Content']['type']=='imagen'):?>
								<a href= '<?echo $content['Content']['access_path'].'?'.rand()?>'
				    					rel='prettyPhoto' title= '<?php echo $content['Content']['name']?>'
				    					>
				    						<?php echo $content['Content']['name']?>
				    		</a>
						<?php else:?>
							<?php
							 	echo $this->Html->link(
							 		$content['Content']['name']
	              ,
	               array('action' => 'audio',$content['Content']['content_id']), array('onclick'=>'return getMusic('.$content['Content']['content_id'].');')
	          		);	    			
	            ?>
						<?php endif;?>
					</div>

					<div class="form-group">
						<label for="data[Content][name]">			Nombre:
						</label>
						<?php echo $this->Form->input('name',array('label'=>false, 'class'=>'form-control'));?>
					</div>

					<div class="form-group">
						<label for="data[Content][description]">
							Descripción:
						</label>
						<?php echo $this->Form->input('description',array('label'=>false, 'class'=>'form-control'));?>
					</div>

					<?php if($content['Content']['type']=='documento'):?>
						<div class="form-group">
							<label for="data[Content][author]" >
							Autor:
							</label>
							<?php echo $this->Form->input('author', array('label'=>false, 'class'=>'form-control'));?>
						</div>

						<div class="form-group">
						<label for="data[Content][year]">	Año:
						</label>
						<?php echo $this->Form->input('year', array('label'=>false, 'class'=>'form-control'));?>
						</div>

						<div class="form-group">
							<label for="data[Content][type_document]">Tipo Documento:</label>
							<?php
								$type = array(0 => 'Ley', 1 => 'Trabajo/Articulo');
								echo $this->Form->input('type_document', array('label'=>false, 'options'=>$type, 'default'=>0, 'class'=>'form-control'));
							?>
						</div>
					<?php endif;?>

					<?php if($content['Content']['type']=='documento'):?>
						 <label>
							<?php echo $this->Form->checkbox('only_read');?>
							Solo Lectura
						 </label>
			  	<?php endif;?>
	  	
					<div class="form-group">
						<?php
						echo $this->Form->submit('Guardar Cambios', array('class'=>'btn btn-success'));
						?>
					</div>

					<?php echo $this->Form->end();?>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Cancion</h4>
      </div>
      <div class="modal-body" id="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>


<script>
	$(document).ready(function(){
		$('#myModal').on('hidden.bs.modal', function (e) {
  			$("#jquery_jplayer_1").jPlayer("stop");
		})

		$("a[rel^='prettyPhoto']").prettyPhoto({
				animation_speed:'normal',
				theme:'light_square',
				social_tools: false,
		});

		$('#ContentEditForm').validate({
	    rules: {
	        "data[Content][name]": {
	            required:true,
	            rangelength: [3, 45]
	        },
	    },
	    messages: {
	    	"data[Content][name]": {
	    		required: 'Campo Obligatorio',
	    		rangelength: 'El campo debe tener entre 3 y 45 caracteres'
	    	}
	    },
		  highlight: function(element) {
		  	$(element).closest('.form-group').removeClass('has-success');
		  	$(element).closest('.form-group').addClass('has-error');
		  },
	    unhighlight: function(element) {
				$(element).closest('.form-group').removeClass('has-error');
				$(element).closest('.form-group').addClass('has-success');
	    },
	  	errorElement: 'span',
	  	errorClass: 'help-block',
  	});
	});
</script>