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
