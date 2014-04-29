$(document).ready(function(){

	//Funcionalidad de NavBar
	$('.nav li a').on('click', function() {
    $(this).parent().parent().find('.active').removeClass('active');
    $(this).parent().addClass('active');
	});

	$('#printNewUserView').click(function(event) {
		$('#panel_news').printThis({
      debug: true,   
      importCSS: false,         
      printContainer: true,     
      // loadCSS: "path/to/my.css",
      pageTitle: "AbyaYala",     
      removeInline: false
	  });
	});


});