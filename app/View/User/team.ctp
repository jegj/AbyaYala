<div class="container">
	<div class="row" >				
		<div class="col-md-2" id="sidebar" style="margin-top:20px;">

		<div class="sidebar-nav">						
			<?= $this->element('sidebar_contact')?>			
		</div>
			
		</div>
		<div class="col-md-10">
			<h1 class="titulo">Equipo de AbyaYala</h1>
			<hr>
			<div class="main-address-container" class="container">
				<div class="row">
					<div class="col-md-12">
						<p align='justify'>
						Centro de Estudios de los Pueblos Indígenas de Abya-Yala está conformado por un grupo de profesores y estudiantes vinculados a la Escuela de Artes, comprometidos con la recuperación de la armonía perdida entre los seres humanos y la naturaleza, que buscan contribuir con la unidad, el fortalecimiento y el respeto a los pueblos indígenas y sus organizaciones representativas para que la sociedad en general tenga una mejor comprensión sobre su realidad, sus necesidades y sus aspiraciones.
						</p>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<h3 class="titulo">Equipo:</h3>
						<ul>
							<li>
								<h4 class="titulo">Ronny Velásquez</h4>
								<p align="justify">Profesor de la Universidad Central de Venezuela.</p>
							</li>

							<li>
								<h4 class="titulo">Mariantonia Palacios</h4>
								<p align="justify">Profesora titular de la Universidad Central de Venezuela. Coordinadora del Centro Digital de Artes (CEDIARTE).</p>
							</li>

							<li>
								<h4 class="titulo">Yuruhary Gallardo</h4>
								<p align="justify">Investigadora en el Centro de Estudios de los Pueblos Indígenas de Abya Yala.</p>
							</li>

							<li>
								<h4 class="titulo">Suribeth Monsalve</h4>
								<p align="justify">Investigadora en el Centro de Estudios de los Pueblos Indígenas de Abya Yala.Licenciada en Artes, mención Cine, de la Universidad Central de Venezuela.
								surimonsalve@gmail.com</p>
							</li>

							<li>
								<h4 class="titulo">Marlin Rueda</h4>
								<p align="justify">Investigadora en el Centro de Estudios de los Pueblos Indígenas de Abya Yala.Tesista en la Escuela de Artes, mención Cine, y en la Escuela de Educación de la Universidad Central de Venezuela.
								marlin.rueda@gmail.com</p>
							</li>
						</ul>
					</div>
				</div>

				<div class="row">
					<h3 class="titulo">Nosotros...</h3>
					<div class="row galeria">
						<div class="col-md-3 col-sm-3 col-xs-6 ">
							<a href='/AbyaYala/img/equipo1.jpg'rel='prettyPhoto' title= '-->descripcion<--'>
								<img class="img-responsive gallery" src='/AbyaYala/img/equipo1.jpg'   alt ='Equipo AbyaYala'/>
							</a>
						</div>

						<div class="col-md-3 col-sm-3 col-xs-6 ">
							<a href='/AbyaYala/img/Prof. Ronny Vel squez.jpg'rel='prettyPhoto' title= '-->descripcion<--'>
								<img class="img-responsive gallery" src='/AbyaYala/img/Prof. Ronny Vel squez.jpg'   alt ='Prof. Ronny Velásquez'/>
							</a>
						</div>

						<div class="col-md-3 col-sm-3 col-xs-6 ">
							<a href='/AbyaYala/img/Suribeth y Yurhuary 2.jpg'rel='prettyPhoto' title= '-->descripcion<--'>
								<img class="img-responsive gallery" src='/AbyaYala/img/Suribeth y Yurhuary 2.jpg'   alt ='Prof.Suribeth y Yurhuary'/>
							</a>
						</div>

						<div class="col-md-3 col-sm-3 col-xs-6 ">
							<a href='/AbyaYala/img/equipo2.jpg'rel='prettyPhoto' title= '-->descripcion<--'>
								<img class="img-responsive gallery" src='/AbyaYala/img/equipo2.jpg'   alt ='Equipo AbyaYala'/>
							</a>
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
