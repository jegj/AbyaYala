<?php
	echo $this->Form->create('Admin', array ( 'action' => 'editAdmin'));
 	echo $this->Form->input('id', array('type' => 'hidden'));
	echo  $this -> Form -> input ( 'Admin.password',  array ( 'type'=>'password', 'label'  => 'Contraseña', 'text' =>'Password' ) );  
		echo ('Debe tener mínimo 8 caracteres entre números y letras');
	echo  $this -> Form -> input ( 'Admin.passwd_confirm',  array ( 'type'=>'password', 'label'  => 'Confirmar Contraseña', 'text' =>'Password' ) );  
		echo ('Debe tener mínimo 8 caracteres entre números y letras');
		 #echo $this->Form->input('Admin.admin_id', array('type' => 'hidden', 'default'=>1));
	?>
	<?php
	echo  $this -> Form -> end ( "Guardar Cambios");?>