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
