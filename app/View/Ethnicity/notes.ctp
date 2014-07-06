
	<div class="table-responsive" style="margin-top:20px;">
		<table class="table table-condensed	">
			<thead>
		   	<tr>
			   	<td><b>Nota</b></td>
			   	<td>
			   		<span class="glyphicon glyphicon-cloud-download"></span>
			   	</td>				   
			  </tr>
 			</thead>
 			<tbody>
 				<?foreach ($ethnicity['Notes'] as $note):?>
 					<tr>
		   			<td>
		   				<?php echo $note['name'];?>
		   			</td>
		   			<td>
		   				<a href="#" onclick="cargarNota('<?php echo $note['note_id']?>', '<?php echo $note['name']?>')">
   					<span class="glyphicon glyphicon-cloud-download"></span>
   						</a>
		   			</td>
		   		</tr>
 				<?endforeach;?>
 			</tbody>
		</table>
	</div>
	