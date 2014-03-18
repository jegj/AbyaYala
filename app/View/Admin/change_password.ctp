<div class="row content">
	<div style='margin-left:15px;'>
		<h1>Información Personal</h1>
	</div>
	<hr>
	<div class="col-md-12">
		<div class="panel panel-success">

	  	<div class="panel-heading">
	  		<h3>
	  			Cambiar Contraseña
	  		</h3>
	  	</div>

	  	<div class="panel-body">	  		
		  	<?php
		  		echo $this->Form->create('Admin', array ( 
		  			'action' => 'changePassword',
		  			'role' => 'form'
		  			)
		  		);
		  	?>

		  	<div class="form-group">
					<label for="data[Admin][oldPassword]">	
						Contraseña Antigua:
					</label>
					<?php echo $this->Form->input('oldPassword',
						array('label'=>false, 
							'class'=>'form-control', 
							'placeholder'=>' Contraseña Antigua',
							'type' => 'password',
						));
					?>
				</div>

				<div class="form-group">
					<label for="data[Admin][newPassword]">	
						Contraseña Nueva:
					</label>
					<?php echo $this->Form->input('newPassword',
						array('label'=>false, 
							'class'=>'form-control', 
							'placeholder'=>' Contraseña Nueva',
							'type' => 'password',
						));
					?>
				</div>

					<div class="form-group">
					<label for="data[Admin][confNewPassword]">	
						Confirmación Contraseña Nueva:
					</label>
					<?php echo $this->Form->input('confNewPassword',
						array('label'=>false, 
							'class'=>'form-control', 
							'placeholder'=>'Confirmación Contraseña Nueva',
							'type' => 'password',
						));
					?>
				</div>

				<div class="form-group">
					<?php
						echo $this->Form->submit('Cambiar Contraseña', 
							array('class'=>'btn btn-success', )
						);
					?>
				</div>

	  	</div>

	  </div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('#AdminChangePasswordForm').validate({
			ignore: [],
			rules: {
				"data[Admin][oldPassword]":{
					required:true,
					rangelength: [5, 45]
				},
				"data[Admin][newPassword]":{
					required:true,
					rangelength: [5, 45]
				},
				"data[Admin][confNewPassword]":{
					required:true,
					rangelength: [5, 45],
					equalTo : "#AdminNewPassword"
				}					
			},
			messages: {
				"data[Admin][oldPassword]":{
					required: 'Campo Obligatorio',
					rangelength: 'El campo debe tener entre 5 y 45 caracteres'
				},
				"data[Admin][newPassword]":{
					required: 'Campo Obligatorio',
					rangelength: 'El campo debe tener entre 5 y 45 caracteres'
				},
				"data[Admin][confNewPassword]":{
					required: 'Campo Obligatorio',
					rangelength: 'El campo debe tener entre 5 y 45 caracteres',
					equalTo: 'Las Clave Nueva y su Confirmación deben ser iguales'
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