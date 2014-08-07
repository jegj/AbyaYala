<div class="row content">
	<div style='margin-left:15px;'>
		<h1>Módulo de Respaldos</h1>
		<hr>
		<div class="row" style="margin-top:20px;">
			<div class="jumbotron">
				<div class="media">
				  <a class="pull-left" href="#">
				    <?php echo $this->Html->image('backup_app.jpeg', array('width' =>'100', 'height' => '100', 'class' => 'img-responsive'));?>
				  </a>
				  <div class="media-body">
				    <h4>Respaldo de Aplicación</h4>
				    <p class="media-heading">
				    Respalde la información de la aplicacion, así como todo el contenido subido a la aplicación como imagenes, pistas de audios, documentos y la información actual de la página. <a href="#"  onclick="return respaldoApp();" class="btn btn-primary btn-sm active">Generar Respaldo</a>
				    <?php //echo $this->Html->link('Generar Respaldo', array('controller' => 'admins', 'action' =>'respaldo_aplicacion'), array('class' =>'btn btn-primary btn-sm active'));?>
				    
				   </p>
				  </div>
				</div>
			</div>
		</div>

		<div class="row" style="margin-top:20px;">
			<div class="jumbotron">
				<div class="media">
				  <a class="pull-left" href="#">
				    <?php echo $this->Html->image('bakcup_db.jpeg',array('width' =>'100', 'height' => '100', 'class' => 'img-responsive'));?>
				  </a>
				  <div class="media-body">
				    <h4 class="media-heading">Respaldo de Base de Datos</h4>
				    loreLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	function respaldoApp(){
		$.ajax({
    onprogress: function(e) {
        if(e.lengthComputable) {
            var pct = (e.loaded / e.total) * 100;
            console.log(pct);
            /*$('#prog')
                .progressbar('option', 'value', pct)
                .children('.ui-progressbar-value')
                .html(pct.toPrecision(3) + '%')
                .css('display', 'block');*/
        } else {
            console.warn('Content Length not reported!');
        }
      },
		  url: '/AbyaYala/admins/respaldo_aplicacion',
			type: 'POST',
			dataType: 'json',
		  success: function(data){
		    console.log(data);
		  }
		});

		
		return false;
	}
</script>