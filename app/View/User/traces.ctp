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
));?>
<div class="container"> 
    <h1 class="titulo">Rastros Indigenas</h1>
    <hr>
    <div class="container container-pad" id="property-listings">
        <div class="row">
            <?php if($content && count($content)):?>
                <?php foreach ($content as $new):?>
                    <div class="col-sm-12"> 
                        <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">

                            <div class="media">
                                <?php
                                echo $this->Html->link(
                                    "<img class='img-responsive' src='".$new['Content']['access_path']."' alt='".$new['Content']['name']."'>",
                                    array('controller' => 'news', 
                                        'action' => 'user_view',
                                        $new['News']['new_id']
                                    ),array(
                                        'escape' => false,
                                        'class' => 'pull-left'
                                    )   
                                );
                                ?>
                                <div class="clearfix visible-sm"></div>

                                <div class="media-body fnt-smaller">
                                    <a href="#" target="_parent"></a>
                                    <h4 class="media-heading">
                                        
                                        <?php
                                            echo $this->Html->link(
                                                $new['News']['title'],
                                                array('controller' => 'news', 
                                                    'action' => 'user_view',
                                                    $new['News']['new_id']
                                                )   
                                            );
                                        ?>
                                    </h4>

                                    <p class="hidden-xs">
                                        <?php echo $new['News']['previous_text'];?>
                                    </p>

                                    <span class="fnt-smaller fnt-lighter fnt-arial">
                                        <b>Fecha Publicación:</b> <?php echo $new['News']['current_date'];?>
                                    </span>
                                    <p></p>
                                    <span class="fnt-smaller fnt-lighter fnt-arial">
                                        <b> Autor:</b> <?php echo $new['News']['author'];?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php else:?>
                <div class="col-md-12">
                  <div class="alert alert-warning" role="alert">
                      <strong>Actualmente no existen noticias en AbyaYala</strong>
                  </div>
                </div>
            <?php endif;?>
        </div>

        <div class='row' style="margin-top:20px;">
            <div class="col-md-11">
                <?php

                    echo $this->Paginator->counter(array(
                    'format' => __('Página {:page} de {:pages}, mostrando {:current} imagenes.')
                    ));
                ?>
                <?php
                    echo $this->Paginator->prev("<span class='glyphicon glyphicon-chevron-left'></span>", array('escape'=>false, 'tag'=>false), "<span class='glyphicon glyphicon-chevron-left'></span>", array('escape'=>false, 'tag'=>false));

                    echo('|');
                    echo $this->Paginator->next("<span class='glyphicon glyphicon-chevron-right'></span>", array('escape'=>false, 'tag'=>false), "<span class='glyphicon glyphicon-chevron-right'></span>", array('escape'=>false, 'tag'=>false));
                ?>
            </div>  
            <div class="col-md-1">
                <?php
                        echo $this->Paginator->numbers();

                ?>
            </div>
        </div>
    </div>
</div>

<?php echo $this->Js->writeBuffer();?>