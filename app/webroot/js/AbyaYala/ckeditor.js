


$(document).ready(function(){
	$('#link_imagenes').click(function() {
		cerrar_carpetas();
		$('#link_imagenes').find('span').removeClass("glyphicon glyphicon-folder-close").addClass("glyphicon glyphicon-folder-open");
		//traerImagenes();
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

	//$( "#link_imagenes" ).trigger( "click" );

});


function cerrar_carpetas()
{
	$('#link_imagenes').find('span').removeClass().addClass("glyphicon glyphicon-folder-close");
	$('#link_docs').find('span').removeClass().addClass("glyphicon glyphicon-folder-close");
	$('#link_video').find('span').removeClass().addClass("glyphicon glyphicon-folder-close");
	$('#link_audio').find('span').removeClass().addClass("glyphicon glyphicon-folder-close");
}


function cargaExitosa()
{
	$('.well').find('li').prop('disabled',true);
	var data="<div style='margin-top:30px;' class='alert alert-success alert-dismissable'><strong>Exito!</strong> Se cargó el contenido exitosamente.</div> <p><b>Cierre</b> esta ventana para continuar con su documento.";
	$('#ckeditor_contenidos').html(data);
}




