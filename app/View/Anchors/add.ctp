<div class="row content">
	<div style='margin-left:15px;'>
		<h1>Etnias Indigenas</h1>
	</div>	
	<hr>
	<div class="col-md-12">
		<div class="panel panel-success">
	  	<div class="panel-heading">
	  		<h3>
	  			Agregar Ancla(<?echo $ethnicityName?>)
	  		</h3>
	  		<p>
  				En esta sección podra agregar una ancla a la Etnia Indigena <b><?echo $ethnicityName?></b>.
				</p>
	  	</div>
	  	<div class="panel-body">
	  		<?php
					echo $this->Form->create('Anchor', array('role'=>'form'));
				?>
				<div class="form-group">
					<label for="data[Anchor][name]">		Nombre:
					</label>
					<?php echo $this->Form->input('name',array('label'=>false, 'class'=>'form-control', 'placeholder'=>' Nombre de la Ancla'));?>
				</div>

				<?=
					$this->Form->input('Ethnicity.ethnicity_id',array('value'=>$ethnicityId));
				?>


				<div class="form-group">
					<label for="data[Ethnicity][description]">		Descripción:
					</label>
					<?php echo $this->Form->input('description',array('label'=>false,'id'=>"data[Ethnicity][description]"));?>
				</div>


				<div class="form-group">
					<?php
					echo $this->Form->submit('Crear Ancla', array('class'=>'btn btn-success', ));
					?>
				</div>

	  	</div>
	  </div>
	</div>
</div>

<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Agregar Nota</h4>
      </div>
      <div class="modal-body" id="modal-body">
      	<div id="modalForm">
	     		<form role="form">
					  <div id="formNoteName" class="form-group">
					    <label for="noteName">Nota</label>
					    <input type="email" class="form-control" id="noteName" placeholder="Nombre de la Nota" required>
					  </div>
					  <div id="formNoteDesc" class="form-group">
					    <label for="noteDescription">Descripción</label>
					    <textarea  id ="noteDescription" class="form-control" rows="3" required></textarea>
					  </div>
					</form>
				</div>
				<div id="modalResul">
				</div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-success" onclick="return crearNota()">Agregar Nota</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>



<div class="row content">
	<div class="col-md-12">
		<div>
			<h3>Acciones:</h3>
			<ul>
				<li>
					<?php	 
					echo $this->Html->link(
				    'Anclas de '.$ethnicityName,
				    array(
				    		'controller' => 'ethnicities',
				        'action' => 'view',
				        $ethnicityId
				    ));
					?>
				</li>
			</ul>
		</div>
	</div>
</div>

<script>


	$(document).ready(function(){

		$('#AnchorAddForm').validate({
			ignore: [],
			rules: {
				"data[Anchor][name]":{
					required:true,
					rangelength: [3, 45]
				},
				"data[Anchor][description]":{
					required:  
						function(text) {
							
							for (var i in CKEDITOR.instances)
								CKEDITOR.instances[i].updateElement();

							var editorcontent = text.value.replace(/<[^>]*>/gi, ''); 

    					return editorcontent.length === 0;
						}
				},
			},
			messages: {
				"data[Anchor][name]":{
					required: 'Campo Obligatorio',
					rangelength: 'El campo debe tener entre 3 y 45 caracteres'
				},
				"data[Anchor][description]":{
					required: 'Campo Obligatorio',
				},
			},

		 	highlight: function(element) {

		 		if( $(element).is('textarea')){
		 			var tag=document.getElementById('cke_data[Ethnicity][description]');
		 			$(tag).css('border', '1px solid #B94A48');
		 		}

		 		$(element).closest('.form-group').removeClass('has-success');
				$(element).closest('.form-group').addClass('has-error');
					
      },

      unhighlight: function(element) {
      	if( $(element).is('textarea')){
      		var tag=document.getElementById('cke_data[Ethnicity][description]');
		 			$(tag).removeAttr('style');
		 			$(tag).css('border', '1px solid #468847');
      	}

				$(element).closest('.form-group').removeClass('has-error');
				$(element).closest('.form-group').addClass('has-success');
						
      },

			errorElement: 'span',
      errorClass: 'help-block',
		});

		CKEDITOR.replace( 'data[Anchor][description]', {
	    filebrowserBrowseUrl: '/AbyaYala/contents/browse',
	    filebrowserUploadUrl: '/AbyaYala/contents/upload',
	    width: "100%",
	    height: "250px"
		});


	});
</script>