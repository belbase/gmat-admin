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
            @foreach ($arrangement->dif($content->dif) as $key => $value)
              <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
          @else
            @foreach ($arrangement->dif() as $key => $value)
              <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
          @endif

        </select>
    </div>
  </div>
  <!-- /.box-body -->
</div>
