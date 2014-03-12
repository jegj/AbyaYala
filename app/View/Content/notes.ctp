<div class="row">
	<div style="margin-left:10px;">
		<h3>Seleccione la Etnia</h3>
		<?= 

			$this->Form->create('EthnicityNoteForm', array('role'=>'form'));
		?>
		<div class="form-group">
			<label for="data[EthnicityNoteForm][ethnicity]">		Etnia:
			</label>
			<?=
	 		$this->Form->input(
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
		<?=  
			$this->Form->end(); 
		?>
	</div>
	<hr>
	<div style="margin-left:10px;">
		<h3>Notas:</h3>
		<div id="notasResultados">
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
    }
	});
}

$(document).ready(function(){
	$('#ethnicityNotes').change(function () {
    var id = this.value;
    traerNotasEtnia(id);
	});
});

</script>