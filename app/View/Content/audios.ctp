<div class="row">
	<div style="margin-left:10px;">
		<h3>Audio Cargado</h3>
	</div>
	<hr>

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
        <span>Update Required</span>
        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
      </div>
    </div>
  </div>
	</div>

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
   				<a id="rep_player" href="#" onclick="cargarAudio('<?echo $audio['Content']['name']?>','<?php echo $audio['Content']['access_path']?>')">
   					<span class="glyphicon glyphicon-music"></span>
   				</a>
   			</td>

   			<td>
   				<a href="#" onclick="cargarAudioLocal('<?php echo $audio['Content']['access_path']?>','<?php echo $audio['Content']['content_id']?>')">
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