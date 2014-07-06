<div class="container">
	<div class="row" >
		<div class="col-md-2" id="sidebar" style="margin-top:20px;">
			<div class="sidebar-nav">
				<?php echo
					$this->element('sidebar_contact')
				?>			
			</div>					
		</div>

		<div class="col-md-10">
			<h1 class="titulo">Contacto</h1>
			<hr>
			<div class="panel panel-success">
	  		<div class="panel-heading">
	  			<h3>Mensaje</h3>
	  			<p>Comuniquese con el equipo de AbyaYala acerca de cualquier inquietud, aporte o información que necesite.
					</p>
	  		</div>
	  		<div class="panel-body">
					<?php echo $this->Form->create('Message', array('role'=>'form')); ?>

					<div class="form-group">
						<label for="data[Message][subject]">		Asunto:
						</label>
						<?php echo $this->Form->input('subject',array('label'=>false, 'class'=>'form-control', 'placeholder'=>' Asunto'));?>
					</div>

					<div class="form-group">
						<label for="data[Message][author]">		Nombre:
						</label>
						<?php echo $this->Form->input('author',array('label'=>false, 'class'=>'form-control', 'placeholder'=>' Nombre'));?>
					</div>

					<div class="form-group">
						<label for="data[Message][email]">		Email:
						</label>
						<?php echo $this->Form->input('email',array('label'=>false, 'class'=>'form-control', 'placeholder'=>' Email'));?>
					</div>

					<div class="form-group">
						<label for="data[Message][body]">		Descripción:
						</label>
						<?php echo $this->Form->input('body',array('label'=>false, 'class'=>'form-control', 'rows'=>'3'));?>
					</div>

					<div class="form-group">
						<?php
						echo $this->Form->submit('Enviar Mensaje', array('class'=>'btn btn-success'));
						?>
					</div>

	  		</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('#MessageAddForm').validate({
			ignore: [],
			rules: {
				"data[Message][subject]":{
					required:true,
					rangelength: [3, 150]
				},
				"data[Message][author]":{
					required:true,
					rangelength: [3, 45]
				},
				"data[Message][email]":{
					required:true,
					email: true
				},
				"data[Message][email]":{
					required:true,
					email: true
				},
				"data[Message][body]":{
					required:true,
				},
		},
		messages: {
			"data[Message][subject]":{
					required: 'Campo Obligatorio',
					rangelength: 'El campo debe tener entre 3 y 150 caracteres'
			},
			"data[Message][author]":{
					required: 'Campo Obligatorio',
					rangelength: 'El campo debe tener entre 3 y 45 caracteres'
			},
			"data[Message][email]":{
					required:'Campo Obligatorio',
					email: 'El campo debe tener formato de Email'
			},
			"data[Message][body]":{
					required:'Campo Obligatorio',
			},
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