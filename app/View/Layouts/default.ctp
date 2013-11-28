<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>

<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		/*Archivos CSS*/
		echo $this->Html->css('bootstrap/bootstrap.min');

		/*Archivos Javascript*/
		echo $this->Html->script('jquery/jquery-1.10.2.min', array('inline' => false));
		echo $this->Html->script('prettyPhoto/jquery.prettyPhoto', array('inline' => false));
		
		echo $this->Html->script('bootstrap/bootstrap.min', array('inline' => false));
		echo $this->Html->script('jquery-validation/jquery.validate.min', array('inline' => false));
		echo $this->Html->script('jquery-validation/additional-methods.min', array('inline' => false));
		echo $this->Html->script('ckeditor/ckeditor');
		echo $this->Html->script('AbyaYala/validaciones', array('inline' => false));

		

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
</body>
</html>
