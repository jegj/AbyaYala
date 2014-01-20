$(function(){
    
    
    var ul = $('#files ul');

    $('#drop a').click(function(){
        $(this).parent().find('input').click();
    });

    // Initialize the jQuery File Upload plugin
    $('#upload').fileupload({

        dropZone: $('#drop'),

        add: function (e, data) {

            if( $('#upload_files li').size()==5){
                alert('Se limpio la lista del contenido subido');
                $('#upload_files').empty();
            }

            var tpl = $('<li class="working"><p></p><a href=#>cancelar</a></li>');

            
            if(validateFile(data)){

                tpl.find('p').text(data.files[0].name)
                             .append(' <i>' + formatFileSize(data.files[0].size) + '</i> '+'<img src=../app/webroot/assets/imagenes/spinner.gif width=22 height=22>');

                tpl.find('a').click(function(){

                    if(tpl.hasClass('working')){
                        jqXHR.abort();
                    }

                    tpl.fadeOut(function(){
                        tpl.remove();
                    });
                    return false;
                });
                data.context = tpl.appendTo(ul);

                var jqXHR = data.submit();
            }
        },

        progress: function(e, data){
            var progress = parseInt(data.loaded / data.total * 100, 10);
            data.context.find('input').val(progress).change();

            if(progress == 100){
                data.context.removeClass('working');
            }
        },

        fail:function(e, data){
            data.context.addClass('error');
        },

        done: function (e, data) {


            var estado=data.result.status;

            if(estado=='success'){
                $('#upload_files li:last-child img').attr('src','../app/webroot/assets/imagenes/test-pass-icon.png')
            }else if(estado=='repeat'){ 
                $('#upload_files li:last-child img').attr('src','../app/webroot/assets/imagenes/test-warning-icon.png')
            }else{
                $('#upload_files li:last-child img').attr('src','../app/webroot/assets/imagenes/test-fail-icon.png')
            }

            $('#upload_files li:last-child').find('a').remove();
        }

    });


    // Prevent the default action when a file is dropped on the window
    $(document).on('drop dragover', function (e) {
        e.preventDefault();
    });

    // Helper function that formats the file sizes
    function formatFileSize(bytes) {
        if (typeof bytes !== 'number') {
            return '';
        }

        if (bytes >= 1000000000) {
            return (bytes / 1000000000).toFixed(2) + ' GB';
        }

        if (bytes >= 1000000) {
            return (bytes / 1000000).toFixed(2) + ' MB';
        }

        return (bytes / 1000).toFixed(2) + ' KB';
    }

    function validateFile(data){
        var size = data.files[0].size;
        var name = data.files[0].name;
        size= (size / 1000000).toFixed(2)
        if(size<=10){
            var arrayExtension=name.split('.');
            if(arrayExtension.length-1==1){
                var extension=arrayExtension.pop();

                
                var allowExtensions=['ogg', 'png', 'gif', 'jpg', 'pdf'];
                
                if(allowExtensions.indexOf(extension)>=0){
                    return true;    
                }else{
                    alert('La extension del archivo  no esta permitida');
                    return false;
                }
            }else{
                alert('Cambie el nombre del archivo, ya que posee muchos caracteres especiales');
                return false;    
            }

        }else{
            alert('El archivo es muy grande');
            return false;
        }
    }

});