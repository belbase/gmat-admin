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
};
console.log($(".opt").height);
