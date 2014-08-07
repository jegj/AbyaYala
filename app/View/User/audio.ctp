<?php
$this->Paginator->options(array(
  'update' => '#container-usuario',
  'evalScripts' => true,
  'before' => $this->Js->get('#spinner')->effect(
        'fadeIn',
        array('buffer' => false)
  ),
  'complete' => $this->Js->get('#spinner')->effect(
      'fadeOut',
      array('buffer' => false)
  ),
  
  'convertKeys'=>array('term')
));
?>


<div class="container"> 
    <h1 class="titulo">Galeria de Muestras de Audio</h1>
    <hr>

    <div class="row">
      <?php if($content && count($content)):?>
        <div class="center">            
            <div id="jquery_jplayer_1" class="jp-jplayer"></div>
               <div id="jp_container_1" class="jp-audio" style="width:70%; margin: 0 auto;">
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
        <?php foreach ($content as $id => $audio):?>
          <div class="col-sm-12"> 
              <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
                  <div class="media">
                      <p>
                          <h3 class="media-heading">
                              <a target='_blank' href= '<?echo $audio['Content']['access_path'].'?'.rand()?>'>
                              <?php echo $audio['Content']['name']?>
                              </a>
                          </h3>
                          <p></p>
                          <div class="btn-group">
                              <a id="rep_player_<?php echo $id;?>" href="#" onclick="cargarAudio('<?php echo $id;?>','<?php echo $audio['Content']['name']?>','<?php echo $audio['Content']['access_path']?>')">
                                  <span class="glyphicon glyphicon-music"></span>
                              </a>
                          </div>
                      </p>
                      <div class="clearfix visible-sm"></div>
                      <div class="media-body fnt-smaller">
                          <p class="hidden-xs">
                              <?php echo $audio['Content']['description'];?>
                          </p>
                          <span class="fnt-smaller fnt-lighter fnt-arial">
                              <b>Fecha Publicación:</b> <?php echo $audio['Content']['create_date'];?>
                          </span>
                          <p>
                              <?php  
                                  echo $this->Html->link(
                                      "<span class='glyphicon glyphicon-download-alt' data-toggle='tooltip' data-placement='left' title='Descargar Pista de Audio' class='icono_descarga'></span>",
                                      array('action' => 'download', 'controller' =>'contents',$audio['Content']['content_id'], true),
                                      array('escape' => false)
                                  );
                              ?>
                          </p>
                          <p></p>
                      </div>
                      
                  </div>
              </div>
          </div>
      <?php endforeach;?>
    <?php else:?>

      <div class="col-md-12">
        <div class="alert alert-warning" role="alert">
            <strong>Actualmente no existen pistas de audio en AbyaYala</strong>
        </div>
      </div>
    <?php endif;?>
    </div>
</div>

<? echo $this->Js->writeBuffer();?>

<!-- <p></p>
<div id="disqus_thread"></div> -->

<script>
     $(document).ready(function(){
     	$('#nav-usuario li').removeClass("activetae");
        $('#galeria').addClass('activetae');
        
        $('#jquery_jplayer_1').jPlayer({
          /*ready: function () {
            $(this).jPlayer('setMedia', {
              oga:'".$audio."' 
            });
          },*/
          swfPath: '/AbyaYala/js/jplayer',
          supplied: 'oga',
          
        });
      });
</script>

<!- --------------Comentario Discusss------------- ---> 

<script type="text/javascript">
    /*
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * *
    var disqus_shortname = 'abyayala'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * *
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
*/
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

<!-- <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
 -->
<script type="text/javascript">
/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
var disqus_shortname = 'abyayala'; // required: replace example with your forum shortname

/* * * DON'T EDIT BELOW THIS LINE * * */
(function () {
    /*
    var s = document.createElement('script'); s.async = true;
    s.type = 'text/javascript';
    s.src = '//' + disqus_shortname + '.disqus.com/count.js';
    (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    */
}());
</script>