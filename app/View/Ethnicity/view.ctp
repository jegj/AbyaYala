<h1>
	<?php echo h($ethnicity['ethnicity']['Ethnicity']['name']); ?>
</h1>
<p>
	<?php echo h($ethnicity['ethnicity']['Ethnicity']['type']);?>
</p>

<hr>
<h3>Anclas</h3>
<ul>
<?foreach ($ethnicity['anchors'] as $anchors):?>
	<li>

		<?php 
		echo $this->Html->link($anchors['Anchor']['name'],
			array('controller'=>'anchors', 'action'=>'view', $anchors['Anchor']['anchor_id'],$ethnicity['ethnicity']['Ethnicity']['ethnicity_id'])
		);
		?>
	</li>
<?endforeach;?>
</ul>


<?php 
	  echo $this->Html->link(
							    'Agregar Ancla',
							    array(
							    	'controller'=>'anchors',
							      'action' => 'add',
										$ethnicity['ethnicity']['Ethnicity']['ethnicity_id'],$ethnicity['ethnicity']['Ethnicity']['name']));
?>
<p></p>
<?php	 
		echo $this->Html->link(
							    'Regresar',
							    array(
							        'action' => 'index',
							    ));
?>