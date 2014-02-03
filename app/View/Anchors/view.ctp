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
</div>a

<div class="modal fade" id="modal-anchor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Canción/h4>
      </div>
      <div class="modal-body" id="modal-body-anchor">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<script>
	function getMusic(id){
		
		$.ajax({
	    url: '/AbyaYala/contents/audio',
	    type: 'POST',
	    data:'data[Content][id]='+id,
	    dataType: 'HTML',
	    success: function (data) {
	    	console.log(data);
	    	
	    	$('#myModalLabel').html('Reproductor de AbyaYala');
	      $('#modal-body-anchor').html(data);
	      $('#modal-anchor').modal('show')
	      $('#modal-anchor').on('hidden.bs.modal', function (e) {
  			$("#jquery_jplayer_1").jPlayer("stop");
		})
	    }
		});
		return false;
	}

	$(document).ready(function(){
		$('#anchor-description img').each(function() {
			$(this).error(function(){
				$(this).attr('src', '/AbyaYala/img/no-disponible.jpeg');
			})
		});
		$('#anchor-description img').each(function() {
			$(this).attr('src', $(this).attr('src')+'?'+Math.random());
		});


		var links=$('a[href*=".ogg?"]').click(function(){
				var link=$(this).attr('href');
				var id=_.last(link.split('?'));
				getMusic(id);
				return false;;
			});	
	});
</script>