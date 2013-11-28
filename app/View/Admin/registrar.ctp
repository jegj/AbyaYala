<h2 style="font-family:arial;color:black;font-size:18px;">Registro de Usuario</h2><br><br>
<div class="col-md-5">
<?php
	echo $this->Form->create('Admin', array ( 'action' => 'registrar'));
	
	echo $this -> Form -> input ( 'Admin.name', array ( 'label'  =>  'Nombre del Administrador' ) );
	
	echo $this -> Form -> input ( 'Admin.last_name', array ( 'label'  =>  'Apellido del Administrador' ) );
	echo  $this -> Form -> input ( 'Admin.password',  array ( 'type'=>'password', 'label'  => 'Contraseña', 'text' =>'Password' ) );  
	
	echo  $this -> Form -> input ( 'Admin.passwd_confirm',  array ( 'type'=>'password', 'label'  => 'Confirmar Contraseña', 'text' =>'Password' ) );  
	
	echo $this -> Form -> textarea ( 'Admin.email', array ('class'=>'ckeditor' ) );
	
	echo $this->Form->input('Admin.type',  array ('legend'=>'Tipo Administrador','type' =>'radio', 'options'=> array ('Administrador Global', 'Administrador de Contenido') ));
	?>

	<?php
	echo  $this -> Form -> end ( "Registrar");?>
	<?php	
	echo $this->Html->link('Atras', '/Admins/index');
	?>
	</div>
<div class="flash flash_success">
    <?php echo $this->Session->flash(); ?>
</div>