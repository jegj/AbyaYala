<div class="row content">	
	<div class="col-md-8">
		<h1>Etnia <?echo $ethnicity['ethnicity']['Ethnicity']['name']?></h1>
		<hr>
		<?php foreach ($ethnicity['anchors'] as $anchor):?>
			<?php
				$name = str_replace(' ', '', $anchor['Anchor']['name']);
				$id = $name.'_'.$anchor['Anchor']['anchor_id']
			?>
			<div id = "<?php echo $id?>" >
				<div>
					<?php echo $anchor['Anchor']['description']?>
				</div>
			</div>
		<?endforeach;?>
	</div>

	<div class="col-md-4" style="margin-top:120px;" id="sidebar_preview">
		<div class="sidebar-nav">
			<div style="padding: 8px 0;" class="well">
				<ul class="nav nav-list"> 
					<li class="dropdown-header">Anclas de <?echo $ethnicity['ethnicity']['Ethnicity']['name']?></li>
					<?php foreach ($ethnicity['anchors'] as $anchor):?>
						<li>
							<?php
								$name = str_replace(' ', '', $anchor['Anchor']['name']);
								$id = $name.'_'.$anchor['Anchor']['anchor_id']
							?>
							<a href='#<?php echo $id ?>'>
								<?php
									echo $anchor['Anchor']['name']
								?>
							</a>
						</li>
					<?endforeach;?>
				</ul>
				<div class="scroll-to-top">
					<a href="#">Subir</a>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>
<div class="row content">
	<div class="col-md-12">
		<div>
			<h3>Acciones:</h3>
			<ul>
				<li>
					<?php echo $this->Html->link('Regresar', array('controller'=>'ethnicities','action' => 'index'))?>
				</li>
			</ul>
		</div>
	</div>
</div>


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

		$('.scroll-to-top').hide();

		$(window).scroll(function () {
			console.log('hola');
			if ($(this).scrollTop() > 200) {
				$('.scroll-to-top').fadeIn();
			} else {
				$('.scroll-to-top').fadeOut();
			}
		});

		$('.scroll-to-top').click(function () {
		$('html, body').animate({ scrollTop: 0 }, 800);
		return false;
		});
});

	
</script>
