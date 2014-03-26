<div class="row">
	<div class="container">
		<div class="col-md-12">			
            <h1>Lo ultimo en AbyaYala</h1>
            <hr>
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
				    <div class="holder col-sm-8">
				        <img class="img-responsive" src="<?php echo $news[0]['Content']['access_path']?>" alt="<?php echo $news[0]['Content']['name']?>"
                        width=800 height=400>
				    </div>
				    <div class="col-sm-4">
    				    <div class="carousel-caption">
    				        <h2>
                            <?php
                                echo $news[0]['News']['title']
                            ?>
                            </h2>
    				        <p align="justify">
                               <?php
                                $pre = explode('\n',$news[0]['News']['description']);
                                echo $pre[0];
                                ?>             
                            </p>
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




<style>
.markup {
    height: 200px; width: 100%; overflow: hidden; 
}

.carousel-caption {
  position: relative;
  left: 0%;
  right: 0%;
  bottom: 0px;
  z-index: 10;
  padding-top: 0px;
  padding-bottom: 0px;
  color: #000;
  text-shadow: none;
  & .btn {
    text-shadow: none; // No shadow for button elements in carousel-caption
  }
}

.carousel {
    position: relative;
}

.controllers {
    position: absolute;
    top: 0px;
}

.carousel-control.left, 
.carousel-control.right {
    background-image: none;
}

@import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
.col-item
{
    border: 1px solid #E1E1E1;
    border-radius: 5px;
    background: #FFF;
}
.photo{
    padding: 20px;
}

.col-item .photo img
{
    margin: 0 auto;
    width: 100%;
    height: 100%;
}

.col-item .info
{
    padding: 10px;
    border-radius: 0 0 5px 5px;
    margin-top: 1px;
}

.col-item:hover .info {
    background-color: #F5F5DC;
}
.col-item .price
{
    float: left;
    margin-top: 5px;
}

.col-item .price h5
{
    line-height: 20px;
    margin: 0;
}

.price-text-color
{
    color: #219FD1;
}

.col-item .info .rating
{
    color: #777;
}

.col-item .rating
{

    float: left;
    font-size: 17px;
    text-align: right;
    line-height: 52px;
    margin-bottom: 10px;
    height: 52px;
}

.col-item .separator
{
    border-top: 1px solid #E1E1E1;
}

.clear-left
{
    clear: left;
}

.col-item .separator p
{
    line-height: 20px;
    margin-bottom: 0;
    margin-top: 10px;
    text-align: center;
}

.col-item .separator p i
{
    margin-right: 5px;
}
.col-item .btn-add
{
    width: 50%;
    float: left;
}

.col-item .btn-add
{
    border-right: 1px solid #E1E1E1;
}

.col-item .btn-details
{
    width: 50%;
    float: left;
    padding-left: 10px;
}
.controls
{
    margin-top: 20px;
}
[data-slide="prev"]
{
    margin-right: 10px;
}

</style>