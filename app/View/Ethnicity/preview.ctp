<div class="row content">
	
	<div class="col-md-8">
		<h1>Etnia <?echo $ethnicity['Ethnicity']['name']?></h1>
		<hr>
		<?php if(count($ethnicity['Anchors'])>0):?>
			<?php foreach ($ethnicity['Anchors'] as $anchor):?>
				<?php
					$name = str_replace(' ', '', $anchor['name']);
					$id = $name.'_'.$anchor['anchor_id']
				?>

							
				<div id = "<?php echo $id?>" class="panel panel-default">
					<div class="panel-heading">
								<h3 class="panel-title">
									<?php echo $anchor['name']?>
								</h3>
					</div>
					<div class="panel-body">
						<?php echo $anchor['description']?>
					</div>
				</div>
			<?endforeach;?>
		<?php else:?>
			<div class="alert alert-warning" style="margin-top:40px;">
				<strong>Oops!</strong> No existen anclas para esta Etnia.
				<?php 
					  echo $this->Html->link(
							'Agregue Anclas',
							array(
							'controller'=>'anchors',
							'action' => 'add',
							$ethnicity['Ethnicity']['ethnicity_id'],$ethnicity['Ethnicity']['name']), array('class'=>'alert-link'));
				?>	
				para poder visualizar el contenido.
			</div>
		<?php endif;?>
	</div>

	<div class="col-md-4" style="margin-top:120px;" id="sidebar_preview">
		<div class="sidebar-nav">
			<div style="padding: 8px 0;" class="well">
				<ul class="nav nav-list"> 
					<li class="dropdown-header">Anclas de <?echo $ethnicity['Ethnicity']['name']?></li>
					<?php foreach ($ethnicity['Anchors'] as $anchor):?>
						<li>
							<?php
								$name = str_replace(' ', '', $anchor['name']);
								$id = $name.'_'.$anchor['anchor_id']
							?>
							<a href='#<?php echo $id ?>'>
								<?php
									echo $anchor['name']
								?>
							</a>
						</li>
					<?endforeach;?>
					<li >
						<a href="#preview_actions">Acciones</a>
					</li>
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
		<div id="preview_actions">
			<h3>Acciones:</h3>
			<ul>
				<li>
					<?php echo $this->Html->link('Ir a Etnias Registradas', array('controller'=>'ethnicities','action' => 'index'))?>
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

		/****** Para que no obtenga las img de cache****/
		$('.panel-body img').each(function() {
			$(this).error(function(){
				$(this).attr('src', '/AbyaYala/img/no-disponible.jpeg');
			})
		});

		$('.panel-body').each(function() {
			$(this).attr('src', $(this).attr('src')+'?'+Math.random());
		});

		/**** Para obtener los link que impliquen musica***/
		var links=$('a[href*=".ogg?"]').click(function(){
				var link=$(this).attr('href');
				var id=_.last(link.split('?'));
				getMusic(id);
				return false;;
			});	

		/*** Scroll de las anclas**/
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


		$('a[href*=#]:not([href=#])').click(function() {
				if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				  var target = $(this.hash);
				  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				  if (target.length) {
					$('html,body').animate({
					  scrollTop: target.offset().top
					}, 1000);
					return false;
				  }
				}
			});
});

	
</script>
