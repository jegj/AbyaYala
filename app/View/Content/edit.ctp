<div class="row content">
	<h1 style='margin-left:15px;'>Modificar Información Contenido</h1>
	
	<!--
	<div class="col-md-5">	
			<?php if($content['Content']['type']=='documento'):?>
			<p>Documento:</p>
			<?php
				echo $this->Html->link(
			  $content['Content']['name'],
			   array('action' => 'download',$content['Content']['content_id'], )
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
	-->
	<div class="col-md-6">
		<h3>Información Básica</h3>	

		<?php
		echo $this->Form->create('Content', array('type'=>'file', 'class'=>'form-horizontal'));?>

			<div class="form-group">
				<label for="data[Content][name]" class="col-sm-2 control-label">Nombre:</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('name',array('label'=>false));?>
				</div>
			</div>

			<div class="form-group">
				<label for="data[Content][description]" class="col-sm-2 control-label">Descripción:</label>
				<br>
				<br>
				<div class="col-sm-10">
					<?php echo $this->Form->input('description',array('label'=>false));?>
				</div>
			</div>

			<?php if($content['Content']['type']=='documento'):?>
				<div class="form-group">
					<label for="data[Content][author]" class="col-sm-2 control-label">Autor:</label>
						<div class="col-sm-10">
							<?php echo $this->Form->input('author', array('label'=>false));?>
						</div>
				</div>

				<div class="form-group">
					<label for="data[Content][year]" class="col-sm-2 control-label">Año:</label>
					<div class="col-sm-10">
						<?php echo $this->Form->input('year', array('label'=>false));?>
					</div>
				</div>

				<div class="form-group">
					<label for="data[Content][type_document]" class="col-sm-2 control-label">Tipo:</label>
					<div class="col-sm-10">
						<?php
							$type = array(0 => 'Ley', 1 => 'Trabajo/Articulo');
							echo $this->Form->input('type_document', array('label'=>false, 'options'=>$type, 'default'=>0));
						?>
					</div>
				</div>

				
  			<!--
				<div class="form-group">
					<label for="data[Content][only_read]" class="col-sm-6 control-label">Solo Lectura</label>
						
					<div class="col-sm-6">
						<?php
							echo $this->Form->input('only_read', array('label'=>false, 'type'=>'checkbox'));
						?>
					</div>
				</div>
				-->
			<?php endif;?>

			
			<!--
			<div class="form-group">
				<label for="data[Content][file]" class="col-sm-2 control-label">Archivo:</label>
				<br>
				<br>
				<div class="col-sm-10">
					<?php
					echo $this->Form->input('file', array('type' => 'file', 'label'=>false));
					?>
				</div>
			</div>
			-->

			<?php if($content['Content']['type']=='documento'):?>
				 <label>
					<?php echo $this->Form->checkbox('only_read');?>
					Solo Lectura
				 </label>
				<!--
				<div class="checkbox">
			    <label>
			    	<input type="hidden" name="data[Content][only_read]" value="0" />
			      <input type="checkbox" name="data[Content][only_read]" value="1"> 
			      Solo Lectura
			    </label>
	  		</div>
	  		-->
	  	<?php endif;?>
	  	<p></p>
		
			<div class="form-group">
				<div class="col-sm-10">
					<?php
					echo $this->Form->submit('Guardar Cambios', array('class'=>'btn btn-success'));
					?>
				</div>
			</div>
			<?php echo $this->Form->end();?>
	</div>

	<div class="col-md-6">
		<h3>Descripción Contenido</h3>
		<div style="margin-top:20px;">
			<p>Contenido: <b><?php echo $content['Content']['name']?></b></p>
			<p>Tipo: <b><?php echo $content['Content']['type']?></b></p>
			<p>Extensión: <b><?php echo $content['Content']['extesion_document']?></b></p>
			<?php if($content['Content']['type']=='documento'):?>
					<?php 
					echo $this->Html->link(
						$this->Html->image('/img/descargar_pdf.jpeg', array('width' => '200', 'height' => '200')),
						 array('action' => 'download',$content['Content']['content_id'], true), array('escape'=>false));
	        ?>
	      <p></p>
				<p><b>Notas:</b></p>
				<ul>
					<li>Para descargar la documento debes clickear la imagen.</li>
					<li>Si desea cambiar el archivo subido debe tener la misma extensión.</li>
				</ul>
			<?php elseif($content['Content']['type']=='imagen'):?>
				<p>Imagen Previa:</p>
				<a href='<?php echo  $content['Content']['access_path']?>' rel="prettyPhoto" title='<?php echo $content['Content']['description']?>'>
					<img src='<?php echo  $content['Content']['access_path']?>' width="80" height="80" alt='<?php echo $content['Content']['name']?>' />
				</a>
				<p></p>
				<p><b>Notas:</b></p>
				<ul>
					<li>Si desea cambiar el archivo subido debe tener la misma extensión.</li>
				</ul>
			<?php else:?>
				<p>Pista:</p>
				<?php echo $this->element('player', array('name'=>$content['Content']['name'], 'audio'=>$content['Content']['access_path']));?>
				<p><b>Notas:</b></p>
				<ul>
					<li>Si desea cambiar el archivo subido debe tener la misma extensión.</li>
				</ul>
			<?php endif;?>
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
<script>
	$(document).ready(function(){
		$("a[rel^='prettyPhoto']").prettyPhoto({
					animation_speed:'normal',
					theme:'light_square',
					social_tools: false,
		});

		$('#ContentEditForm').validate({
    rules: {
        "data[Content][name]": {
            required:true,
             messages: {
							required: "Campo Obligatorio",
						}
        }
    },
    messages: {
    	"data[Content][name]": {
    		required: 'Campo Obligatorio'
    	}
    },
    highlight: function(element) {
			$(element).closest('.form-group').removeClass('success').addClass('error');
		},
		success: function(element) {
			element
			.text('OK!').addClass('valid')
			.closest('.form-group').removeClass('error').addClass('success');
		}
  });
	});
</script>