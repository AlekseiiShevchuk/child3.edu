<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script>
    // Enable local "abbr" plugin from /myplugins/abbr/ folder.
    CKEDITOR.plugins.addExternal( 'lineutils', '/ckeditor/plugins/lineutils/', 'plugin.js' );
    CKEDITOR.plugins.addExternal( 'widgetselection', '/ckeditor/plugins/widgetselection/', 'plugin.js' );
    CKEDITOR.plugins.addExternal( 'widget', '/ckeditor/plugins/widget/', 'plugin.js' );
    CKEDITOR.plugins.addExternal( 'html5audio', '/ckeditor/plugins/html5audio/', 'plugin.js' );

    $('.editor').each(function () {
        CKEDITOR.replace($(this).attr('id'),{
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
            extraPlugins: 'widgetselection,lineutils,widget,html5audio'
        });
    });
</script>