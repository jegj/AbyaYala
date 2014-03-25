<ul class="nav nav-list"> 
	<li>
		<?php
			echo $this->Html->link(
				'<span class="glyphicon glyphicon-book"></span> AbyaYala',
				array('action' => 'abyayala',
					'controller' => 'users'
				),
				array('escape'=>false)	
			);
		?>
	</li>
	
	<li>
		<?php
			echo $this->Html->link(
				'<span class="glyphicon glyphicon-map-marker"></span> Dirección',
				array('action' => 'address',
					'controller' => 'users'
				),
				array('escape'=>false)	
			);
		?>
	</li>
	
	<li>
		<?php
			echo $this->Html->link(
				'<span class="glyphicon glyphicon-user"></span> Equipo',
				array('action' => 'team',
					'controller' => 'users'
				),
				array('escape'=>false)	
			);
		?>
	</li>
	
	<li>
		<?php
			echo $this->Html->link(
				'<span class="glyphicon glyphicon-envelope"></span> Contacto',
				array('action' => 'add',
					'controller' => 'messages'
				),
				array('escape'=>false)	
			);
		?>
	</li>

</ul>