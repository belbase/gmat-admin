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
            @foreach ($arrangement->sub($content->cat) as $key => $value)
              <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
          @else
            @foreach ($arrangement->sub() as $key => $value)
              <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
          @endif
        </select>
    </div>
  </div>
  <!-- /.box-body -->
</div>
