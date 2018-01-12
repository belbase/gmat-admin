<div class="box box-info" id="catagory">
  <div class="box-header with-border">
    <h3 class="box-title">Catagory</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="form-group">
        <select class="form-control" name="cata" id="cata" required>
          @if (isset($content->cat))
            <option value="{{ $content->cat }}" selected> {{ \App\Helper\QuestionCatagory::get($content->cat) }} </option>
          @endif
          @foreach (\App\Helper\QuestionCatagory::all() as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
          @endforeach
        </select>
    </div>
  </div>
  <!-- /.box-body -->
</div>
<div class="box box-info collapsed-box" id="difficulty-level">
  <div class="box-header with-border">
    <h3 class="box-title">Difficulty Level</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
      </button>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="form-group">
        <select class="form-control" name="dif" required>
          @if (isset($content->dif))
            <option value="{{ $content->dif }}" selected> {{ \App\Helper\DifficultyLevel::get($content->dif) }} </option>
          @endif
          @foreach (\App\Helper\DifficultyLevel::all() as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
          @endforeach
        </select>
    </div>
  </div>
  <!-- /.box-body -->
</div>
<div class="box box-info collapsed-box" id="content-type">
  <div class="box-header with-border">
    <h3 class="box-title">Type</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
      </button>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="form-group">
        <select class="form-control" name="type" required>
          @if (isset($content->type))
          <option value="{{ $content->type }}"> {{ ucfirst($content->type) }} </option>
          @endif
          <option value="simple"> Simple </option>
          <option value="passage"> Passage </option>
        </select>
    </div>
  </div>
  <!-- /.box-body -->
</div>
<div class="box box-info collapsed-box" id="statement">
  <div class="box-header with-border">
    <h3 class="box-title">Statement</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
      </button>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="form-group">
      @if(isset($content->statement))
        <input type="text" name="statement" class="form-control" placeholder="(optional)" value="{{ $content->statement }}" >
      @else
        <input type="text" name="statement" class="form-control" placeholder="(optional)">
      @endif
    </div>
  </div>
  <!-- /.box-body -->
</div>
<div class="box box-info collapsed-box" id="options">
  <div class="box-header with-border">
    <h3 class="box-title" data-toggle="modal" data-target="#option-dialog">Option</h3>
    <div class="modal fade" id="option-dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Options</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body  option-group">
          <div class="form-group">
            <button class="btn btn-primary" type="button" id="add-option"><span class="fa fa-plus"></span> Add Options</button>
          </div>
          @if (isset($content->options))
            @foreach ($content->options as $key => $value)
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <input type="text" class="form-control option-input" name="{{ $value->oid }}" id="{{ $key+1 }}" value="{{ $value->content }}" placeholder="Option {{ $key+1 }}">
                @if ($value->is_correct==1)
                    <div class="input-group-addon"><input type="checkbox" class="form-checkbox" name="is_correct" id="is_correct-{{ $value->oid }}" value="1" checked></div>
                @else
                    <div class="input-group-addon"><input type="checkbox" class="form-checkbox" name="is_correct" id="is_correct-{{ $value->oid }}" value="1"></div>

                @endif
              </div>
              <br>
            @endforeach
            @else
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
              <input type="text" class="form-control option-input" name="1" id="1" placeholder="Option 1">
                  <div class="input-group-addon">
                    <input type="checkbox" class="form-checkbox" class="form-checkbox" name="is_correct" id="is_correct-1" value="1">
                  </div>
            </div>
            <br>
          @endif
        </div>
      </div>
    </div>
  </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->

  <!-- /.box-body -->
</div>
<div class="box box-info">
    <div class="form-group">
      <div class="box-body with-border">
        <button type="submit" name="submit" class="btn btn-primary" id="save"> <span class="fa fa-floppy-o"></span> Save </button>
        <button type="reset" name="reset" class="btn btn-default" id="reset"> <span class="fa fa-trash-o"></span> Discard </button>
      </div>
    </div>
  <!-- /.box-body -->
</div>

@section('js')
  <script src="{{ asset('/assets/js/question.js') }}" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      addOptions();
      hideall();
      selectTypeOption();
    });
  </script>
@stop
