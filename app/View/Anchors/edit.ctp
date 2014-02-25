<div class="row content">
	<div style='margin-left:15px;'>
		<h1>Etnias Indigenas</h1>
	</div>	
	<hr>
	<div class="col-md-12">
		<div class="panel panel-success">
	  	<div class="panel-heading">
	  		<h3>
	  			Modificar Ancla
	  		</h3>
	  		<p>
  				En esta sección podra modificar la ancla seleccionada.
				</p>
				<p>
					<b>Nota: </b>No olvide agregar el titulo correspondiente a la Ancla.
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

				<?php echo $this->Form->hidden('ethnicitiesId',array('value'=>$ethnicityId));?>

				<div class="form-group">
					<label for="data[Ethnicity][description]">		Descripción:
					</label>
					<?php echo $this->Form->input('description',array('label'=>false,'id'=>"data[Ethnicity][description]"));?>
				</div>


				<div class="form-group">
					<?php
					echo $this->Form->submit('Modificar Ancla', array('class'=>'btn btn-success', ));
					?>
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
						echo $this->Html->link('Agregar Nota', 
							array('controller'=>'notes', 'action'=>'add',$ethnicityId)
						);
					?>
				</li>
				<li>
					<?php	 
					echo $this->Html->link(
				    'Regresar',
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

		$('#AnchorEditForm').validate({
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
