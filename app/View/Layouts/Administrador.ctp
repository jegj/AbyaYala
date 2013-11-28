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
	<div id="wrapper">
		<div class="container">			
		  <div id="background-banner" class="col-md-12">
				<div id="logo" class="col-md-11">
		  		<a href="#">
		  			<img alt="AbyaYala" height="76" src="../app/webroot/assets/imagenes/banner.png" width="250"> 
		  		</a>
				</div>
				<div class="col-md-1" style="padding-left:0px;">
					<img alt="Tehedor"  src="../app/webroot/assets/imagenes/indio_7.jpg" width="100" height="115"> 
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
              	<h4 class = "list-group-item-heading">Opción 5</h4>
             	</a>
             	<a href = "#" class = "list-group-item">
              	<h4 class = "list-group-item-heading">Cerrar Sesión</h4>
             	</a>
             </div>
					</div>
					<div class="col-md-10" id="container-administrador">
							<?php echo $this->Session->flash(); ?>
							<?php echo $this->fetch('content'); ?>
					</div>
			</div>
		</div>

		<!-- -------FIN CONTENIDO-------- -->	
	</div>
<div class = "navbar navbar-default navbar-fixed-bottom">
		 <div id="footer">
	  	<div class = "container">  
					<div id="footer-text">
					<p>
						<a href="http://www.ciens.ucv.ve/ciens/">
							<img src="../app/webroot/assets/imagenes/logo_ucv_fc.png" alt="Ciencias" width="30" height="30">
						</a>
						::
						<a href="http://www.ucv.ve/">Universidad Central de Venezuela</a>
						::
						<a href="#">Contáctenos </a>
						::
						<a href="#">Créditos</a>
						::
						<a href="http://www.ucv.ve/estructura/facultades/facultad-de-humanidades-y-educacion.html">
							<img src="../app/webroot/assets/imagenes/logo_ucv_fhe.png" alt="Humanidades" width="30" height="30">
						</a>
					</p>
						
					<p>
						© 2014 Universidad Central de Venezuela. Derechos reservados. 
					</p>
				</div>
			</div>
	  </div>          
  </div>
</body>
</html>