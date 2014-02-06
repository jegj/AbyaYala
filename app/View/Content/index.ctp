<div class="row content">	
	<div class="col-md-12">
		<h1>Módulo de Carga de Contenido</h1>
		<h3>Contenido en AbyaYala:</h3>
		<div style="width:900px;">
		<table id="content" style="width:690px;">
		    <thead>
		        <tr>
		            <th>Nombre</th>
		            <th>Tipo</th>
		            <th>Tamaño(MB)</th>
		            <th>Extension</th>
		            <th>Clasificación</th>
		            <th>Modificar Información</th>
		            <th>Descargar</th>
		            <th>Eliminar</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?foreach ($content as $myContent):?>
		    		<tr>
		    			<td>
	    					<?php if($myContent['Content']['type']=='imagen'):?>
			    					<a href= '<?echo $myContent['Content']['access_path'].'?'.rand()?>'
			    					rel='prettyPhoto' title= '<?php echo $myContent['Content']['name']?>'
			    					>
			    						<?php echo $myContent['Content']['name']?>
			    					</a>
			    			<?php elseif($myContent['Content']['type']=='audio') :?>
									 <?php
									 	echo $this->Html->link(
									 		$myContent['Content']['name']
                    ,
                     array('action' => 'audio',$myContent['Content']['content_id']), array('onclick'=>'return getMusic('.$myContent['Content']['content_id'].');')
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
			    				echo $myContent['Content']['type'];
		    				?>
		    			</td>
		    			<td>
		    				<?echo $myContent['Content']['filesize']?>
		    			</td>		    	
		    			<td>
		    				<?echo $myContent['Content']['extesion_document']?>
		    			</td>
		    			<td>
		    				<?if($myContent['Content']['type']=='imagen' || $myContent['Content']['type']=='audio'):?>
		    					No-aplica
		    				<?else:?>
		    					<? if($myContent['Content']['type_document']):?>
		    						<?echo $myContent['Content']['type_document']==1?'Trabajo/Articulo':'Ley';?>
		    					<?else:?>
		    						No Asignada
		    					<?endif;?>
		    				<?endif;?>
		    			</td>
		    			
		    			<td>
		    				<?php
                echo $this->Html->link(
                    'Modificar Información',
                    array('action' => 'edit', $myContent['Content']['content_id'])
                );
            		?>
		    			</td>
		    			
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
                    array('confirm' => '¿Esta usted seguro de eliminar el contenido '.$myContent['Content']['name'].'?')
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

<div class="row content">
	<div class="col-md-12">
		<p></p>
		<p><b>Notas:</b></p> 
		<ul>
			<li>
				<p>
				Para agregar la información adicional al contenido entre en <i>Modificar Información</i>.</p>
			</li>
			<li>
				<p>
					Puede ver el contenido haciendo click en <i>Nombre</i>
				</p>
			</li>
		</ul>
		<div>
			<h3>Acciones:</h3>
			<ul>
				<li>
					<?php 
						echo $this->Html->link(
					    'Subir Contenido',
					    array(
					        'action' => 'uploadContent',
					    ));
					?>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Cancion</h4>
      </div>
      <div class="modal-body" id="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<!--
<div>
	<h3>Acciones:</h3>
	<ul>
		<li>
			<?php 
					echo $this->Html->link(
										    'Subir Contenido',
										    array(
										        'action' => 'uploadContent',
										    ));
			?>
		</li>
	</ul>
</div>
-->
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

		$('#myModal').on('hidden.bs.modal', function (e) {
  			$("#jquery_jplayer_1").jPlayer("stop");
		})
	});

	function getMusic(id){
		
		$.ajax({
	    url: '/AbyaYala/contents/audio',
	    type: 'POST',
	    data:'data[Content][id]='+id,
	    dataType: 'HTML',
	    success: function (data) {
	    	$('#myModalLabel').html('Reproductor de AbyaYala');
	      $('#modal-body').html(data);
	      $('#myModal').modal('show');
	    }
		});
		return false;
	}
</script>