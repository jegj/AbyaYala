function cargarAudio(id, name, url)
{
	$('#jquery_jplayer_1').jPlayer('setMedia', {
			oga: url
	});
	$('.jp-title li').html(name);

	$('#jquery_jplayer_1').jPlayer('play');
}