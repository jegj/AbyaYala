


$(document).ready(function(){
	$('#link_imagenes').click(function() {
		cerrar_carpetas();
		$('#link_imagenes').find('span').removeClass("glyphicon glyphicon-folder-close").addClass("glyphicon glyphicon-folder-open");
	});

	$('#link_audio').click(function() {
		cerrar_carpetas();
		$('#link_audio').find('span').removeClass("glyphicon glyphicon-folder-close").addClass("glyphicon glyphicon-folder-open");
	});

	$('#link_video').click(function() {
		cerrar_carpetas();
		$('#link_video').find('span').removeClass("glyphicon glyphicon-folder-close").addClass("glyphicon glyphicon-folder-open");
	});

	$('#link_docs').click(function() {
		cerrar_carpetas();
		$('#link_docs').find('span').removeClass("glyphicon glyphicon-folder-close").addClass("glyphicon glyphicon-folder-open");
	});

	$('#link_notes').click(function() {
		cerrar_carpetas();
		$('#link_notes').find('span').removeClass("glyphicon glyphicon-folder-close").addClass("glyphicon glyphicon-folder-open");
	});

});


function cerrar_carpetas()
{
	$('#link_imagenes').find('span').removeClass().addClass("glyphicon glyphicon-folder-close");
	$('#link_docs').find('span').removeClass().addClass("glyphicon glyphicon-folder-close");
	$('#link_video').find('span').removeClass().addClass("glyphicon glyphicon-folder-close");
	$('#link_audio').find('span').removeClass().addClass("glyphicon glyphicon-folder-close");
	$('#link_notes').find('span').removeClass().addClass("glyphicon glyphicon-folder-close");
}


function cargaExitosa()
{
	$('.well').find('li').prop('disabled',true);
	var data=
		"<div style='margin-top:30px;' class='alert alert-success alert-dismissable'>"+
			"<h2><strong>Exito!</strong> Se cargó el contenido exitosamente en el editor de texto.</h2>"+
			"<hr>"+
			"<p></p>"+
			"<p></p>"+
			"<h2>Importante!</h2>"+
			"<p></p>"+
			"<div class='lib-panel'>"+
                "<div class='row box-shadow'>"+
                    "<div class='col-md-6'>"+
                        "<img   src=../app/webroot/assets/imagenes/carga_con_exito.PNG style='margin-left: auto ; margin-right: auto ;'>"+
                    "</div>"+
                    "<div class='col-md-6'>"+
                        "<div class='lib-row lib-header'>"+
                            "<strong>Mensaje:</strong>"+
                            "<div class='lib-header-seperator'></div>"+
                        "</div>"+
                        "<div class='lib-row lib-desc'>"+
                        	"<p align='justify'>"+
                            "Si el contenido fue cargado exitosamente en el editor, vera un conjunto de palabras en el campo URL como se muestra en la imagen de la izquierda. Este campo indica la dirección del contenido por lo cual"+
                            " se cargo correctamente en el editor."+
                            
                            "<p><strong>Nota: Cierre esta ventana para continuar...</strong></p>"+
                            "</p>"+
                        "</div>"+
                    "</div>"+
            	"</div>"+
            "</div>"+
		"</div> ";
	$('#ckeditor_contenidos').html(data);
}


