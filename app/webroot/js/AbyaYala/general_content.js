
function getMusic(id){
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




