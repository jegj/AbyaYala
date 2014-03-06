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
));
?>
<div class="row content"> 
  <div class="col-md-12">
    <h1>Módulo de Etnias Indigenas</h1>
    <h3>Sinónimos Registrados para <?= $ethnicityName?>:</h3>
    <div class="table-responsive">
      <table id="ethnicity" class="table table-hover">
        <thead>
          <tr>
              <th>
              Sinónimo
              <?php echo $this->Paginator->sort('name',$this->Html->image('ordenar.png'), array('escape'=>false));?>
              </th>
              <th>Modificar</th>
              <th>Eliminar</th>
          </tr>
         </thead>
         <tbody>
          <?foreach ($ethnicity as $data):?>
            <tr>
            <td>
              <?= $data['Ethnicity']['name']?>
            </td>

            <td>
              <?= $this->Html->link('Modificar', array('action' => 'edit', $data['Ethnicity']['ethnicity_id'], 1));?>
            </td>

            <td>
              <?=
                $this->Form->postLink(
                    'Eliminar',
                    array('action' => 'delete', $data['Ethnicity']['ethnicity_id'],1),
                    array('confirm' => '¿Esta usted seguro que desea eliminar el sinónimo '.$data['Ethnicity']['name'].'?')
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

<div class="row content">
  <div class="col-md-12">
    <p></p>
    <p><b>Notas:</b></p> 
    <ul>
      <li>
        <p>
        Para cambiar la información del sinónimo entre en <i>Modificar</i>.</p>
      </li>
    </ul>
    <div class="acciones">
      <h3>Acciones:</h3>
      <ul>
        <li>
          <?php 
            echo $this->Html->link(
              'Agregar Sinónimo',
              array(
                'action' => 'add',
                1,
                $id,
                $ethnicityName
              )); 
          ?>     
        </li>
        <li>
          <?php 
            echo $this->Html->link(
              'Ir a Etnias Registradas',
              array(
              'action' => 'index',
            )); 
          ?>    
        </li>
      </ul>
    </div>
  </div>
</div>
<? echo $this->Js->writeBuffer();?>