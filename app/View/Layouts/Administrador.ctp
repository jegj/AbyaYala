<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>AbyaYala</title>
	<?php echo $this->Html->meta('icon');?>

	<!-- Archivos CSS-->
	<?
		echo $this->Html->css('bootstrap/bootstrap.min');
		echo $this->Html->css('abyayala/abyayala');
		echo $this->Html->css('prettyPhoto/prettyPhoto');
	?>
	<!-- Archivos Javascript-->
	<?
		echo $this->Html->script('jquery/jquery-1.10.2.min', array('inline' => false));

		echo $this->Html->script('prettyPhoto/jquery.prettyPhoto', array('inline' => false));
		
		echo $this->Html->script('bootstrap/bootstrap.min', array('inline' => false));

		echo $this->Html->script('jquery-validation/jquery.validate.min', array('inline' => false));

		echo $this->Html->script('jquery-validation/additional-methods.min', array('inline' => false));

		echo $this->Html->script('jquery.dataTables.min', array('inline' => false));

		

		//echo $this->Html->script('ckeditor/ckeditor');

		//echo $this->Html->script('AbyaYala/validaciones', array('inline' => false));
	?>
		
	<?php
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="wrap"> 
		<div class="container">
		<!-- -------CONTENIDO-------- -->	
		<div class="row">
			<div class="row">
		  	<div class="col-md-2" id="logos-facultades">
		  		<a href="#">
			  			<img alt="Ciencias"  width="85" height="115" src="../app/webroot/assets/imagenes/logo_ucv_fc.png" style="margin-top:5px;"> 
			  	</a>
			  	<a href="">
			  		<img alt="Humanidades"  width="85	" height="115" src="../app/webroot/assets/imagenes/logo_ucv_fhe.png" style="margin-top:5px;">
			  	</a>
		  	</div>
			  <div id="background-banner" class="col-md-8">
					<div id="logo" class="col-md-10">
			  		<a href="#">
			  			<img alt="AbyaYala" height="76" src="../app/webroot/assets/imagenes/banner.png" width="250"> 
			  		</a>
					</div>
				</div>
				<div id="imagen_indio_7" class="col-md-2">
					<a href="">
						<img alt="AbyaYala" height="115" src="../app/webroot/assets/imagenes/indio_7.jpg" width="175"> 
					</a>
				</div>
			</div>
			<div class="container" id="contenido-administrador">
					<div class="col-md-2" id="sidebar">
					 	<div class = "list-group">
					 		<a href = "#" class = "list-group-item active">
	              <h4 class = "list-group-item-heading">Inicio</h4>
          		</a>
          		<a href = "#" class = "list-group-item">
	              <h4 class = "list-group-item-heading">Administradores</h4>
          		</a>
              <a href = "#" class = "list-group-item">
              	<h4 class = "list-group-item-heading">Opción 2</h4>
             	</a>
             	<a href = "#" class = "list-group-item">
              	<h4 class = "list-group-item-heading">Opción 3</h4>
             	</a>
             	<a href = "#" class = "list-group-item">
              	<h4 class = "list-group-item-heading">Opción 4</h4>
             	</a>
             	<a href = "#" class = "list-group-item">
              	<h4 class = "list-group-item-heading">Cerrar Sesión</h4>
             	</a>
             </div>
					 	<!--
						<ul id="sidebar" class="nav nav-stacked ">
	            <li>Bienvenido: Administrador</li>
	            <li role="presentation" class="divider"></li>
	            <li><a href="#">Gestión de Administradores</a></li>
	            <li><a href="#">Opción 2</a></li>
	            <li><a href="#">Opción 3</a></li>
	            <li><a href="#">Opción 4	</a></li>
	            <li><a href="#">Cerrar Sesión</a></li>
	        	</ul>
	        	-->
					</div>
					<div class="col-md-10" id="container-administrador">
							<?php echo $this->Session->flash(); ?>
							<?php echo $this->fetch('content'); ?>
					</div>
			</div>
		</div>
		<!-- -------FIN CONTENIDO-------- -->	

	</div>
</div>
<div class="row">
	<div id="footer">
		<div id="footer-text">
				<p>
					<a href="#">Universidad Central de Venezuela</a>
					::
					<a href="#">Facultad de Humanidades</a>
					::
					<a href="#">Facultad de Ciencias</a>
					::
					<a href="#">Contáctenos </a>
					::
					<a href="#">Créditos</a>
				</p>
				<p>
					© 2014 Universidad Central de Venezuela. Derechos reservados. 
				</p>
		</div>
	</div>
</div>
<!-- -------FOOTER-------- -->	
<!--
<div class="row">
	<div id="footer">
		<div id="footer-text">
				<p>
					<a href="#">Universidad Central de Venezuela</a>
					::
					<a href="#">Facultad de Humanidades</a>
					::
					<a href="#">Facultad de Ciencias</a>
					::
					<a href="#">Contáctenos </a>
					::
					<a href="#">Créditos</a>
				</p>
				<p>
					© 2014 Universidad Central de Venezuela. Derechos reservados. 
				</p>
		</div>
	</div>
</div>
-->
	<!-- -------FIN FOOTER-------- -->	
</body>
</html>