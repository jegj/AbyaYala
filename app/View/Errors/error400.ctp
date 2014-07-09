<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
| * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<?php $this->layout='Usuario';?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1 class="titulo">Oops!</h1>
                <h2 class="titulo">
                    404 Página no encontrada</h2>
                <div class="error-details">
                    Lo sentimos, ha ocurrido un error. La página solicitada no se encontró en AbyaYala.
                    <?php if (Configure::read('debug') > 0):
												echo $this->element('exception_stack_trace');
											endif;
										?>
                </div>
                <div class="error-actions">
                		<?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span> Llevame a Casa', array('action' => 'index', 'controller' =>'users'), array('class'=>'btn btn-primary btn-lg', 'escape' => false))?>

                		<?php echo $this->Html->link('<span class="glyphicon glyphicon-envelope"></span> Contacto', array('action' => 'add', 'controller' =>'messages'), array('class'=>'btn btn-default btn-lg', 'escape' => false))?>
                </div>

            </div>
        </div>
    </div>
</div>