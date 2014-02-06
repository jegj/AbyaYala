<h1>Hola</h1>
<!--
<div class="row content">	
	<div class="col-md-12">
		<h1>Cargar Contenido</h1>
		<div class ="contenidoCargar" style="width:900px;">
			<table id="uploadImage" style="width:890px;">
		    <thead>
		        <tr>
		            <th>Nombre</th>
		            <th>Tipo</th>
		            <th>Tamaño(MB)</th>
		            <th>Extension</th>
		            <th>Usar</th>
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
			    					echo $myContent['Content']['type_document']==1?'Documento-Trabajo/Articulo':'Documento-Ley';
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
		    			<td>
		    				<a href='#' onclick="cargarImagen(<?php echo $ckeditor['funcnum']?>, '<?php echo $myContent['Content']['access_path']. '?'.$myContent['Content']['content_id']?>', 'Se cargo la imagen correctamente')">Cargar</a>
		    			</td>
		    		</tr>
		    	<?endforeach;?>
		    </tbody>
		</table>
		</div>
		<div class='imagenCargada'>
			<p><b>Se cargo el contenido correctamente</b>, si ve este mensaje cierre la ventana</p>
		</div>
	</div>
</div>

<div class="row content">	
	<div class="col-md-12">
		<div>
			<h3>Acciones:</h3>
			<ul>
				<li>
					<?php 
						echo $this->Html->link(
					    'Ver Notas',
					    array(
					    		'controller'=> 'notes',
					        'action' => 'index',
					    ));
					?>
				</li>
			</ul>
		</div>
	</div>
</div>

<script>
	function cargarImagen(ckeditor, url, message){
		window.opener.CKEDITOR.tools.callFunction(ckeditor, url, '');
		alert('Se cargo el contenido correctamente');
		$('.contenidoCargar').hide();
		$('.imagenCargada').show();
		return false;
	}

 	$(document).ready(function(){
 	 $('.imagenCargada').hide();
	 $('#uploadImage').dataTable({
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

-->