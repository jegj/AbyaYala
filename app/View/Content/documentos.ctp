<div class="row">
	<div style="margin-left:10px;">
		<h3>Documentos Cargados</h3>
	</div>
	<hr>
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
   						<a href="<?echo $docs['Content']['access_path']?>" target=_blank>
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
   						<a href="#" onclick="cargarDocumentoLocal('<?php echo $docs['Content']['access_path']?>','<?php echo $docs['Content']['content_id']?>')">
   							<span class="glyphicon glyphicon-cloud-download"></span>
   						</a>
   					</td>
   				</tr>
   			<?endforeach;?>
   		</tbody>
  	</table>
  </div>
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