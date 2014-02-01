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
		echo $this->Html->css('../js/upload/css/style');
		echo $this->Html->css('../js/datatables/css/jquery.dataTables');
		echo $this->Html->css('jplayer_blue/jplayer.blue.monday');
	?>
	<!-- Archivos Javascript-->
	<?
		echo $this->Html->script('jquery/jquery-1.10.2.min', array('inline' => false));

		echo $this->Html->script('prettyPhoto/jquery.prettyPhoto', array('inline' => false));
		
		echo $this->Html->script('bootstrap/bootstrap.min', array('inline' => false));

		echo $this->Html->script('jquery-validation/jquery.validate.min', array('inline' => false));

		echo $this->Html->script('jquery-validation/additional-methods.min', array('inline' => false));

		echo $this->Html->script('datatables/js/jquery.dataTables.min', array('inline' => false));

		echo $this->Html->script('jplayer/jquery.jplayer.min', array('inline' => false));	
		echo $this->Html->script('upload/js/jquery.knob', array('inline' => false));	
		echo $this->Html->script('upload/js/jquery.ui.widget', array('inline' => false));	
		echo $this->Html->script('upload/js/jquery.iframe-transport', array('inline' => false));	
		echo $this->Html->script('upload/js/jquery.fileupload', array('inline' => false));		
		echo $this->Html->script('upload/js/script', array('inline' => false));
		echo $this->Html->script('ckeditor/ckeditor',array('inline'=>false));
		echo $this->Html->script('underscore/underscore',array('inline'=>false));
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
		  			<img alt="AbyaYala" height="76" src="app/webroot/assets/imagenes/banner.png" width="250"> 
		  		</a>
				</div>
				<div class="col-md-1" style="padding-left:0px;">
					<img alt="Tehedor"  src="app/webroot/assets/imagenes/indio_7.jpg" width="100" height="115"> 
				</div>
			</div>
			<div class="container" id="contenido-administrador">
					<div class="col-md-2" id="sidebar">
						<div class="member-box round-all"> 
        			<a>
        				<img class="member-box-avatar" src="images/member_ph.png">
        			</a>
			        <span>
			            <strong>Administrador</strong><br>
			            <a>Javier Galarza</a><br>
			            <span class="member-box-links"><a>Opciones</a> | <a>Salir</a></span>
			        </span>
      			</div>
						<div class="sidebar-nav">
							<div style="padding: 8px 0;" class="well">
								 <ul class="nav nav-list"> 
								 	<li class="dropdown-header">Menú Administrador</li>
								 	<li>
								 		<?php
          						echo $this->Html->link(
							    			'Contenido',
									    array(
									        'controller' => 'contents',
									        'action' => 'index',
									    )	
										);
          						?>
								 	</li>
								 	<li>
								 		<?php
			          			echo $this->Html->link(
										    'Etnias',
										    array(
										        'controller' => 'ethnicities',
										        'action' => 'index',
										    )
											);
          					?>
								 	</li>	
								 	<li>
								 		<a href="#">Galeria</a>
								 	</li>
								 	<li>
								 		<a href="#">Noticias</a>
								 	</li>
								 </ul>
							</div>
						</div>
					</div>

					<div class="col-md-10" id="container-administrador">
						<?php 
							$success=$this->Session->flash('success'); 
							$error=$this->Session->flash('error');
							$warning=$this->Session->flash('warning');
						?>
						<?php if($success):?>
							<div class="alert alert-success alert-dismissable">
  								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  									<?php echo $success; ?>
							</div>
						<?endif;?>

						<?php if($error):?>
							<div class="alert alert-danger alert-dismissable">
  								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  									<?php echo $error; ?>
							</div>
						<?endif;?>

						<?php if($warning):?>
							<div class="alert alert-warning alert-dismissable">
  								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  									<?php echo $warning; ?>
							</div>
						<?endif;?>

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