<div class="container">    
  <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
      <div class="panel-heading">
          <div class="panel-title">
          	Administradores
          </div>
          <div style="float:right; font-size: 80%; position: relative; top:-10px">
          	<a href="#">
          		¿Olvido su contraseña?
          	</a>
          </div>
      </div>     

      <div style="padding-top:30px" class="panel-body" >
        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                           
				<?php
					echo $this->Form->create('Admin', 
						array(
							'role' => 'form', 
							'class' => 'form-horizontal'
						)
					);
				?>
                                    
          <div style="margin-bottom: 25px" class="input-group">
          	<span class="input-group-addon">
          		<i class="glyphicon glyphicon-user"></i>
          	</span>
          	<?php
          		echo $this->Form->input ('email',
          			array ( 
          				'label'  =>  false, 
          				'placeholder' => 'Email',
          				'class' => 'form-control'
          			));
          	?>
          </div>
                                
          <div style="margin-bottom: 25px" class="input-group">
          	<span class="input-group-addon">
          		<i class="glyphicon glyphicon-lock"></i>
          	</span>

          	<?php
          		echo $this->Form->input ('password',
          			array ( 
          				'type' => 'password',
          				'label'  =>  false, 
          				'placeholder' => 'Contraseña',
          				'class' => 'form-control'
          			));
          	?>
					</div>

         	<div style="margin-top:10px" class="form-group">

          	<div class="col-sm-12 controls" style="text-align:center">
              <?php
								echo $this->Form->submit('Ingresar', 
									array('class'=>'btn btn-success'));
							?>
            </div>
          </div>


					<div class="form-group">
						<div class="col-md-12 control">
							<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
								<p text-align='justify'>
								Si desea contactar con el equipo de AbyaYala, ingrese a la sección de 
								<b>
									<?php
										echo $this->Html->link('Contacto',
											array(
												'controller' => 'users',
												'action' => 'contact'
											)
										);
									?>
								</b>.
								</p>
          		</div>
      			</div>
  				</div>    
				</form>     

			</div>                     	
		</div>  
  </div>
  
<script>
	$(document).ready(function(){
		$('#AdminLoginForm').validate({
			ignore: [],
			rules: {
				"data[Admin][email]":{
					required:true,
					rangelength: [3, 150],
					email: true
				},
				"data[Admin][password]":{
					required:true,
					rangelength: [5, 45],
				},
			},
			messages: {
				"data[Admin][email]":{
					required: 'Campo Obligatorio',
					rangelength: 'El campo debe tener entre 3 y 150 caracteres',
					email: 'El campo debe ser un Correo valido'
				},
				"data[Admin][password]":{
					required: 'Campo Obligatorio',
					rangelength: 'El campo debe tener entre 5 y 45 caracteres'
				}
			},
			highlight: function(element) {
		 		$(element).closest('.input-group').removeClass('has-success');
				$(element).closest('.input-group').addClass('has-error');
      },
      unhighlight: function(element) {
				$(element).closest('.input-group').removeClass('has-error');
				$(element).closest('.input-group').addClass('has-success');
      },
      errorClass: 'help-block',
      errorElement: 'span',
      errorPlacement: function(error, element) {
    		$(element).parent().parent().after(error);
			},
		});
	});
</script>

<style>
	.help-block{
		color:#B94A48;
	}
</style>