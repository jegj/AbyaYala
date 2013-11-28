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
			<!-- ------- NAVBAR-------- -->
			<nav class="navbar navbar-default" role="navigation" id="navbar">
			  <div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			      <span class="sr-only">Toggle navigation</span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			    </button>
		  	</div>
		  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav">
				    <li class="active">
				    	<a href="#">Inicio</a>
				    </li>
				    <li>
				    	<a href="#">Proyecto AbyaYala</a>	
				    </li>
				    <li>
				    	<a href="#">Familia Lingüística</a>
				    </li>
				    <li>
				    	<a href="#">Rastros Indígenas</a>
				    </li>
				    <li>
				    	<a href="#">Galería</a>
				    </li>
				    <li class="dropdown">
			        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Investigación 
			        	<b class="caret"></b>
			        </a>
			        <ul class="dropdown-menu">
			          <li>
			          	<a href="#">Leyes Indígenas</a>
			          </li>
			          <li class="divider"></li>
			          <li>
			          	<a href="#">Trabajos y Artículos</a>
			          </li>
			        </ul>
			      </li>
				    
				    <li>
				    	<a href="#">Administrador</a>
				    </li>
			       <form class="navbar-form navbar-right" role="search">
				      <div class="form-group">
				        <input type="text" class="form-control" placeholder="Búsqueda">
				      </div>
				      <button type="submit" class="btn btn-default">Buscar</button>
				    </form>
				  </ul>
		  	</div>	
			</nav>
		</div>

		<!--CONTENIDO-->
		<div class="container">			
		  <div id="background-banner" class="col-md-12">
				<div id="logo" class="col-md-8">
		  		<a href="#">
		  			<img alt="AbyaYala" height="76" src="app/webroot/assets/imagenes/banner.png" width="250"> 
		  		</a>
				</div>
			</div>
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
</div>

		<!--FOOTER-->
	<div class = "navbar navbar-default navbar-fixed-bottom">
		 <div id="footer">
	  	<div class = "container">  
				<div id="footer-text">
					<p>
						<a href="http://www.ciens.ucv.ve/ciens/">
							<img src="app/webroot/assets/imagenes/logo_ucv_fc.png" alt="Ciencias" width="30" height="30">
						</a>
						::
						<a href="http://www.ucv.ve/">Universidad Central de Venezuela</a>
						::
						<a href="#">Contáctenos </a>
						::
						<a href="#">Créditos</a>
						::
						<a href="http://www.ucv.ve/estructura/facultades/facultad-de-humanidades-y-educacion.html">
							<img src="app/webroot/assets/imagenes/logo_ucv_fhe.png" alt="Humanidades" width="30" height="30">
						</a
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