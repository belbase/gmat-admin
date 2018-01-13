<div class="box box-info">
  <!-- /.box-header -->
  <div class="box-body pad">
    <input type="hidden" name="db" value="{{{ $db }}}"/>
    @if (isset($id))
      <input type="hidden" name="id" value="{{{ $id }}}">
    @endif
    <textarea id="editor" class="col-md-12">
        @if(isset($content->passage))
          {!! $content->passage !!}
        @endif
    </textarea>
    {{-- <i class="loader-icon fa fa-spinner fa-pulse fa-3x fa-fw"></i> --}}
  </div>
</div>
<!-- /.box -->
@section('js')
  <script src="https://rawgit.com/Biggo6/biggojs/master/biggo.js"></script>
  <script src="{{ asset('/assets/vendor/ckeditor/ckeditor.js') }}"></script>
  {{-- <script src="//cdn.quilljs.com/1.3.4/quill.js"></script> --}}
  <script src="{{ asset('/assets/js/question.js') }}" charset="utf-8"></script>
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
        // dataParser: imguploader(data)
      });
      editor.config.imageUploadURL= '{{ url('/upload_image') }}';
      editor.config.dataParser= function(data){
        console.log(data);
      }
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
      editor.on( 'fileUploadRequest', function( evt ) {
        var image= this.filname;
        var token = {{  csrf_token()}};

        var isFileUpload = false;
        var data;
        isFileUpload = true;
        var data = new FormData();
        data.append( 'image', image);
        data.append('_token',token);

        var biggo = Biggo.talkToServer('upload/image', data, isFileUpload, 'post', 'text');
        biggo.then(function(res){
        if(res.error){
              btalert('danger','Image Not Uploaded');
              $(".loader-icon").fadeOut('slow');
            }
        else{
            var image= "/assets//"+res;
            setImagevalue(image);
            }
          });
      });
      // function imguploader(data){
      //   $.ajax({
      //     url: '/question/upload',
      //
      //   });
      // }
      function insertSTIGT(){
        return {
          // statement : $("#statement").val(),
          // option :{},
          //
          other: false
          };
      }
      function insertBMCQC(){
        return {
          // statement : $("#statement").val(),
          // option :{},
          //
          other: false
          };
      }
      function insertBMCQR(){
        return {
          // statement : $("#statement").val(),
          // option :{},
          //
          other: false
        };
      }
      function insertRCM(){
        var options = [];
          $('.option-input').each(function () {
            var option = new Object();
            option.oid = $(this).attr('name');
            option.id = $(this).attr('id');
            option.content = $(this).val();
            if(typeof option.oid == 'undefined') option.is_correct= $("#is_correct-"+option.id).is(":checked");
            else option.is_correct= $("#is_correct-"+option.oid).is(":checked");
            options.push({
                option});
                console.log("#is_correct-"+option.id);
        });
        return {
          _token:$("input[name=_token]").val(),
          title:$("input[name=title]").val(),
          statement:$("input[name=statement]").val(),
          question:editor.getData(),
          type:'passage',
          cata:$("select[name=cata] option:selected").val(),
          table:$("input[name=db]").val(),
          id:$("input[name=id]").val(),
          dif:$("select[name=dif] option:selected").val(),
          option:options,
         };
        }
        function insertCRE(){
          var options = [];
            $('.option-input').each(function () {
              var option = new Object();
              option.oid = $(this).attr('name');
              option.id = $(this).attr('id');
              option.content = $(this).val();
              if(typeof option.oid == 'undefined') option.is_correct= $("#is_correct-"+option.id).is(":checked");
              else option.is_correct= $("#is_correct-"+option.oid).is(":checked");
              options.push({
                  option});
                  console.log("#is_correct-"+option.id);
          });
          return {
            _token:$("input[name=_token]").val(),
            title:$("input[name=title]").val(),
            statement:$("input[name=statement]").val(),
            question:editor.getData(),
            type:'simple',
            cata:$("select[name=cata] option:selected").val(),
            table:$("input[name=db]").val(),
            id:$("input[name=id]").val(),
            dif:$("select[name=dif] option:selected").val(),
            option:options,
           };
          }
          function insertSCN(){
            var options = [];
              $('.option-input').each(function () {
                var option = new Object();
                option.oid = $(this).attr('name');
                option.id = $(this).attr('id');
                option.content = $(this).val();
                if(typeof option.oid == 'undefined') option.is_correct= $("#is_correct-"+option.id).is(":checked");
                else option.is_correct= $("#is_correct-"+option.oid).is(":checked");
                options.push({
                    option});
                    console.log("#is_correct-"+option.id);
            });
            return {
              _token:$("input[name=_token]").val(),
              title:$("input[name=title]").val(),
              statement:$("input[name=statement]").val(),
              question:editor.getData(),
              type:'simple',
              cata:$("select[name=cata] option:selected").val(),
              table:$("input[name=db]").val(),
              id:$("input[name=id]").val(),
              dif:$("select[name=dif] option:selected").val(),
              option:options,
             };
            }
      function insertAOA(){
          return { _token:$("input[name=_token]").val(),
            question:editor.getData(),
            cata:$("select[name=cata] option:selected").val(),
            table:$("input[name=db]").val(),
            id:$("input[name=id]").val(),
            dif:'h',
           };
      }
      function getTypeOption(){
          var val = $("#cata option:selected").val();
              return eval("insert" + val + "();");
      }
    //edit Options

    function btalert(alertType,message){
      var indicator = [];
      indicator["success"] = "Well done!";
      indicator["danger"] = "Oh snap!";
      indicator["warning"] = "Attention!";
      $(".content").prepend('<div class="noti alert alert-'+alertType+' alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'+indicator[alertType]+'</strong> '+message+'</div>');
      $(".noti").fadeTo(2000, 500).slideUp(500, function(){
        $(".noti").remove();
    });
    }

    // function prepareUpload(event)
    // {
    // Store the Content in Database
    $("#save").on('click',function(){
      var data = getTypeOption();
      $.ajax({
        @if (isset($id))
        url: '/question/update',
        @else
        url: '/question/store',
        @endif

        type: 'POST',
        dataType: 'html',
        data: data,
        beforeSend: function() {
              $(".loader-icon").show();
          },
        error: function(data){
            console.log(data.statusText);
            btalert('danger',"we can't save the post right now");
              $(".loader-icon").fadeOut('slow')
        },
        success: function(data)
        {
          // var obj = $.parseJSON(data);
          console.log(data);
          // if(obj.sent == true){

          window.setTimeout(function(){
          // Move to a new location or you can do something else
          window.location.href = "/question/{{ strtolower($db) }}";
        }, 1000);


            btalert('success',data);
            $(".loader-icon").fadeOut('slow');
            console.log(data);
          // }
        },
        timeout:3000,
      });
    });

      addOptions();
      hideall();
      selectTypeOption();
    });
  </script>
@stop
