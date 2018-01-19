@extends('adminlte::page')

@section('title', $section.' Review')

@section('content_header')
  {{-- @if(session()->has('warning')) --}}

  {{-- @endif(); --}}
  <h1>
    {{ $section }}
    <small>Questions Under Review</small>
  </h1>
  {{-- Breadcrumbs --}}
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item">Review</li>
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
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Date of Submitted</th>
            <th>Question</th>
            <th>Submitted By</th>
            <th>Status</th>
            <th>Time Taken</th>
          </tr>
        </thead>
          <?php
            $i=1;
          ?>
          @foreach ($data as $value)
            <tr class="{{ \App\Helper\ReviewStatus::tableVal($value->result) }}">
            {{-- <tr> --}}
              <td>{{ date('M d, Y - h:i:s A', strtotime( $value->attempt_on )) }}</td>
              <td>
                <span data-toggle="modal" data-target="#mod-{{ $value->refid }}" data-whatever="{{ $value->refid }}"> {{ "Question - ".$i }} </span>
                  <div class="modal fade" id="mod-{{ $value->refid }}" tabindex="-1" role="dialog" aria-labelledby="mod-{{ $value->refid }}-ModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="mod-{{ $value->refid }}-ModalLabel">{{ "Question - ".$i }}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" style="overflow-y:auto;max-height:450px;">
                          <b>Question is:</b>
                          {!! $value->question['content'] !!}
                          @if (!empty($value->answer))
                            <b>Answer is:</b>
                          @else
                            <b style="color:red;"> The Question is Unanswered!</b>
                          @endif
                          {!! $value->answer !!}
                        </div>
                        @if (!empty($value->answer))
                        <div class="modal-footer">
                            <form class="form-inline" action="/review/change" method="post">
                              {!! csrf_field() !!}
                              <input type="hidden" name="refid" value="{{ $value->refid }}">
                              <input type="hidden" name="status" value="f">
                              <input type="hidden" name="db" value="{{ $db }}">
                              <select name="score" class="form-control col-md-1 col-xs-1 col-sm-1 col-lg-1" required>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                              <select>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                      @endif
                      </div>
                    </div>
                  </div>
              </td>
              <td>{{ $value->user->name }}</td>
              {{-- <td></td> --}}
              <td>{{ \App\Helper\ReviewStatus::statusVal($value->result) }}</td>
              <td>{{ $value->time_taken }}</td>
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
