<div class="box box-info">
  <!-- /.box-header -->
  <div class="box-body pad">
    <textarea id="editor" class="col-md-12">
        @if(isset($content->passage))
          {!! $content->passage !!}
        @endif
    </textarea>
    {{-- <i class="loader-icon fa fa-spinner fa-pulse fa-3x fa-fw"></i> --}}
  </div>
</div>
<!-- /.box -->
@section('css')
  <link href="//cdn.quilljs.com/1.3.4/quill.snow.css" rel="stylesheet">
  <link href="//cdn.quilljs.com/1.3.4/quill.bubble.css" rel="stylesheet">

  <!-- Core build with no theme, formatting, non-essential modules -->
  <link href="//cdn.quilljs.com/1.3.4/quill.core.css" rel="stylesheet">
@stop
@section('js')
  <script src="https://rawgit.com/Biggo6/biggojs/master/biggo.js"></script>
  <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
  {{-- <script src="//cdn.quilljs.com/1.3.4/quill.js"></script> --}}
  <script type="text/javascript">
    $(document).ready(function(){
      // initialize the CKEditor
      CKEDITOR.replace('editor',{
        customConfig: '/assets/js/editor/config.js'
      });
    });
  </script>
@stop
