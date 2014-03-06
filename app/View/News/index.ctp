<?php
	echo $this->element('news_index',
		array(
		'news'=> $news,
		'result' => false
		)
	);
?>

<div class="row content">
	<div class="col-md-12">
		<p></p>
		<p><b>Notas:</b></p> 
		<ul>
			<li>
				<p>
					La búsqueda se realiza en base al nombre de las Noticias.
				</p>
			</li>
			<li>
				<p>
				Para cambiar la información de una Noticia entre en <i>Modificar</i>.</p>
			</li>
			<li>
				<p>
					Para visualizar la noticia con todo su contenido entre en <i>Nombre.</i>
				</p>
			</li>
		</ul>
		<div class="acciones">
			<h3>Acciones:</h3>
			<ul>
				<li>
					<?php 
						echo $this->Html->link(
							'Agregar Noticia',
							array(
							'action' => 'add',
						));	
					?>		
				</li>
			</ul>
		</div>
	</div>
</div>
<? echo $this->Js->writeBuffer();?>