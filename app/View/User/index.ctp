<div class="row">
	<div class="container">
        <div class="jumbotron">
          <h1 class="titulo">Bienvenidos a AbyaYala</h1>
          <p class="title">
            “Abya Yala, cuyo significado es 'tierra en plena madurez', es un término empleado por los indios Cuna de Panamá, para nombrar lo que en otro registro se denominó Indias Occidentales primero y América después. El líder indígena Takir Mamani sugirió que todos los movimientos indígenas lo utilicen tanto en sus documentos como en sus declaraciones orales” - Walter Mignolo, 2001.
          </p>
        </div>

        <h1 class="titulo">Ultimas Noticias</h1>
        <hr>
		<div class="col-md-6">			
            <?php
                echo $this->Html->link(
                    "<img class='img-responsive' src='".$news[0]['Content']['access_path']."' alt='".$news[0]['Content']['name']."' style='width:100%'>",
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
                                "<img class='img-responsive' src='".$new['Content']['access_path']."' alt='".$new['Content']['name']."' height:130px;width:160px;'>",
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
            </div>
    </div>


<?php
error_reporting(E_ALL);
$feedURL = 'http://gdata.youtube.com/feeds/api/users/farfanestella/uploads?max-results=4';
$sxml = simplexml_load_file($feedURL);
?>


<div class="row">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="titulo">
                        Ultimos Videos
                    </h1>
                </div>  
            </div>
            <hr>
            <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                            <?php foreach ($sxml->entry as $entry):?>
                                <?php  
                                    $media = $entry->children('media',true);
                                    $watch = (string)$media->group->player->attributes()->url;
                                    $thumbnail = (string)$media->group->thumbnail[0]->attributes()->url;
                                ?>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                         <a href="<?php echo $watch; ?>" class="watchvideo" target='_blank'>
                                            <img src="<?php echo $thumbnail;?>" alt="<?php echo $media->group->title; ?>" />
                                        </a>
                                        </div>
                                        <div class="info">
                                            <div class="row">
                                                <div class="price col-md-12">
                                                    <h5><b>
                                                        <a href="<?php echo $watch; ?>" target='_blank'> <?php echo $media->group->title; ?></a>
                                                        </b>
                                                    </h5>
                                                    <p>
                                                        <?php 
                                                        echo $this->Text->truncate($media->group->description,
                                                            300,
                                                            array(
                                                                'ellipsis' => "...<a href='$watch' target='_blank'>ver mas</a>",
                                                                'exact' => true
                                                            )
                                                        );
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                            </div>
                                        </div>
                                    </div>                        
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="titulo">
                        Ultimas Imagenes
                    </h1>
                </div>  
            </div>
            <hr>
            <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                            <?php foreach ($images as $image):?>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href= '<?echo $image['Content']['access_path'].'?'.rand()?>'
                                            rel='prettyPhoto' title= '<?php echo $image['Content']['description']?>'
                                            >
                                                <div class="markup">
                                                    <img src='<?php echo $image['Content']['access_path']?>' class="img-responsive" alt='<?php echo $image['Content']['name']?>'/>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="info">
                                            <div class="row">
                                                <div class="price col-md-12" style="padding-left:20px;">
                                                    <h5><b>
                                                        <?php
                                                            echo $image['Content']['name']
                                                        ?>
                                                        </b>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                            </div>
                                        </div>
                                    </div>                        
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="titulo">
                        Ultimos Documentos
                    </h1>
                </div>  
            </div>
            <hr>
            <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                            <?php foreach ($papers as $image):?>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a target='_blank' href= '<?echo $image['Content']['access_path'].'?'.rand()?>' title= '<?php echo $image['Content']['name']?>'>
                                              <?php 
                                              echo $this->Html->image("descargar_pdf.jpeg", array('fullBase' => true));
                                              ?>
                                            </a>
                                        </div>
                                        <div class="info">
                                            <div class="row">
                                                <div class="price col-md-12">
                                                    <h5>
                                                        <b>
                                                            <a target='_blank' href= '<?echo $image['Content']['access_path'].'?'.rand()?>' title= '<?php echo $image['Content']['name']?>'>
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
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                            </div>
                                        </div>
                                    </div>                        
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
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
