<?php if($ethnicity['Notes'] && count($ethnicity['Notes'])):?>
	<div class="alert alert-info" role="alert">
		<p>
			<strong>
				Seleccione la nota que desea cargar en el editor de texto clickeando <span class="glyphicon glyphicon-cloud-download"></span>.
			</strong>
		</p>
	</div>
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
		   				<a href="#" onclick="cargarNota('<?php echo $note['note_id']?>', '<?php echo $note['name']?>')" data-toggle="tooltip" data-placement="top" title="Cargar Nota en el Editor">
   					<span class="glyphicon glyphicon-cloud-download"></span>
   						</a>
		   			</td>
		   		</tr>
 				<?endforeach;?>
 			</tbody>
		</table>
	</div>
<?php else:?>
	<div class="row galeria" style="margin-top:20px;">
		<div class="col-md-12">
  			<div class="alert alert-warning" role="alert">
      			<strong>Actualmente no hay notas para esta Etnia</strong>
  			</div>
		</div>
	</div>
<?php endif;?>