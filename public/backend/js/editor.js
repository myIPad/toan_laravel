var editor=CKEDITOR.replace( 'content', {
        filebrowserBrowseUrl: '{{ asset('/public/backend/js/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('/public/backend/js/ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('/public/backend/js/ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('/public/backend/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('/public/backend/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('/public/backend/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
	