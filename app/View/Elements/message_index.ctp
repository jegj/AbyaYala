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
    <h1>Módulo de Mensajes</h1>
    <?php if(!$result):?>
      <h3>Mensajes de Contacto de AbyaYala:</h3>

      <a href="#">Mensajes No Leídos: <span class="badge"><?echo $unreadMessages?></span></a>


      <form action="/AbyaYala/messages/resultsIndex" role="search" class="navbar-form" method="get">
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
      <table class="table table-hover">
        <thead>
          <tr>
            <th>
              Asunto
              <?php echo $this->Paginator->sort('subject',$this->Html->image('ordenar.png'), array('escape'=>false));?>
             </th>

             <th>
              Remitente
              <?php echo $this->Paginator->sort('author',$this->Html->image('ordenar.png'), array('escape'=>false));?>
             </th>


             <th>
             Email
              <?php echo $this->Paginator->sort('email',$this->Html->image('ordenar.png'), array('escape'=>false));?>
             </th>

             <th>
             Fecha
              <?php echo $this->Paginator->sort('create_date',$this->Html->image('ordenar.png'), array('escape'=>false));?>
             </th>

             <th>
              Eliminar
             </th>
          </tr>
        </thead>
        <tbody>
          <?foreach ($messages as $myMessage):?>
            <tr>
              <td>
                <?
                  if($myMessage['Message']['read']){
                  echo $this->Html->link($myMessage['Message']['subject'], array('action' => 'view', $myMessage['Message']['messages_id'])); 
                }else{
                  echo $this->Html->link('<b>'.$myMessage['Message']['subject'].'</b>', array('action' => 'view', $myMessage['Message']['messages_id']), array('escape'=>false)); 
                }
                ?>
              </td>

              <td>
                <?
                  echo $myMessage['Message']['author'];
                ?>
              </td>

              <td>
                <?
                  echo $myMessage['Message']['email'];
                ?>
              </td>

              <td>
                <?
                echo MiscLib::dateFormat($myMessage['Message']['create_date']);
                ?>
              </td>

              <td>
                <?php
                echo $this->Form->postLink(
                    'Eliminar',
                    array('action' => 'delete', $myMessage['Message']['messages_id']),
                    array('confirm' => '¿Esta usted seguro que desea eliminar el Mensaje '.$myMessage['Message']['messages_id'].'?')
                );
                ?>
              </td>

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
      <?php
        echo $this->Paginator->numbers();
      ?>
      </div>
  </div>
</div>