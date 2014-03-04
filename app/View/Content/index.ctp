<?php
	echo $this->element('content_index', array(
	    'content' => $content,
	    'result' => false
	));
?>

<div class="row content">
	<div class="col-md-12">
		<p></p>
		<p><b>Notas:</b></p> 
		<ul>
			<li>
				<p>
					La búsqueda se realiza en base al nombre del contenido.
				</p>
			</li>
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

<script>
 	$(document).ready(function(){

		$("a[rel^='prettyPhoto']").prettyPhoto({
				animation_speed:'normal',
				theme:'light_square',
				social_tools: false,
		});

		$('#myModal').on('hidden.bs.modal', function (e) {
  			$("#jquery_jplayer_1").jPlayer("stop");
		})
	});
</script>
<? echo $this->Js->writeBuffer();?>