/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    config.width = '500';
    //config.filebrowserBrowseUrl = '/AbyaYala/js/ckeditor/filemanager/index.html';
    config.filebrowserImageBrowseUrl = '/AbyaYala/contents/browse'
   //config.filebrowserFlashBrowseUrl = '/AbyaYala/js/ckeditor/filemanager/index.html?type=Flash';
   // config.filebrowserUploadUrl = '/AbyaYala/js/ckeditor/filemanager/connectors/php/filemanager.php';
    config.filebrowserImageUploadUrl = '/AbyaYala/contents/upload'
    //config.filebrowserFlashUploadUrl = '/AbyaYala/js/ckeditor/filemanager/connectors/php/filemanager.php?command=QuickUpload&type;=Flash';
   config.extraPlugins = 'youtube';
};
