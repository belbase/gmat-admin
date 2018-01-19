{{-- include catagory here --}}
@include('form.editor-components.catagory')

{{-- include catagory here --}}
@include('form.editor-components.dif-level')

{{-- include catagory here --}}
@include('form.editor-components.statement')

<div class="box box-info">
    <div class="form-group">
      <div class="box-body with-border">
        <button type="submit" name="submit" class="btn btn-primary" id="save"> <span class="fa fa-floppy-o"></span> Save </button>
        <button type="reset" name="reset" class="btn btn-default" id="reset"> <span class="fa fa-trash-o"></span> Discard </button>
      </div>
    </div>
  <!-- /.box-body -->
</div>
