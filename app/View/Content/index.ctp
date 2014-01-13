<h1>Módulo de Carga de Contenido</h1>
<div class="row content">	
	<div class="col-md-12">
		<div style="width:730px;">
		<table id="content" style="width:650px;">
		    <thead>
		        <tr>
		            <th>Nombre</th>
		            <th>Tipo</th>
		            <th>Tamaño(MB)</th>
		            <th>Extension</th>
		            <th>Descargar</th>
		            <th>Eliminar</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?foreach ($content as $myContent):?>
		    		<tr>
		    			<td>
	    					<?php if($myContent['Content']['type']=='imagen'):?>
			    					<a href= '<?echo $myContent['Content']['access_path']?>'
			    					rel='prettyPhoto' title= '<?php echo $myContent['Content']['name']?>'
			    					>
			    						<?php echo $myContent['Content']['name']?>
			    					</a>
			    			<?php elseif($myContent['Content']['type']=='audio') :?>
									 <?php
									 	echo $this->Html->link(
									 		$myContent['Content']['name']
                    ,
                     array('action' => 'audio',$myContent['Content']['content_id'])
                		);	    			
                		?>
			    			<?php else:?>
			    				<?php
                		echo $this->Html->link(
                    $myContent['Content']['name'],
                     array('action' => 'download',$myContent['Content']['content_id'])
                		);
            			?>
			    			<?php endif;?>
		    			
		    			</td>
		    			<td>
		    				<?
			    				if($myContent['Content']['type']=='documento'){
			    					echo $myContent['Content']['type'].'-'.$myContent['Content']['type_document'];
			    				}else{
			    					echo $myContent['Content']['type'];
			    				}
		    				?>
		    			</td>
		    			<td>
		    				<?echo $myContent['Content']['filesize']?>
		    			</td>		    	
		    			<td>
		    				<?echo $myContent['Content']['extesion_document']?>
		    			</td>
		    			<!--
		    			<td>
		    				<?php
                echo $this->Html->link(
                    'Modificar Media',
                    array('action' => 'edit', $myContent['Content']['content_id'])
                );
            		?>
		    			</td>
		    			-->
		    			<td>
		    				<?php
                echo $this->Html->link(
                    'Descargar',
                     array('action' => 'download',$myContent['Content']['content_id'], true)
                );
            		?>
		    			</td>
		    			<td>
		    				<?php
                echo $this->Form->postLink(
                    'Eliminar',
                    array('action' => 'delete', $myContent['Content']['content_id']),
                    array('confirm' => '¿Esta usted seguro de eliminar el contenido?')
                );
            		?>
		    			</td>
		    		</tr>
		    	<?endforeach;?>
		    </tbody>
		</table>
		</div>
	</div>
</div>
<p></p>
<?php 
		echo $this->Html->link(
							    'Subir Imagenes y Audio',
							    array(
							        'action' => 'uploadContent',
							    ));
?>
<p></p>
<?php 
		echo $this->Html->link(
							    'Subir Documentos PDF',
							    array(
							        'action' => 'uploadDocuments',
							    ));
?>

<script>
 	$(document).ready(function(){
	 $('#content').dataTable({
	 		'oLanguage': {
				'sLengthMenu': 'Mostrando _MENU_ registros por página',
				'sZeroRecords': 'No hay información',
				'sInfo': 'Mostrando _START_ - _END_ de _TOTAL_ registros',
				'sInfoEmpty': 'Mostrando 0 de 0 de 0 registros',
				'sInfoFiltered': '(filtrado de _MAX_ registros)',
				'sSearch': 'Búsqueda',
				'oPaginate': {
           'sNext': 'Siguiente',
           'sPrevious': 'Anterior'
         }
			}
	 	});
		$("a[rel^='prettyPhoto']").prettyPhoto({
				animation_speed:'normal',
				theme:'light_square',
				social_tools: false,
		});

		$("a[rel^='audio']").prettyPhoto({
			custom_markup: '<div id="map_canvas" style="width:260px; height:265px">aaaaa</div>'
		});
	});
</script>