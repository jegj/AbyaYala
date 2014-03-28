<div class="row">
	<div class="container">
		<div class="col-md-9">			
            <h1>Ultimas Noticias</h1>
            <hr>
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    			<div class="carousel-inner" style='width:100%'>
    				<div class="item active">
    				    <div class="holder col-sm-8">
    				        <img class="img-responsive" src="<?php echo $news[0]['Content']['access_path']?>" alt="<?php echo $news[0]['Content']['name']?>"
                            width=800 height=400>
                            <div class="carousel-caption">
                                <h4>
                                    <b>
                                    <?php
                                        echo $news[0]['News']['title']
                                    ?>
                                    </b>
                                </h4>
                                <p align="justify">
                                    <p class='title' align="justify">
                                    <?php
                                    echo  $news[0]['News']['previous_text']
                                    ?>
                                    </p>
                                    <p class="date" align="left">
                                    <?php
                                    echo  $news[0]['News']['current_date']
                                    ?>
                                    </p>
                                </p>
                            </div>
    				    </div>
    				    <div class="col-sm-4">

                            <div class="row">
                               <img class="img-responsive" src="<?php echo $news[1]['Content']['access_path']?>" alt="<?php echo $news[1]['Content']['name']?>" width=150 height=170>
                            </div>

                            <div class="row" style="margin-top:25px;">
                                <img class="img-responsive" src="<?php echo $news[1]['Content']['access_path']?>" alt="<?php echo $news[1]['Content']['name']?>" width=150 height=170>
                            </div>

                            <div class="row" style="margin-top:25px;">
                                <img class="img-responsive" src="<?php echo $news[1]['Content']['access_path']?>" alt="<?php echo $news[1]['Content']['name']?>" width=150 height=170>
                            </div>

                            <div class="row" style="margin-top:25px;">
                                <img class="img-responsive" src="<?php echo $news[1]['Content']['access_path']?>" alt="<?php echo $news[1]['Content']['name']?>" width=150 height=170>
                            </div>
        				    
    				    </div>
    				</div>
    			</div>
		    </div>
	    </div>
        <div class="col-md-6">
            
        </div>
    </div>

<div class="row">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-9">
                    <h3>
                        Ultimas Imagenes
                    </h3>
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
                    <h3>
                        Ultimos Videos
                    </h3>
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
                    <h3>
                        Ultimos Documentos
                    </h3>
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
