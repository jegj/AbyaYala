<?php if ( isset($totalRecords) && isset($content) && isset($page) && isset($size)):?>

	<div class="panel-body">
		<ul class="media-list">
			<?php foreach($content as $image):?>
				<li class="media">
					<a class="pull-left" href="#">
					  <img class="media-object" src='<?php echo $image['Content']['access_path'] ?>' width="80" height="80" alt="...">
					</a>
					<div class="media-body">
					  <h4 class="media-heading">
					  	<?php echo $image['Content']['name']?></h4>
					  <p><?php echo $image['Content']['description']?></p>
					  <p>
					  	<button type="button" class="btn btn-primary btn-xs" onclick="setImagePath('<?php echo $image['Content']['content_id']?>')">Cargar</button>
					  </p>
					</div>
				</li>
			<?endforeach;?>
		</ul>
		<div style=" margin-left: auto;margin-right: auto; display: block; text-align:center;">
			<ul class="pagination">

				<?php if($page==1):?>
					<li class="disabled"><a href="#">&laquo;</a></li>
				<?else:?>
			  	<li>
			  		<?php
							echo $this->Html->link('&laquo;',
	              	array('action' => '#'), 
	              	array('onclick'=>'return getImages('.($page-1).','.$size.','.'false);',
	              		'escape'=>false
	              		)
	                );	  			
	          ?>
			  	</li>
			  <?endif;?>

			  <?php
			  	$division=(int)($totalRecords/$size);
			  	$rest = ($totalRecords%$size==0)?0:1;
			  	$pages=  $division+$rest;

			  	for ($i = 1; $i <= $pages; $i++) {
			  ?>

			  	<?php if($i == $page):?>
			  		<li class="active">
			  			<a href="#"><?php echo $i?></a>
			  		</li>
			  	<?else:?>
			  		<li>
			  			<?php
								echo $this->Html->link($i,
	              	array('action' => '#'), 
	              	array('onclick'=>'return getImages('.$i.','.$size.','.'false);')
	                		);	    			
	             ?>
			  		</li>
			  	<?endif;?>

			  <?php
					}
			  ?>

			  <?php if($page==$pages):?>
					<li class="disabled"><a href="#">&raquo;</a></li>
				<?else:?>
			  	<li>
			  		<?php
								echo $this->Html->link('&raquo;',
	              	array('action' => '#'), 
	              	array('onclick'=>'return getImages('.($page+1).','.$size.','.'false);',
	              		'escape'=>false
	              		)
	                );	    			
	          ?>
			  	</li>
			  <?endif;?>

			</ul>
		</div>
	</div>
<?php endif;?>

<?php if (isset($error)):?>
	<div class="alert alert-warning">
		<strong>Oops!</strong> No se encontró ninguna imagen.
	</div>
<?php endif;?>

<script>
	$(document).ready(function(){
		$('.pagination .disabled a, .pagination .active a').on('click', function(e) {
	    e.preventDefault();
		});
	});
</script>