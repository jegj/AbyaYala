<h1>Módulo de Carga de Contenido</h1>
<div class="row content">	
	<div class="col-md-12">
		<table id="content" style="width:500px;">
		    <thead>
		        <tr>
		            <th>Nombre</th>
		            <th>Tipo</th>
		            <th>Tamaño(MB)</th>
		            <th>Extension</th>
		            <th>Eliminar</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?foreach ($content as $myContent):?>
		    		<tr>
		    			<td>
		    			<?
		    			 echo 
		    			 			$this->Form->postLink(
                    explode('.',$myContent['Content']['name'])[0],
                    array('action' => 'download',$myContent['Content']['content_id'])
                );
							?>
		    			</td>
		    			<td>
		    				<?echo $myContent['Content']['type']?>
		    			</td>
		    			<td>
		    				<?echo $myContent['Content']['filesize']?>
		    			</td>		    	
		    			<td>
		    				<?echo $myContent['Content']['extesion_document']?>
		    			</td>
		    			<td>
		    				<?php
                echo $this->Form->postLink(
                    'Eliminar',
                    array('action' => 'delete', $myContent['Content']['content_id']),
                    array('confirm' => '¿Esta usted seguro?')
                );
            		?>
		    			</td>
		    		</tr>
		    	<?endforeach;?>
		    </tbody>
		</table>
	</div>
</div>

<?php 
		echo $this->Html->link(
							    'Subir Contenido',
							    array(
							        'action' => 'uploadContent',
							    ));
	?>
<script>
	 $('#content').dataTable({
	 		"oLanguage": {
				"sLengthMenu": "Display _MENU_ records per page",
				"sZeroRecords": "No hay información",
				"sInfo": "Mostrando _START_ - _END_ de _TOTAL_ registros",
				"sInfoEmpty": "Showing 0 to 0 of 0 records",
				"sInfoFiltered": "(filtered from _MAX_ total records)"
			}
	 });
</script>