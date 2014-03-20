<div class="container">    
  <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
      <div class="panel-heading">
          <div class="panel-title">
          	Recuperar Contraseña
          </div>
      </div>   
      <div style="padding-top:30px" class="panel-body" >
        <?php
          echo $this->Form->create('Admin', 
            array(
              'role' => 'form', 
              'class' => 'form-horizontal'
            )
          );
        ?>
        <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon">
              <i class="glyphicon glyphicon-user"></i>
            </span>
            <?php
              echo $this->Form->input ('email',
                array ( 
                  'label'  =>  false, 
                  'placeholder' => 'Email',
                  'class' => 'form-control'
                ));
            ?>
        </div>

        <div style="margin-top:10px" class="form-group">
          <div class="col-sm-12 controls" style="text-align:center">
            <?php
              echo $this->Form->submit('Recuperar', 
                array('class'=>'btn btn-success'));
            ?>
          </div>
        </div>

          <div class="form-group">
            <div class="col-md-12 control">
              <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                <p text-align='justify'>
                Introduzca el Email registrado en AbyaYala para recuperar su cuenta. Si posee su contraseña <b>
                  <?php
                    echo $this->Html->link('Auntentiquese',
                      array(
                        'controller' => 'admins',
                        'action' => 'login'
                      )
                    );
                  ?>
                </b>.
                </p>
              </div>
            </div>
          </div>    

      </div>
    </div>
  </div>
</div>