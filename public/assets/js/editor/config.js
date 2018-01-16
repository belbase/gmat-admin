
// CKEDITOR.config.extraPlugins= 'simage';
// CKEDITOR.config.dataParser= func(data);
CKEDITOR.editorConfig = function( config ) {
    config.language = 'en';
    // config.uiColor = '#001F3F';
    // config.textColor = "#ffffff";
    config.disableObjectResizing = true;
    config.autoGrow_bottomSpace = 50;
    // config.autoGrow_maxHeight = 700;
    config.height = 360;
    config.removePlugins = 'resize';
    config.resize_enabled = false;

    // Add plugin
    config.extraPlugins = 'filebrowser';
    config.filebrowserBrowseUrl = '/browse/image';
    config.filebrowserUploadUrl = '/upload/image';

    // config.extraPlugins = 'uploadimage';
    // config.uploadUrl = '/upload/image';
};
