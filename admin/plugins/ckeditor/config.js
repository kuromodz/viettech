var baseUrl = $('base').attr('href');

CKEDITOR.editorConfig = function( config ) {
	config.language = 'vi';
	config.skin = 'kama';
	config.height = 300;
	config.toolbarCanCollapse = true;
	config.filebrowserUploadUrl = baseUrl + 'plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = baseUrl + 'plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
};