<div class="row">
	<div class='col-md-12'>
		<h2>Notas Cargadas en AbyaYala</h2>
		<div class="alert alert-info" role="alert">
			<p>
				<strong>
					<p>Seleccione la etnnia para cargar sus respectivas notas.</p>
				</strong>
			</p>
		</div>
		<div>
			<?php 
				echo $this->Form->create('EthnicityNoteForm', array('role'=>'form'));
			?>
			<div class="form-group">
				<label for="data[EthnicityNoteForm][ethnicity]">		Etnia:
				</label>
				<?php
		 		echo $this->Form->input(
	    	'ethnicity',
	    	array('options' => $ethnicity,
	    		'label'=>false, 
	    		'class'=>'form-control',
	        'type' => 'select',
	        'empty' => '-- Seleccione una Etnia --',
	        'id' => 'ethnicityNotes'
	    	));
				?>	
			</div>		
			<?php
				echo $this->Form->end(); 
			?>
		</div>
		<div>
			<h3>Notas:</h3>
			<div>
				<div  id="spinner" style=" margin-left: auto ; margin-right: auto ;  width: 200px; display: block;">
					<img   src=../app/webroot/assets/imagenes/ajax-loader.gif>
				</div>
				<div id="notasResultados">
				</div>
			</div>
		</div>
	</div>
	
	
</div>

<?php
    echo $this->Html->scriptBlock("
    	function cargarNota(id, name)
    	{
    	name = name.replace(' ',''); 
    	url='#'+name+'_'+id;
      		window.opener.CKEDITOR.tools.callFunction($ckeditor, url, '');	
					cargaExitosa();
      		return false;
      }");
?>

<script>

function traerNotasEtnia(id)
{
	
	$.ajax({
	    url: '/AbyaYala/Ethnicities/notes',
	    type: 'POST',
	
	    data:'data[Ethnicity][id]='+id,
	
	    dataType: 'HTML',
	    success: function (data) {
	      $('#notasResultados').html(data);
	    },
	    beforeSend: function(){
     		$('#spinner').show();
     		$('#notasResultados').hide();
   		},
   		complete: function(){
     		$('#spinner').hide();
     		$('#notasResultados').show();
   		}
	});
}
	
$(document).ready(function(){
	
	$('#ethnicityNotes').change(function () {
    	var id = this.value;
    	traerNotasEtnia(id);
	});
	
	$('#spinner').hide();
});

</script>