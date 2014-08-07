<?php if(isset($content)):?>
  <div>
    <p><b>Nombre: </b><?php echo $content['Content']['name']?></p>
    <p><b>Descripción: </b><?php echo $content['Content']['description']?></p>
  </div>

	<div id="jquery_jplayer_1" class="jp-jplayer" ></div>
  <div id="jp_container_1" class="jp-audio" style="width: 80%; margin: 0 auto;">
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
          	<?php echo $content['Content']['name'];?>
          </li>
        </ul>
      </div>
      <div class="jp-no-solution">
        <span>Requiere Actualizacion</span>
        Para reproducir la pista actual necesita actualizar su plugin de <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash</a>.
      </div>
    </div>
  </div>

<p></p>
<p></p>
<?php
    echo $this->Html->scriptBlock("
      $(document).ready(function(){
        $('#jquery_jplayer_1').jPlayer({
          ready: function () {
            $(this).jPlayer('setMedia', {
              oga:'".utf8_decode($content['Content']['access_path'])."' 
            });
          },
          swfPath: '/AbyaYala/js/jplayer',
          supplied: 'oga'
        });
      });
    ");?>
<?php endif;?>

<?php if(isset($error)):?>
  <div class="alert alert-danger">
    <strong>Oops!</strong> No se pudo acceder al contenido. Aseguerese que se cargo correctamente o no fue eliminado.
  </div>
<?php endif;?>