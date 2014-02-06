<div class="col-md-2" style='margin-top:100px; padding-right: 0px;'>
	<div class="sidebar-nav">
		<div style="padding: 8px 0;" class="well">
			<ul class="nav nav-list"> 
			 	<li class="dropdown-header">Acciones</li>
			 	<li>
					<?php 
							echo $this->Html->link(
												    'Subir Contenido',
												    array(
												        'action' => 'uploadContent',
												    ));
					?>
				</li>
			</ul>
		</div>
	</div>
</div>
