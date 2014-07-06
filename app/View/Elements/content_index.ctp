<?php
$this->Paginator->options(array(
  'update' => '#container-administrador',
  'evalScripts' => true,
  'before' => $this->Js->get('#spinner')->effect(
        'fadeIn',
        array('buffer' => false)
  ),
  'complete' => $this->Js->get('#spinner')->effect(
      'fadeOut',
      array('buffer' => false)
  ),
  
  'convertKeys'=>array('term')
));

?>

<div class="row content">	
	<div class="col-md-12">
			<h1>Módulo de Contenido</h1>
			
		

		<?php if(!$result):?>
			<h3>Contenido en AbyaYala:</h3>			
			<form action="/AbyaYala/contents/resultsIndex" role="search" class="navbar-form" method="get">
				<div class="input-group">
	        <input type="text" id="srch-term" name="term" placeholder="Buśqueda" class="form-control" required>
	        <div class="input-group-btn">
	          <button type="submit" class="btn btn-default">
	          	<span class="glyphicon glyphicon-search"></span>
	          </button>
	        </div>
				</div>
	    </form>
	  <?else:?>
	  	<h3>Resultados de la Búsqueda:</h3>
	  <?endif;?>

		<div class="table-responsive">
			<table id="contenat" class="table table-hover">
			    <thead>
			        <tr>
			            <th>
			            Nombre
			            <?php echo $this->Paginator->sort('name',$this->Html->image('ordenar.png'), array('escape'=>false));?>
			            </th>
			            
			            <th>
			            Tipo
			            	<?php echo $this->Paginator->sort('type',$this->Html->image('ordenar.png'), array('escape'=>false));?>
			            </th>

			            <th>
			            Tam(MB)
			            <?php echo $this->Paginator->sort('filesize',$this->Html->image('ordenar.png'), array('escape'=>false));?>
			            </th>


			            <th>
			            Fec.Reg
			            <?php echo $this->Paginator->sort('create_date',$this->Html->image('ordenar.png'), array('escape'=>false));?>
			            </th>

			            <th>
			            	Clasificación
			            </th>

			            <th>
			            Modificar Información
			            </th>

			            <th>Descargar</th>

			            <?if(!$this->Session->read('Admin')['Admin']['type']):?>
			            	<th>Eliminar</th>
			            <?endif;?>
			        </tr>
			    </thead>
			    <tbody>
			    	<?foreach ($content as $myContent):?>
			    		<tr>
			    			<td>
		    					<?php if($myContent['Content']['type']=='imagen'):?>
				    					<a href= '<?echo $myContent['Content']['access_path'].'?'.rand()?>'
				    					rel='prettyPhoto' title= '<?php echo $myContent['Content']['name']?>'
				    					>
				    						<?php echo $myContent['Content']['name']?>
				    					</a>
				    			<?php elseif($myContent['Content']['type']=='audio') :?>
										 <?php
										 	echo $this->Html->link(
										 		$myContent['Content']['name']
	                    ,
	                     array('action' => 'audio',$myContent['Content']['content_id']), array('onclick'=>'return getMusic('.$myContent['Content']['content_id'].');')
	                		);	    			
	                		?>
				    			<?php else:?>
				    				<?php
	                		echo $this->Html->link(
	                    $myContent['Content']['name'],
	                     array('action' => 'download',$myContent['Content']['content_id'])
	                		);
	            			?>
				    			<?php endif;?>
			    			
			    			</td>
			    			<td>
			    				<?
				    				echo $myContent['Content']['type'];
			    				?>
			    			</td>
			    			<td>
			    				<?echo $myContent['Content']['filesize']?>
			    			</td>		    	
			    			

			    			<td>
			    				<?echo MiscLib::dateFormat($myContent['Content']['create_date']);?>
			    			</td>

			    			<td>
			    				<?if($myContent['Content']['type']=='imagen' || $myContent['Content']['type']=='audio'):?>
			    					No-aplica
			    				<?else:?>
			    					<? if($myContent['Content']['type_document']):?>
			    						<?if($myContent['Content']['type_document']==1):?>
			    							Ley
			    						<?else:?>
			    							Trabajo/Articulo
			    						<?endif;?>
			    					<?else:?>
			    						<p style="color:red;">No Asignada</p>
			    					<?endif;?>
			    				<?endif;?>
			    			</td>
			    			
			    			<td>
			    				<?php
	                echo $this->Html->link(
	                    'Modificar',
	                    array('action' => 'edit', $myContent['Content']['content_id'])
	                );
	            		?>
			    			</td>
			    			
			    			<td>
			    				<?php
	                echo $this->Html->link(
	                    'Descargar',
	                     array('action' => 'download',$myContent['Content']['content_id'], true)
	                );
	            		?>
			    			</td>

			    			<?if(!$this->Session->read('Admin')['Admin']['type']):?>
				    			<td>
				    				<?php
		                echo $this->Form->postLink(
		                    'Eliminar',
		                    array('action' => 'delete', $myContent['Content']['content_id']),
		                    array('confirm' => '¿Esta usted seguro de eliminar el contenido '.$myContent['Content']['name'].'? Es posible que el contenido este siendo usado en algún Módulo de AbyaYala y su eliminación puede afectar la visualización de algunas secciones.')
		                );
		            		?>
				    			</td>
				    		<?php endif;?>
			    		</tr>
			    	<?endforeach;?>
			    </tbody>
			</table>
		</div>

		
	</div>
</div>

<div class="row content">
	<div class="col-md-12">
			<?php
				echo $this->Paginator->counter(array(
				'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count}')
				));
			?>
			<?php
				echo $this->Paginator->prev("<span class='glyphicon glyphicon-chevron-left'></span>", array('escape'=>false, 'tag'=>false), "<span class='glyphicon glyphicon-chevron-left'></span>", array('escape'=>false, 'tag'=>false));

				echo $this->Paginator->next("<span class='glyphicon glyphicon-chevron-right'></span>", array('escape'=>false, 'tag'=>false), "<span class='glyphicon glyphicon-chevron-right'></span>", array('escape'=>false, 'tag'=>false));
			?>			

			<div style="text-align:right;">
			<div id="spinner" style="display:none;">
					<?php
		        echo $this->Html->image(
		            'spinner.gif',
		            array('id' => 'spinner:img')
		        );
  				?>
			</div>
	
			<?php

				echo $this->Paginator->numbers();
			?>
			</div>
	</div>
</div>