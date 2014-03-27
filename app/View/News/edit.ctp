<div class="row content">
	<div style='margin-left:15px;'>
		<h1>Módulo de Noticias</h1>
		<hr>
		<div class="col-md-12">
			<div class="panel panel-success">
	  		<div class="panel-heading">
	  			<h3>Modificar Noticia</h3>
	  			<p>En esta sección podra modificar una Noticia del portal AbyaYala y poder administrar su contenido.
					</p>
	  		</div>
	  		<div class="panel-body">
				  <?php
					echo $this->Form->create('News', array('role'=>'form', 'type'=>'file' ));
					?>

					<div class="form-group">
						<label for="data[News][title]">		Titulo:
						</label>
						<?php echo $this->Form->input('title',array('label'=>false, 'class'=>'form-control', 'placeholder'=>' Titulo'));?>
					</div>

					<div class="form-group">
						<label for="data[News][author]">		Autor:
						</label>
						<?php echo $this->Form->input('author',array('label'=>false, 'class'=>'form-control', 'placeholder'=>' Autor'));?>
					</div>

					<div class="form-group">
						<label for="data[News][link]">		Fuente(Opcional):
						</label>
						<?php echo $this->Form->input('link',array('label'=>false, 'class'=>'form-control', 'placeholder'=>' Fuente'));?>
					</div>

					<div class="form-group">
						<label for="data[News][content_id]">		Imagen Principal:
						</label>
						<?php echo $this->Form->input('content_id',array('label'=>false, 'class'=>'form-control'));?>
					</div>


						<p class="help-block">Esta imagen representara a la noticia en la sección de noticias de AbyaYala. Seleccione la imagen principal 
							<button type="button" class="btn btn-primary btn-xs" onclick="getImages(1, 4, true)">Imagenes</button><br> o ingrese al módulo de contenido para 	<?php 
									echo $this->Html->link(
								    'subir contenido',
								    array(
								    		'controller'=>'contents',
								        'action' => 'uploadContent',
								    ),
								    array('target'=>'_blank')
								    );
									?>.
						</p>

					<div class="form-group">
						<label for="data[News][previous_text]">		Texto Descriptivo:
						</label>
						<?php echo $this->Form->input('previous_text',array('label'=>false,'id'=>"data[News][previous_text]", 'class'=>'form-control', 'type'=>'textarea'));?>
					</div>
						<p class="help-block">
							Este campo representa una pequeña descripción de la noticia que se muestra junto con la imagen principal.
						</p>


					<div class="form-group">
						<label for="data[News][description]">		Descripción:
						</label>
						<?php echo $this->Form->input('description',array('label'=>false,'id'=>"data[News][description]"));?>
					</div>


					<div class="form-group">
						<?php
						echo $this->Form->submit('Modificar Noticia', array('class'=>'btn btn-success'));
						?>
					</div>
					
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
						    'Ir a Noticias Registradas',
						    array(
						        'action' => 'index',
						    ));
					?>
				</li>
			</ul>
		
		</div>
	</div>	
</div>

<div class="modal fade" id="modalAddNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Imagenes de AbyaYala</h4>
      </div>

      <div class="modal-body" id="modalAddNew-body">
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function(){
	

		jQuery.validator.addMethod("validUrl", function(value, element) {
				 var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
   			return this.optional(element) || regexp.test(value);  
			},'El campo debe ser una URL valida');


		$('#NewsEditForm').validate({
			ignore: [],
			rules: {
				"data[News][title]":{
					required:true,
					rangelength: [3, 150]
				},
				"data[News][author]":{
					required:true,
					rangelength: [3, 45]
				},
				"data[News][link]":{
					validUrl:true
				},
				"data[News][description]":{
					required:  
						function(text) {
							
							for (var i in CKEDITOR.instances)
								CKEDITOR.instances[i].updateElement();

							var editorcontent = text.value.replace(/<[^>]*>/gi, ''); 

    					return editorcontent.length === 0;
						}
				},
				"data[News][previous_text]":{
					required:true,
					rangelength: [3, 300]
				}
			},
			messages: {
				"data[News][title]":{
					required: 'Campo Obligatorio',
					rangelength: 'El campo debe tener entre 3 y 150 caracteres'
				},
				'data[News][author]':{
					required: 'Campo Obligatorio',
					rangelength: 'El campo debe tener entre 3 y 45 caracteres'
				},

				"data[News][description]":{
					required: 'Campo Obligatorio',
				},
				"data[News][previous_text]":{
					required: 'Campo Obligatorio',
					rangelength: 'El campo debe tener entre 3 y 300 caracteres'
				}
			},
			highlight: function(element) {

		 		if( $(element).is('textarea')){
		 			var tag=document.getElementById('cke_data[News][description]');
		 			$(tag).css('border', '1px solid #B94A48');
		 		}

		 		$(element).closest('.form-group').removeClass('has-success');
				$(element).closest('.form-group').addClass('has-error');
					
      },
      unhighlight: function(element) {
      	if( $(element).is('textarea')){
      		var tag=document.getElementById('cke_data[News][description]');
		 			$(tag).removeAttr('style');
		 			$(tag).css('border', '1px solid #468847');
      	}

				$(element).closest('.form-group').removeClass('has-error');
				$(element).closest('.form-group').addClass('has-success');
      },
      errorElement: 'span',
      errorClass: 'help-block',
		});
		
		CKEDITOR.replace( 'data[News][description]', {
	    filebrowserBrowseUrl: '/AbyaYala/contents/browse',
	    filebrowserUploadUrl: '/AbyaYala/contents/upload',
	    width: "100%",
	    height: "250px"
		});
	});
</script>