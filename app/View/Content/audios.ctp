<div class="row">
	<div class="col-md-12">
		<h2>Pistas de Audio Cargadas</h2>
		<div class="alert alert-info" role="alert">
			<p>
				<strong>Seleccione la pista que desea cargar en el editor de texto clickeando <span class="glyphicon glyphicon-cloud-download"></span>. 
				<p>Para reproducir la pista has click en  <span class="glyphicon glyphicon-music"></span></p> </strong>
			</p>
		</div>
	
		<div>
			<div id="jquery_jplayer_1" class="jp-jplayer" ></div>
		  		<div id="jp_container_1" class="jp-audio" style="width:50%; margin: 0 auto;">
		    		<div class="jp-type-single">
		      			<div class="jp-gui jp-interface">
					        <ul class="jp-controls">
					          <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
					          <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
					          <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
					          <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
					          <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
					          <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
					        </ul>
		        		<div class="jp-progress">
		          			<div class="jp-seek-bar">
		            			<div class="jp-play-bar"></div>
	          				</div>
		        		</div>
		        		<div class="jp-volume-bar">
		          			<div class="jp-volume-bar-value"></div>
		        		</div>
		        		<div class="jp-time-holder">
		          			<div class="jp-current-time"></div>
		          			<div class="jp-duration"></div>
			           		<ul class="jp-toggles">
			            		<li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
			            		<li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
			          		</ul>
		        		</div>
		      			</div>
					      <div class="jp-title">
					        <ul>
					          <li>
					          	Reproductor
					          </li>
					        </ul>
					      </div>
					      <div class="jp-no-solution">
					        <span>Requiere Actualizacion</span>
					        Para reproducir la pista actual necesita actualizar su plugin de <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash</a>.
					  </div>
		    	</div>
		  	</div>
		</div>
		<?php if($content && count($content)):?>
			<div class="table-responsive" style="margin-top:20px;">
		  		<table class="table table-condensed	">
		   			<thead>
				   		<tr>
						   	<td><b>Pista</b></td>
						   	<td>
						   		<span class="glyphicon glyphicon-music"></span>
						   	</td>
						   	<td>
						   		<span class="glyphicon glyphicon-cloud-download"></span>
						   	</td>
					   </tr>
		   			</thead>
		   			<tbody>
				   	<?foreach ($content as $audio):?>
				   		<tr>
				   			<td>
				   				<?echo $audio['Content']['name']?>
				   			</td>
				
				   			<td>
				   				<a id="rep_player" href="#" onclick="cargarAudio('<?echo $audio['Content']['name']?>','<?php echo utf8_decode($audio['Content']['access_path']);?>')" data-toggle="tooltip" data-placement="top" title="Reproducir Pista">
				   					<span class="glyphicon glyphicon-music"></span>
				   				</a>
				   			</td>
				
				   			<td>
				   				<a href="#" onclick="cargarAudioLocal('<?php echo utf8_decode($audio['Content']['access_path']);?>','<?php echo $audio['Content']['content_id']?>')" data-toggle="tooltip" data-placement="top" title="Cargar Pista en el Editor">
				   					<span class="glyphicon glyphicon-cloud-download"></span>
				   				</a>
				   			</td>
				   		</tr>
				   	<?endforeach;?>
	   				</tbody>
	  			</table>
			</div>
			<div class='row' style="margin-top:20px;">
				<div class="col-md-12">
					<?php
						echo $this->Paginator->counter(array(
						'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count}')
						));
					?>
					<?php
						echo $this->Paginator->prev("<span class='glyphicon glyphicon-chevron-left'></span>", array('escape'=>false, 'tag'=>false), "<span class='glyphicon glyphicon-chevron-left'></span>", array('escape'=>false, 'tag'=>false));
		
						echo('|');
						echo $this->Paginator->next("<span class='glyphicon glyphicon-chevron-right'></span>", array('escape'=>false, 'tag'=>false), "<span class='glyphicon glyphicon-chevron-right'></span>", array('escape'=>false, 'tag'=>false));
					?>
				</div>	
			</div>
		<?php else:?>
			<div class="row galeria" style="margin-top:20px;">
				<div class="col-md-12">
          			<div class="alert alert-warning" role="alert">
              			<strong>Actualmente no existen pistas de audio cargadas en AbyaYala</strong>
          			</div>
        		</div>
			</div>
		<?php endif;?>
	</div>
</div>

<?php
    echo $this->Html->scriptBlock("
    	function cargarAudioLocal(url, id)
    	{
      		window.opener.CKEDITOR.tools.callFunction($ckeditor, url+'?'+id, '');	
					cargaExitosa();
      		return false;
      }

      function cargarAudio(name, url)
      {

    		$('#jquery_jplayer_1').jPlayer('setMedia', {
    				oga: url
    			});
  			$('.jp-title li').html(name);

  			$('#jquery_jplayer_1').jPlayer('play');

      }

      $(document).ready(function(){
        $('#jquery_jplayer_1').jPlayer({
          swfPath: '/AbyaYala/js/jplayer',
          supplied: 'oga'
        });
      });
    ");
?>