<div class="row">
	<div class='col-md-12'>
		<h2>Resultados Encontrados</h2>
		<?php if($content && count($content)):?>
			<div class="alert alert-info" role="alert">
				<p>
					<strong>Seleccione el contenido que desea cargar en el editor de texto clickeando <span class="glyphicon glyphicon-cloud-download"></span>. </strong>
				</p>
			</div>
			<div class="table-responsive" style="margin-top:20px;">
				<table class="table table-condensed	">
			   		<thead>
			   			<tr>
				   			<td><b>Nombre</b></td>
				   			<td><b>Tipo</b></td>
				   			<td><span class="glyphicon glyphicon-cloud-download"></span></td>
				   		</tr>
				   	</thead>
				   	<tbody>
				   		<?php foreach ($content as $cont):?>
					   		<tr>
					   			<td>
					   				<?echo $cont['Content']['name']?>
					   			</td>
			
					   			<td>
					   				<?php if($cont['Content']['type']=='imagen'):?>
					   						<span class="glyphicon glyphicon-picture" data-toggle="tooltip" data-placement="top" title="Imagen"></span>
					   				<?php elseif ($cont['Content']['type']=='audio'):?>
					   						<span class="glyphicon glyphicon-music" data-toggle="tooltip" data-placement="top" title="Pista de Audio"></span>
					   				<?php else:?>	
					   					<span class="glyphicon glyphicon-book" data-toggle="tooltip" data-placement="top" title="Documento"></span>
					   				<?php endif;?>
					   				
					   			</td>
					   			<td>
					   				<a href="#" onclick="cargarDocumentoLocal('<?php echo utf8_decode($cont['Content']['access_path'])?>','<?php echo $cont['Content']['content_id']?>');" >
			   							<span class="glyphicon glyphicon-cloud-download"></span>
			   						</a>
					   			</td>
					   		</tr>
					   	<?php endforeach;?>
				   	</tbody>
		   		</table>
			</div>
		<?php else:?>
			<div class="col-md-12">
      			<div class="alert alert-warning" role="alert">
          			<strong>No se encontraron resultado</strong>
      			</div>
			</div>
		<?php endif;?>
	</div>
</div>

<?php
    echo $this->Html->scriptBlock("
    	function cargarDocumentoLocal(url, id)
    	{
      		window.opener.CKEDITOR.tools.callFunction($ckeditor, url, '');	
					cargaExitosa();
      		return false;
      }
    ");
?>