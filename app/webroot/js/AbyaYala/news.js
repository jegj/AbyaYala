
function getImages(page, size, firstTime){
	$.ajax({
    url: '/AbyaYala/news/images',
    type: 'POST',

    data:'data[News][page]='+page+'&&data[News][size]='+size,

    dataType: 'HTML',
    success: function (data) {
      $('#modalAddNew-body').html(data);

      if(firstTime)
        $('#modalAddNew').modal('show');
    }
	});
	return false;
}

function setImagePath(id)
{
  //$('#NewsPreviewImage').val(path);

  $('#NewsContentId').val(id);
  //$('select[name^="salesrep"] option[value="Bruce Jones"]').attr("selected","selected")
  $('#modalAddNew').modal('hide');
}