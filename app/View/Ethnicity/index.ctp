
<?php
	echo $this->element('ethnicity_index',
		array(
		'ethnicity'=> $ethnicity,
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
					La búsqueda se realiza en base al nombre de las Etnias.
				</p>
			</li>
			<li>
				<p>
				Para cambiar la información de una etnia entre en <i>Modificar</i>.</p>
			</li>
			<li>
				<p>
					Puede administrar el contenido de la etnia haciendo click en el <i>Nombre</i> de la Etnia.
				</p>
			</li>
			<li>
				<p>
					Para visualizar la etnia con todo su contenido entre en <i>Vista Previa.</i>
				</p>
			</li>
			<li>
				<p>
					Para que los usuarios puedan visualizar el contenido de una Etnia, esta debe estar <b> Activa</b>.
				</p>
			</li>
			<li>
				<p>
					Para activar o desactivar una etnia presione el boton correspondiente al <b>estado</b>.
				</p>
			</li>
		</ul>
		<!-- <div class="acciones">
			<h3>Acciones:</h3>
			<ul>
				<li>
					<?php 
						echo $this->Html->link(
							'Agregar Etnia',
							array(
								'action' => 'add',
								0
							));	
					?>		
				</li>
			</ul>
		</div> -->
	</div>
</div>
<? echo $this->Js->writeBuffer();?>


<script>
function cambiarEstado(id, estado)
{
	$.ajax({
		url: '/AbyaYala/ethnicities/change_status',
		type: 'POST',
		dataType: 'json',
		data: {
			id: id,
			estado: estado
		}
	})
	.done(function(data) {
		console.log(data);
		if(data.exito){
			var clase = $('#estado_'+id).attr('class');
			var nuevo = estado==0?1:0
			if(clase == 'btn btn-danger btn-sm'){
				$('#estado_'+id).removeClass();
				$('#estado_'+id).addClass('btn btn-success btn-sm');
				$('#estado_'+id).text('Activa');
			}else{
				$('#estado_'+id).removeClass();
				$('#estado_'+id).addClass('btn btn-danger btn-sm');
				$('#estado_'+id).text('Inactiva');
			}
			$('#estado_'+id).attr("onclick","cambiarEstado('"+id+"','"+nuevo+"');");	
			alert(data.msg);
		}else{
			alert(data.msg);
		}
	})
	.fail(function() {
		alert('Hubo problemas para completar la operación.')
	})	
}

</script>