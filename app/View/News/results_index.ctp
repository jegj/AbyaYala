<?php
	echo $this->element('news_index', array(
	    'content' => $news,
	    'result' => true
	));
?>
<div class="row content">
	<div class="col-md-12">
		<p></p>
		<p><b>Notas:</b></p> 
		<ul>
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
				<li>
					<?php 
						echo $this->Html->link(
							'Regresar',
							array(
							'action' => 'index',
						));	
					?>		
				</li>
			</ul>
		</div>
	</div>
</div>
<?php echo $this->Js->writeBuffer();?>