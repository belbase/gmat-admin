<div class="box box-info">
  <!-- /.box-header -->
  <div class="box-body pad">
    <input type="hidden" name="db" value="{{{ $db }}}"/>
    @isset($id)
      <input type="hidden" name="id" value="{{{ $id }}}">
    @endisset
    <textarea id="editor" class="col-md-12">
    @isset($content->content)
        {!! $content->content !!}
    @endisset
    </textarea>
  </div>
</div>
@section('js')
  <script src="{{ asset('/assets/vendor/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('/assets/js/question.js') }}" charset="utf-8"></script>
  {{-- the following block contain the codes for CK-Editor --}}
  <script type="text/javascript">
    $(document).ready(function(){
      // initialize the CKEditor
      var editor = CKEDITOR.replace('editor',{
        customConfig: '/assets/js/editor/config.js',
        extraPlugins: 'bootstrapTabs',
        contentsCss: [ 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' ],
        on: {
          instanceReady: loadBootstrap,
          mode: loadBootstrap
        },
      });

      // Add the necessary jQuery and Bootstrap JS source so that tabs are clickable.
      // If you're already using Bootstrap JS with your editor instances, then this is not necessary.
      function loadBootstrap(event) {
          if (event.name == 'mode' && event.editor.mode == 'source')
              return; // Skip loading jQuery and Bootstrap when switching to source mode.

          var jQueryScriptTag = document.createElement('script');
          var bootstrapScriptTag = document.createElement('script');

          jQueryScriptTag.src = 'https://code.jquery.com/jquery-1.11.3.min.js';
          bootstrapScriptTag.src = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js';

          var editorHead = event.editor.document.$.head;

          editorHead.appendChild(jQueryScriptTag);
          jQueryScriptTag.onload = function() {
            editorHead.appendChild(bootstrapScriptTag);
          };
      }
});
</script>

<script type="text/javascript">
$(document).ready(function(){
      addOptions();
      hideall();
      selectTypeOption();
      @if (isset($id))
      sendAJAXRequest(editor.getData(),'/question/update','/question/{{ strtolower($db) }}');
      @else
      sendAJAXRequest(editor.getData(),'/question/store','/question/{{ strtolower($db) }}');
      @endif
    });
  </script>
@stop
