<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>AbyaYala</title>
	<?php echo $this->Html->meta('icon');?>

	<?
		echo $this->Html->css('bootstrap/bootstrap.min');
		echo $this->Html->css('abyayala/ckeditor');
		echo $this->Html->css('prettyPhoto/prettyPhoto');
		echo $this->Html->css('../js/upload/css/style');
		echo $this->Html->css('../js/datatables/css/jquery.dataTables');
		echo $this->Html->css('jplayer_blue/jplayer.blue.monday');
	?>
	<!-- Archivos Javascript-->
	<?
		echo $this->Html->script('jquery/jquery-1.10.2.min', array('inline' => false));
		echo $this->Html->script('bootstrap/bootstrap.min', array('inline' => false));
		echo $this->Html->script('jplayer/jquery.jplayer.min', array('inline' => false));	
		echo $this->Html->script('AbyaYala/ckeditor', array('inline' => false));	
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
	<div class="container" id="container_layout">
		<div class="row" id="row_layout">
			<div class=	"col-md-2" id="ckeditor_sidebar">
				<div class="sidebar-nav">
					<div style="padding: 8px 0;" class="well">
						<ul class="nav nav-list" id="ul-sidebar"> 
							<li class="dropdown-header" id="sidebar_titulo">	Contenido
							</li>
							<li>
								<?php
									echo $this->Html->link("<span class='glyphicon glyphicon-folder-close'></span> Imagenes", array('action' => 'imagenes', '?'=>array('ckeditor'=>$ckeditor)),
										array('escape' => false, 'id'=>'link_imagenes')
									);
								?>
							</li>
							<li>
								<?php
									echo $this->Html->link("<span class='glyphicon glyphicon-folder-close'></span> Audio", array('action' => 'audios', '?'=>array('ckeditor'=>$ckeditor)),
										array('escape' => false, 'id'=>'link_audio')
									);
								?>
							</li>
							<li>
								<?php
									echo $this->Html->link("<span class='glyphicon glyphicon-folder-close'></span> Documentos", array('action' => 'documentos', '?'=>array('ckeditor'=>$ckeditor)),
										array('escape' => false, 'id'=>'link_docs')
									);
								?>
							</li>
							<li>
								<form role="search" class="navbar-form">
          				<div class="input-group">
				            <input type="text" id="srch-term" name="srch-term" placeholder="Buśqueda" class="form-control">
				            <div class="input-group-btn">
				              <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
				            </div>
          				</div>
        				</form>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-10" role="main" id="ckeditor_contenidos">
				<?php echo $this->fetch('content'); ?>	
			</div>
		</div>
	</div>
</body>
</html>

