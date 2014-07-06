<div class="row">
	<div style="margin-left:10px;">
		<h3>Resultados Encontrados</h3>
	</div>
	<hr>
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
	   		<?foreach ($content as $cont):?>
		   		<tr>
		   			<td>
		   				<?echo $cont['Content']['name']?>
		   			</td>

		   			<td>
		   				<?php if($cont['Content']['type']=='imagen'):?>
		   						<span class="glyphicon glyphicon-picture"></span>
		   				<?php elseif ($cont['Content']['type']=='audio'):?>
		   						<span class="glyphicon glyphicon-music"></span>
		   				<?php else:?>	
		   					<span class="glyphicon glyphicon-book"></span>
		   				<?php endif;?>
		   				
		   			</td>
		   			<td>
		   				<a href="#" onclick="cargarContenidoLocal('<?php echo $cont['Content']['access_path']?>','<?php echo $cont['Content']['content_id']?>')">
   							<span class="glyphicon glyphicon-cloud-download"></span>
   						</a>
		   			</td>
		   		</tr>
		   	<?endforeach;?>
	   	</tbody>
   </table>
	</div>
</div>

<?php
    echo $this->Html->scriptBlock("
    	function cargarContenidoLocal(url, id)
    	{
      		window.opener.CKEDITOR.tools.callFunction($ckeditor, url+'?'+id, '');	
					cargaExitosa();
      		return false;
      }
    ");
?>