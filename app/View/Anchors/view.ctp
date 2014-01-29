<div class="row content">
	<div style='margin-left:15px;'>
		<h1>Etnias Indigenas</h1>
		<h3>
			Ancla <?php echo h($anchor['Anchor']['name']); ?>
		</h3>
	</div>	
	<hr>
	<div class="col-md-12">
		<div id="anchor-description">
			<?php echo html_entity_decode(h($anchor['Anchor']['description'])); ?>
		</div>
	</div>	
</div>
<div class="row content">
	<div class="col-md-12">
		<div>
			<h3>Acciones:</h3>
			<ul>
				<li>
					<?php echo $this->Html->link('Regresar', array('controller'=>'ethnicities','action' => 'view', $ethnicityId)); ?>
				</li>
			</ul>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('#anchor-description img').each(function() {
			$(this).error(function(){
				$(this).attr('src', '/AbyaYala/img/no-disponible.jpeg');
			})
		});
		$('#anchor-description img').each(function() {
			$(this).attr('src', $(this).attr('src')+'?'+Math.random());
		});
	});
</script>