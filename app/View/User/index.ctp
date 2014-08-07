<div class="row">
	<div class="container">
        <div class="jumbotron">
          <h1 class="titulo">Bienvenidos a AbyaYala</h1>
          <p class="title">
            “Abya Yala, cuyo significado es 'tierra en plena madurez', es un término empleado por los indios Cuna de Panamá, para nombrar lo que en otro registro se denominó Indias Occidentales primero y América después. El líder indígena Takir Mamani sugirió que todos los movimientos indígenas lo utilicen tanto en sus documentos como en sus declaraciones orales” - Walter Mignolo, 2001.
          </p>
        </div>

        <!-- SECCION NOTICIAS-->
        <h1 class="titulo">Ultimas Noticias</h1>
        <hr>
        <?php if($news && count($news)):?>
    		<div class="col-md-6">
    			
                <?php
                    echo $this->Html->link(
                        "<img id='principal' class='img-responsive' src='".utf8_decode($news[0]['Content']['access_path'])."' alt='".$news[0]['Content']['name']."' style='width:100%'>",
                        array('controller' => 'news', 
                            'action' => 'user_view',
                            $news[0]['News']['new_id']
                        ),array('escape' => false)   
                    );
                ?>

                <div >
                    <h4 class="subtitulo">
                        <b>
                        <?php
                            echo $this->Html->link(
                                $news[0]['News']['title'],
                                array('controller' => 'news', 
                                    'action' => 'user_view',
                                    $news[0]['News']['new_id']
                                )   
                            );
                        ?>
                        </b>
                    </h4>
                    <p align="justify">
                        <p class='title' align="justify">
                        <?php
                            echo  $news[0]['News']['previous_text'];
                        ?>
                        </p>
                        <p class="date" align="left">
                        <b>Autor:</b>
                        <?php
                            echo  $news[0]['News']['author'];
                        ?>
                        </p>
                        <p class="date" align="left">
                        <b>Fecha Publicación:</b>
                        <?php
                            echo  $news[0]['News']['current_date'];
                        ?>
                        </p>
                    </p>
                </div>
    	    </div>
            <div class="col-sm-6">
                <?php if(count($news) > 1):?>
                    <?php foreach ($news as $key => $new):?>
                        <?php if ($key==0)continue;?>
                        <?php if ($key==1):?>
                            <div class="row">
                        <?php else:?>
                            <div class="row" style="margin-top:20px;">
                        <?php endif;?>
                            <div class="col-md-4" style="overflow: hidden;">
                                <?php
                                    echo $this->Html->link(
                                        "<img class='img-responsive' src='".utf8_decode($new['Content']['access_path'])."' alt='".$new['Content']['name']."' height:130px;width:160px;'>",
                                        array('controller' => 'news', 
                                            'action' => 'user_view',
                                            $new['News']['new_id']
                                        ),array('escape' => false)   
                                    );
                                ?>
                            </div>
                            <div class="col-md-8">
                                <h5 style="margin-top:0px !important;" class="subtitulo">
                                    <p>
                                        <b>
                                            <?php
                                                echo $this->Html->link(
                                                    $new['News']['title'],
                                                    array('controller' => 'news', 
                                                        'action' => 'user_view',
                                                        $new['News']['new_id']
                                                    )   
                                                );
                                            ?>
                                        </b>
                                    </p>
                                </h5>
                                <p class='title' align="justify">
                                    <?php
                                        echo $new['News']['previous_text']
                                    ?>
                                </p>
                            </div>
                        </div>
                    <?endforeach;?>
                <?php else:?>
                    <div class="alert alert-warning" role="alert">
                        <strong>No existen más Noticias en AbyaYala</strong>
                    </div>
                <?php endif;?>
                </div>
            </div>
        <?php else:?>
            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">
                    <strong>Actualmente no existen Noticias en AbyaYala</strong>
                </div>
            </div>
        <?php endif;?>
<!-- SECCION VIDEOS-->

<div class="row">
    <div class="container">
        <div class="col-md-12">
            <h1 class="titulo">
                Ultimos Videos
            </h1>
        </div>  
        <hr>
        <div class="row">

            <?php if($videos['videos'] && count($videos['videos']) && $videos['exito']):?>
                <?php foreach ($videos['videos'] as $video):?>
                    <div class="col-md-3">
                        <div class="col-item">
                            <div class="photo">
                                <?php $url = "https://www.youtube.com/watch?v=".$video['id'];?>
                                <a href="<?php echo $url?>" class="watchvideo" target='_blank'>
                                    <img src="<?php echo $video['thumbail'];?>" alt="<?php echo $video['title'];?>"  class ="img-responsive"/>
                                </a>
                            </div>
                            <div class="info">
                                <h5>
                                    <b>
                                        <a href="<?php echo $url; ?>" target='_blank'> <?php echo $video['title'] ?></a>
                                    </b>
                                </h5>
                                <p>
                                    <?php 
                                    echo $this->Text->truncate($video['description'],
                                        300,
                                        array(
                                            'ellipsis' => "...<a href='$url' target='_blank'>ver mas</a>",
                                            'exact' => true
                                        )
                                    );
                                    ?>
                                </p>
                                <div class="clearfix">
                                </div>
                            </div>
                        </div>  
                    </div>
                <?php endforeach;?>
            <?php elseif(!$videos['exito']):?>
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        <strong>Ocurrió un error al obtener los videos de AbyaYala: </strong><?php echo $videos['msg'];?>
                    </div>
                </div>
            <?php else:?>
                <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                        <strong>Actualmente no existen videos en AbyaYala</strong>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>

<!-- SECCION DE IMAGENES-->
<div class="row">
    <div class="container">
        <div class="col-md-12">
            <h1 class="titulo">
                Ultimas Imagenes
            </h1>
        </div>  
        <hr>
        <div class="row">
            <?php if($images && count($images)):?>
                <?php foreach ($images as $image):?>
                    <div class="col-md-3">
                        <div class="col-item">
                            <div class="photo">
                                <a href= '<?echo utf8_decode($image['Content']['access_path']).'?'.rand()?>'
                                rel='prettyPhoto' title= '<?php echo $image['Content']['description']?>'
                                >
                                    <div class="markup">
                                        <img src='<?php echo utf8_decode($image['Content']['access_path']);?>' class="img-responsive" alt='<?php echo $image['Content']['name']?>'/>
                                    </div>
                                </a>
                            </div>
                            <div class="info">
                                <h5>
                                    <b>
                                    <?php
                                        echo $image['Content']['name']
                                    ?>
                                    </b>
                                </h5>
                                <div class="clearfix">
                                </div>
                            </div>
                        </div>                        
                    </div>
                <?php endforeach;?>
            <?php else:?>
                <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                        <strong>Actualmente no existen imagenes en AbyaYala</strong>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>

<!-- SECCIONES DE DOCUMENTOS-->
<div class="row">
    <div class="container">
        <div class="col-md-12">
            <h1 class="titulo">
                Ultimos Documentos
            </h1>
        </div>  
        <hr>
        <div class="row">
            <?php if($papers && count($papers)):?>
                <?php foreach ($papers as $image):?>
                    <div class="col-md-3">
                        <div class="col-item">
                            <div class="photo">
                                <a target='_blank' href= '<?echo $image['Content']['access_path'].'?'.rand()?>' title= '<?php echo $image['Content']['name']?>'>
                                  <?php 
                                  echo $this->Html->image("descargar_pdf.jpeg", array('fullBase' => true, 'class' => 'img-responsive'));
                                  ?>
                                </a>
                            </div>
                            <div class="info">
                                <h5>
                                    <b>
                                        <a target='_blank' href= '<?echo utf8_decode($image['Content']['access_path']).'?'.rand()?>' title= '<?php echo $image['Content']['name']?>'>
                                            <?php
                                                echo $image['Content']['name']
                                            ?>
                                        </a>
                                    </b>
                                </h5>
                                <p>
                                    <?php
                                        echo $image['Content']['description']
                                    ?>
                                </p>
                                <p>
                                    <b>Tipo:</b>
                                    <?php
                                        echo $image['Content']['type_document']==1?'Ley':'Trabajo de Investigación'
                                    ?>
                                </p>
                                <p>
                                    <?php if (!$image['Content']['only_read']):?>
                                        <?php
                                            echo $this->Html->link(
                                                'Descargar',
                                                 array(
                                                    'controller' => 'contents',
                                                    'action' => 'download',
                                                    $image['Content']['content_id'], true)
                                            );
                                        ?>
                                    <?php else:?>
                                        <b>No disponible para descarga</b>
                                    <?php endif;?>
                                    
                                </p>
                                <div class="clearfix"></div>
                            </div>
                        </div>                        
                    </div>
                <?php endforeach;?>
            <?php else:?>
                <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                        <strong>Actualmente no existen Documentos en AbyaYala</strong>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("a[rel^='prettyPhoto']").prettyPhoto({
                animation_speed:'normal',
                theme:'light_square',
                social_tools: false,
        });
        
    });
</script>
