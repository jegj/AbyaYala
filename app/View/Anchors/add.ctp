<div class="row content">
	<div style='margin-left:15px;'>
		<h1>Etnias Indigenas</h1>
		<h3>Agregar Ancla(<?echo $ethnicityName?>)</h3>
	</div>	
	<hr>
	<div class="col-md-12">
		<?php
		echo $this->Form->create('Anchor', array('class'=>'form-horizontal'));
		?>

		<div class="form-group">
			<label for="data[Anchor][name]" class="col-sm-1 control-label">Nombre:</label>
			<div class="col-sm-11">
					<?php echo $this->Form->input('name',array('label'=>false));?>
			</div>
		</div>

		<?php echo $this->Form->hidden('ethnicitiesId',array('value'=>$ethnicityId));?>

		<div class="form-group" style="margin-left:2px;">
			<?php
			echo $this->Form->input('description', array('label'=>'Descripción:'));
			?>
		</div>

		<div class="form-group">
			<div class="col-sm-10">
				<?php
				echo $this->Form->submit('Agregar Ancla', array('class'=>'btn btn-success'));
				?>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Agregar Nota</h4>
      </div>
      <div class="modal-body" id="modal-body">
     		<form role="form">
				  <div class="form-group">
				    <label for="noteName">Nota</label>
				    <input type="email" class="form-control" id="noteName" placeholder="Nombre de la Nota">
				  </div>
				  <div class="form-group">
				    <label for="noteDescription">Descripción</label>
				    <textarea  id ="noteDescription" class="form-control" rows="3"></textarea>
				  </div>
				</form>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-success" onclick="return crearNota()">Agregar Nota</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>



<div class="row content">
	<div class="col-md-12">
		<div>
			<h3>Acciones:</h3>
			<ul>
				<li>
					<a href="#" onclick="return desplegarFormulario()">Agregar Nota</a>
				</li>
				<li>
					<?php	 
					echo $this->Html->link(
				    'Regresar',
				    array(
				    		'controller' => 'ethnicities',
				        'action' => 'view',
				        $ethnicityId
				    ));
					?>
				</li>
			</ul>
		</div>
	</div>
</div>
<script>
	function desplegarFormulario()
	{
		$('#noteName').val('');
		$('#noteDescription').val('');
		$('#modal-form').modal('show');
		return false;		
	}

	function crearNota()
	{
		$.ajax({
			url: '/AbyaYala/notes/add',
			type: 'POST',
			data:'data[Note][name]='+$('#noteName').val()+'&& data[Note][description]='+$('#noteDescription').val(),
	    dataType: 'json',
		});

		return false;
	}


	$(document).ready(function(){

		CKEDITOR.replace( 'AnchorDescription', {
	    filebrowserBrowseUrl: '/AbyaYala/contents/browse',
	    filebrowserUploadUrl: '/AbyaYala/contents/upload',
	    width: "100%",
	    height: "250px"
		});

		//$('#modal-form').modal('show');
	});
</script>