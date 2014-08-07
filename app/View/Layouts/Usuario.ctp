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
		echo $this->Html->css('jplayer_blue/jplayer.blue.monday');
		echo $this->Html->css('../js/jplayer/circle.skin/circle.player.css');
		echo $this->Html->css('../js/datepicker/css/datepicker.css');
	?>
	<!-- Archivos Javascript-->
		<?
		echo $this->Html->script('jquery/jquery-1.10.2.min', array('inline' => false));

		echo $this->Html->script('prettyPhoto/jquery.prettyPhoto', array('inline' => false));
		
		echo $this->Html->script('bootstrap/bootstrap.min', array('inline' => false));

		echo $this->Html->script('jquery-validation/jquery.validate.min', array('inline' => false));

		echo $this->Html->script('jquery-validation/additional-methods.min', array('inline' => false));

		// echo $this->Html->script('datatables/js/jquery.dataTables.min', array('inline' => false));

		echo $this->Html->script('jplayer/js/jquery.jplayer.min', array('inline' => false));	
		echo $this->Html->script('jplayer/js/circle.player', array('inline' => false));	
		echo $this->Html->script('jplayer/js/jquery.grab', array('inline' => false));	
		echo $this->Html->script('jplayer/js/jquery.transform2d', array('inline' => false));	
		echo $this->Html->script('jplayer/js/mod.csstransforms.min', array('inline' => false));	
		echo $this->Html->script('datepicker/js/bootstrap-datepicker', array('inline' => false));	
		echo $this->Html->script('datepicker/js/locales/bootstrap-datepicker.es', array('inline' => false));	

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
		echo $this->Html->script('lazyloading/lazyloading',array('inline'=>false));
		echo $this->Html->script('AbyaYala/AudioUser/audio_user.js',array('inline'=>false));
		echo $this->Html->script('social/comment.js',array('inline'=>false));
		echo $this->Html->script('jqueryPrint/jqueryPrint.js',array('inline'=>false));
		
		//echo $this->Html->script('social/face.js',array('inline'=>false));
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
	<nav class="navbar navbar-inverse" role="navigation" style="margin-bottom: 0px; !important;">
  
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    	<?php echo $this->Html->link('AbyaYala', array(
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
  
	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <ul  id = "nav-usuarios" class="nav navbar-nav">

		 					<li id ="proyecto">
								<?php echo $this->Html->link('Proyecto AbyaYala', array(
											'controller'=>'users',
											'action' => 'abyayala'
											)
										);
								?>
							</li>

							<li id ="familias">
								<?php echo $this->Html->link('Familias Lingüísticas', array(
										'controller'=>'users',
										'action' => 'map'
										)
									);
								?>
							</li>

							<li id="rastros">
								<?php echo $this->Html->link('Rastros Indigenas', array(
										'controller'=>'users',
										'action' => 'traces'
										)
									);
								?>
							</li>

							<li class="dropdown" id="galeria">
		          				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Galeria <b class="caret"></b></a>
						          <ul class="dropdown-menu">
						          	<li>
							            <?php echo $this->Html->link('Imagenes', array(
															'controller'=>'users',
															'action' => 'images'
															)
														);
													?>
												</li>
						            <li>
						            	<?php echo $this->Html->link('Muestras de Audio', array(
															'controller'=>'users',
															'action' => 'audio'
															)
														);
													?>
						            </li>
						            <li>
						            	<?php echo $this->Html->link('Videos', array(
															'controller'=>'users',
															'action' => 'videos'
															)
														);
													?>
						            </li>
						          </ul>
		        			</li>

							<li id="trabajos">
								<?php echo $this->Html->link('Trabajos de Investigación', array(
												'controller'=>'users', 
												'action' => 'research'
												)
											);
										?>
							</li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li>
	      	<?php
						echo $this->Form->create('Buscador', array(
							'url' => array_merge(
									array(
										'controller' => 'users',
										'action' => 'search'
									),
									$this->params['pass']
								),
								'class' => 'navbar-form navbar-right',
								'role' => 'search'
							)
						);
						echo $this->Form->input('name', array(
								'div' => false,
								'label' => false,
								'class' => 'form-control',
								'type' => 'text',
								'placeholder' => 'Búsqueda',
								'name' => 'data[Search][name]'
							)
						);

						echo $this->Form->end();
					?>
	      </li>
	    </ul>
	  </div><!-- /.navbar-collapse -->
	</nav>

	<div class="row-fluid">
		<?php 
			echo $this->Html->link(
				$this->Html->image('header08.png', 
					array(
						'alt' => 'Banner AbyaYala',
						'height'=>'100%',
						'width' => '100%',
						'class' => 'img-responsive'
					)
				),
				array('action' => 'index', 'controller' => 'users'),
				array('escape' => false)
			);
		?>
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
					<a href="http://www.ucv.ve/"><img width="75px" height="75px" src="<?php echo $this->webroot;?>img/ucv_log.png"></a>
					<a href="http://www.ciens.ucv.ve/"><img width="75px" height="75px" src="<?php echo $this->webroot;?>img/ucv_ciencias_logo.png" width=110, height=110></a>
					<a href="http://www.ucv.ve/estructura/facultades/facultad-de-humanidades-y-educacion.html"><img width="75px" height="75px" src="<?php echo $this->webroot;?>img/ucv_hum_logo.png" width=110, height=110></a>
					<a href="http://www.ciens.ucv.ve/escueladecomputacion/inicio/index"><img width="75px" height="75px" src="<?php echo $this->webroot;?>img/esc_comp.png" width=110, height=110></a>
					<a href="http://www.ucv.ve/estructura/facultades/facultad-de-humanidades-y-educacion/escuelas/artes.html"><img width="75px" height="75px" src="<?php echo $this->webroot;?>img/esc_arte.png" width=110, height=110></a>
					<a href="http://www.ceneac.com.ve/"><img width="75px" height="75px" src="<?php echo $this->webroot;?>img/ceneac_logo.png" width=110, height=110></a>
					<img width="75px" height="75px" src="<?php echo $this->webroot;?>img/cediarte_logo.png" width=110, height=110>
				</div>
				
				
				<p class="copyright"><a href="/AbyaYala/messages/add"> [Contactos] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a> ©2014 Universidad Central de Venezuela <a href="/AbyaYala/users/team">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Créditos]</a></p>
				<p class="copyright">Ciudad Universitaria, Los Chaguaramos Caracas, Venezuela.</p>
				<p class="copyright">Código Postal: 1050 Rif: G-20000062-7</p>
				<p></p>
			
				<p>
					<a href="https://www.facebook.com/profile.php?id=100006582465476"><img src="<?php echo $this->webroot;?>img/facebook.png" width=40, height=40 style="margin-left:0px !important;"></a>
					<a href="https://twitter.com/Ucv_AbyaYala"><img src="<?php echo $this->webroot;?>img/twitter.png" width=40, height=40 style="margin-left:0px !important;"></a>
				<!--	<a href="/AbyaYala/messages/add"><img src="<?php echo $this->webroot;?>img/mail.png" width=40, height=40 style="margin-left:0px !important;"></a>-->
					<a href="https://www.youtube.com/channel/UCLH_bLD2ELRO_3EHph6_drQ"><img src="<?php echo $this->webroot;?>img/youtube_2.png" width=40, height=40 style="margin-left:0px !important;"></a>
						
						<p>contador de visitas</p>
						<script type="text/javascript" src="http://counter6.statcounterfree.com/private/countertab.js?c=73b79ae1c1866660c6637971fd93fba4"></script>
						
						<!-- Histats.com  START  (standard)-->
						<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
						<a href="http://www.histats.com" target="_blank" title="free contadores" ><script  type="text/javascript" >
						try {Histats.start(1,2745902,4,511,95,18,"00000000");
						Histats.track_hits();} catch(err){};
						</script></a>
						<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2745902&101" alt="free contadores" border="0"></a></noscript>
						<!-- Histats.com  END  -->
				
				</p>
			</div>
		</div>

	</footer>
	<script type="text/javascript"
		src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDdec7hQ_YxfvvwaejZYtQcrUZzDPE9Evo&sensor=true&libraries=drawing">
	</script>
	<script type="text/javascript" src="/AbyaYala/js/google/MarkerLabel.js"></script>	
</body>
</html>