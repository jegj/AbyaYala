<?php
	echo $this->element('message_index',
		array(
		'messages'=> $messages,
		'unreadMessages'=>$unreadMessages,
		'result' => true
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
					La búsqueda se realiza en base al asunto de los Mensajes.
				</p>
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
<? echo $this->Js->writeBuffer();?>