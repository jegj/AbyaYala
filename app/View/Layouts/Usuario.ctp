<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>AbyaYala</title>
	<?php echo $this->Html->meta('icon');?>

	
	<link href='http://fonts.googleapis.com/css?family=Della+Respira' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Arapey' rel='stylesheet' type='text/css'>

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

		// echo $this->Html->script('datatables/js/jquery.dataTables.min', array('inline' => false));

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
		echo $this->Html->script('AbyaYala/main',array('inline'=>false));
		echo $this->Html->script('social/comment.js',array('inline'=>false));
		echo $this->Html->script('jqueryPrint/jqueryPrint.js',array('inline'=>false));
		
		echo $this->Html->script('social/face.js',array('inline'=>false));
		echo $this->Html->script('social/faceShare.js',array('inline'=>false));
		echo $this->Html->script('social/google.js',array('inline'=>false));
		echo $this->Html->script('social/googleShare.js',array('inline'=>false));
		echo $this->Html->script('social/social.js',array('inline'=>false));
	?>
		
	<?php
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="row">
		<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- <a class="navbar-brand" href="#" style="color:#D5AE37;">AbyaYala</a> -->
						<?=
								$this->Html->link('AbyaYala', array(
										'controller'=>'users',
										'action' => 'index'
										),
										array(
											'style' => 'color:#D5AE37',
											'class' => 'navbar-brand'
										)
									);
						?>
				</div>
				<div class="collapse navbar-collapse">
				  <ul id="navbar" class="nav navbar-nav">
						<li>
							<?=
								$this->Html->link('Inicio', array(
										'controller'=>'users',
										'action' => 'index'
										)
									);
							?>
						</li>

						<li>
							<?=
								$this->Html->link('Proyecto AbyaYala', array(
										'controller'=>'users',
										'action' => 'abyayala'
										)
									);
							?>
						</li>

					<li>
						<?=
							$this->Html->link('Familia Linguisticas', array(
								'controller'=>'users',
								'action' => 'map'
								)
							);
						?>
					</li>
					<li><a href="#contact">Rastros Indigenas</a></li>

					<!-- <li><a href="#contact">Galeria</a></li> -->

					<li class="dropdown">
          	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Galeria <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	          	<li>
		            <?=
									$this->Html->link('Imagenes', array(
										'controller'=>'users',
										'action' => 'images'
										)
									);
								?>
							</li>
	            <li><a href="#">Audio</a></li>
	            <li><a href="#">Video</a></li>
	          </ul>
        	</li>

					<li><a href="#contact">Investigación</a></li>
					<form role="search" class="navbar-form navbar-right">
				      <input class="form-control" type="text" placeholder="Búsqueda...">
				    </form>
				  </ul>
				</div><!-- /.nav-collapse -->
			</div><!-- /.container -->
		</div><!-- /.navbar -->
	</div>

	<div class="row" style="margin-top:30px;">
		<div class="container-fluid">
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
		</div>
	</div>

	<div class="row">
		<div class="container">
			<div  id="container-usuario">
			<?php 
				$success=$this->Session->flash('success'); 
				$error=$this->Session->flash('error');
				$warning=$this->Session->flash('warning');
			?>

			<div style="margin-top:30px;">
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
			</div>
			
			<?php echo $this->fetch('content'); ?>
			</div>
		</div>
	</div>


	<!--FOOTER-->
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
	<script type="text/javascript"
		src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDdec7hQ_YxfvvwaejZYtQcrUZzDPE9Evo&sensor=true&libraries=drawing">
	</script>
</body>
</html>