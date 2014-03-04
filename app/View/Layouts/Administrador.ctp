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
		echo $this->Html->script('AbyaYala/general_content',array('inline'=>false));
		echo $this->Html->script('AbyaYala/news',array('inline'=>false));
	?>
		
	<?php
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

		<div id="background-banner" class="col-md-12">
			<div id="logo" class="col-md-11">
	  		<a href="#">
	  			<img alt="AbyaYala" height="76" src="<?php echo $this->webroot;?>assets/imagenes/banner.png" width="250"> 
	  		</a>
			</div>
			<div class="col-md-1" style="padding-left:0px;">
				<img alt="Tehedor" class="img-responsive" src="<?php echo $this->webroot;?>assets/imagenes/indio_7.jpg" width="100" height="115">
			</div>
		</div>

		<div class="container">
			<div class="row" style="margin-top:50px;">
				<div class="col-md-2" id="sidebar">
					<div class="member-box round-all"> 
	    			<a>
	    				<img class="member-box-avatar" src="<?php echo $this->webroot;?>img/member.png">
	    			</a>
		        <span>
		            <strong>Administrador</strong><br>
		            <a>Javier Galarza</a><br>
		            <p></p>
		            <span class="member-box-links">
		            	<p>
		            		<a href="#">Opciones</a>
		            	</p>
		            	<p>
		            		<a href="#">Salir</a>
		            	</p>
		            </span>
		        </span>
      		</div>
      		<div class="sidebar-nav">
						<div style="padding: 8px 0;" class="well">
							<ul class="nav nav-list"> 
							 	<li class="dropdown-header">Menú Administrador</li>
							 	<li>
							 		<?php
	      						echo $this->Html->link(
						    			'Principal',
								    array(
								        'controller' => 'admins',
								        'action' => 'index',
								    )	
									);
	      						?>
							 	</li>
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
							 		<?php
		          			echo $this->Html->link(
									    'Noticias',
									    array(
									        'controller' => 'news',
									        'action' => 'index',
									    )
										);
	      					?>
							 	</li>
							 	<li>
							 		<?php
		          			echo $this->Html->link(
									    'Mensajes',
									    array(
									        'controller' => 'messages',
									        'action' => 'index',
									    )
										);
	      					?>
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
						<?php
			        echo $this->Html->image(
			            'spinner.gif',
			            array('id' => 'spinner')
			        );
    				?>
					</div>
      </div>
		</div>
		
	
	<!-- -------FIN CONTENIDO-------- -->	

	<footer class="bs-docs-footer" role="contentinfo">
			<div class="container-fluid">
				<div class="row" >
					
					<div id="logos">
						<img src="<?php echo $this->webroot;?>img/ceneac_logo.png" width=110, height=110>
						<img src="<?php echo $this->webroot;?>img/esc_comp.png" width=110, height=110>
						<img src="<?php echo $this->webroot;?>img/ucv_ciencias_logo.png" width=110, height=110>
						<img src="<?php echo $this->webroot;?>img/ucv_log.png">
						<img src="<?php echo $this->webroot;?>img/ucv_hum_logo.png" width=110, height=110>
						<img src="<?php echo $this->webroot;?>img/esc_arte.png" width=110, height=110>
						<img src="<?php echo $this->webroot;?>img/cediarte_logo.png" width=110, height=110>
					</div>
					
					
					<p class="copyright">©2014 Universidad Central de Venezuela</p>
					<p class="copyright">Ciudad Universitaria, Los Chaguaramos Caracas, Venezuela.</p>
					<p class="copyright">Código Postal: 1050 Rif: G-20000062-7</p>
					<p></p>
					<p></p>
					<p>
						<a href="#"><img src="<?php echo $this->webroot;?>img/facebook.png" width=40, height=40 style="margin-left:0px !important;"></a>
						<a href="#"><img src="<?php echo $this->webroot;?>img/twitter.png" width=40, height=40 style="margin-left:0px !important;"></a>
						<a href="/AbyaYala/messages/add"><img src="<?php echo $this->webroot;?>img/mail.png" width=40, height=40 style="margin-left:0px !important;"></a>
						<a href="#"><img src="<?php echo $this->webroot;?>img/youtube_2.png" width=40, height=40 style="margin-left:0px !important;"></a>
					</p>
				</div>
			</div>
		</footer>

</body>
</html>