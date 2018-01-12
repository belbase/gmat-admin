@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  {{-- @if(session()->has('warning')) --}}

  {{-- @endif(); --}}
  <h1>
    {{ $section }}
    <small>Section Related Questions</small>
  </h1>
  {{-- Breadcrumbs --}}
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item">Question</li>
    <li class="breadcrumb-item active">{{ $section }}</li>
  </ol>
@stop

@section('content')
  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4> Alert!</h4>
    {!! session()->get('success') !!}
  </div>
  @endif
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title">{{ $section }}</h3>
    </div>
    {{-- /.box-header --}}
    <div class="box-body">
      <form class="" action="/question/add" method="post">
        {!! csrf_field() !!}
        <input type="hidden" name="section" value="{{ $db }}">
        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> New Question</button>
      </form>
      <br/>
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Title</th>
          <th>Action</th>
          <th>Modified On</th>
        </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
          ?>
          @foreach ($data as $item)
            <tr>
              <td>
                <span data-toggle="modal" data-target="#modal-{{ $item['qid'] }}">{!! 'Question -'.$i !!}</span>
                <div class="modal fade" id="modal-{{ $item['qid'] }}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">{!! 'Question -'.$i !!}</h4>
                      </div>
                      <div class="modal-body" style="overflow-y:auto;max-height:450px;">
                        {!! $item->passage !!}
                        @if (isset($item->statement))
                          <p> <b>{!! $item->statement !!}</b></p>

                        @endif
                        @if (isset($item->options))
                          <ol type="a">
                            @foreach ($item->options as $key => $value)
                              @if ($value->is_correct==1)
                                <li class="text-success"><b>{{ ucfirst($value->content) }} </b></li>
                              @else
                                <li> {{ ucfirst($value->content) }} </li>
                              @endif
                            @endforeach

                          </ol>
                        @endif
                      </div>
                    </div>
                    {{-- /.modal-content --}}
                  </div>
                  {{-- /.modal-dialog --}}
                </div>
                {{--  /.modal --}}

              </td>
              <td>
                <form action="/question/edit" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="section" value="{{ $db }}">
                <input type="hidden" name="id" value="{{ $item['qid'] }}">
                <button type="submit" class="no-btn"><i class="fa fa-edit"></i> edit</button>
                <a href="#" data-toggle="modal" class="no-btn" data-target="#del-box-{{ $item['qid'] }}"><i class="fa fa-trash-o"></i> Delete</a>
              </form>

                  {{-- The Starting of the Modal  --}}
                  <div class="modal fade" id="del-box-{{ $item['qid'] }}">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        {{-- Modal Header --}}
                        <div class="modal-header">
                          <h4 class="modal-title">Delete</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        {{-- Modal body --}}
                        <div class="modal-body">
                          Do You Want to Delete The Question?
                        </div>

                        {{-- Modal footer --}}
                        <div class="modal-footer">
                          <form action="/question/delete" method="post" class="form-horizontal">
                            {!! csrf_field() !!}
                            <input type="hidden" name="section" value="{{ $db }}">
                            <input type="hidden" name="id" value="{{ $item['qid'] }}">
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- End of the Delete Model --}}
              </td>
              <td>{{ date('M d, Y - h:i:s A', strtotime($item['updated_at'])) }}</td>
            </tr>
            <?php
            $i++;
            ?>
          @endforeach
        </tbody>
        <tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
</div>
</div>
@stop
@section('css')
    <style media="screen">
      .no-btn{
        border: none;
        background-color:inherit;
        color: #000;
      }
      .btn:hover{
        color: #000;
        text-decoration: underline;
      }
    </style>
@stop
@section('js')
    <script>
      $(document).ready(function () {
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : false,
          'info'        : true,
          'autoWidth'   : false
        });
        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });
      });
    </script>
@stop
