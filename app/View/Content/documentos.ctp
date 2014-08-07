<div class="row">
	<div class='col-md-12'>
		<h2>Documentos Cargados</h2>
		<div class="alert alert-info" role="alert">
			<p>
				<strong>
					Seleccione el documento que desea cargar en el editor de texto clickeando <span class="glyphicon glyphicon-cloud-download"></span>.
					<p>Para visualizar el contenido del documento clikea el nombre</p>
				</strong>
			</p>
		</div>
		<?php if($content && count($content)):?>
			<div class="table-responsive" style="margin-top:20px;">
	  			<table class="table table-condensed	">
			  		<thead>
				   		<tr>
					   		<td><b>Documento</b></td>
					   		<td><b>Tipo</b></td>
						   	<td>
						   		<span class="glyphicon glyphicon-cloud-download"></span>
						   	</td>
					   </tr>
			   		</thead>
	   				<tbody>
			   			<?foreach ($content as $docs):?>
			   				<tr>
			   					<td>
			   						<a href="<?echo utf8_decode($docs['Content']['access_path'])?>" target=_blank>
			   							<?echo $docs['Content']['name']?>
			   						</a>
			   					</td>
			   					<td>
			   						<?if (isset($docs['Content']['type_document'])):?>
			                  <?if($docs['Content']['type_document']==1):?>
			                      Ley
			                  <?else:?>
			                      Trabajo/Articulo
			                  <?endif;?>
			                <?else:?>
			                  <p style="color:red;">No Asignada</p>
			                <?endif;?>
			   					</td>
			   					<td>
			   						<a href="#" onclick="cargarDocumentoLocal('<?php echo utf8_decode($docs['Content']['access_path']);?>','<?php echo $docs['Content']['content_id']?>')" data-toggle="tooltip" data-placement="top" title="Cargar Documento en el Editor">
			   							<span class="glyphicon glyphicon-cloud-download"></span>
			   						</a>
			   					</td>
			   				</tr>
			   			<?endforeach;?>
	   				</tbody>
	  			</table>
	  		</div>
	  		<div class='row' style="margin-top:20px;">
				<div class="col-md-12">
					<?php
		
						echo $this->Paginator->counter(array(
						'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count}')
						));
					?>
					<?php
						echo $this->Paginator->prev("<span class='glyphicon glyphicon-chevron-left'></span>", array('escape'=>false, 'tag'=>false), "<span class='glyphicon glyphicon-chevron-left'></span>", array('escape'=>false, 'tag'=>false));
		
						echo('|');
						echo $this->Paginator->next("<span class='glyphicon glyphicon-chevron-right'></span>", array('escape'=>false, 'tag'=>false), "<span class='glyphicon glyphicon-chevron-right'></span>", array('escape'=>false, 'tag'=>false));
					?>
				</div>	
			</div>
		<?php else:?>
			<div class="col-md-12">
      			<div class="alert alert-warning" role="alert">
          			<strong>Actualmente no existen documentos cargados en AbyaYala</strong>
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