
function getMusic(id)
{
	$.ajax({
    url: '/AbyaYala/contents/audio',
    type: 'POST',
    data:'data[Content][id]='+id,
    dataType: 'HTML',
    success: function (data) {
    	$('#myModalLabel').html('Reproductor de AbyaYala');
      $('#modal-body').html(data);
      $('#myModal').modal('show');
    }
	});
	return false;
}

function getImage(id)
{
  $.ajax({
    url: '/AbyaYala/contents/image',
    type: 'POST',
    data:'data[Content][id]='+id,
    dataType: 'HTML',
    success: function (data) {
      $('#myModalLabel').html('Visor de Imagenes de AbyaYala');
      $('#modal-body').html(data);
      $('#myModal').modal('show');
    }
  });
  return false;
}

function printNewsUserView(){
  $("#panel_news").printElement({printMode:'popup'});
}





