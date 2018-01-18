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
    {{-- <div class="box-header">
      <h3 class="box-title">{{ $section }}</h3>
    </div> --}}
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
          <th>Catagory</th>
          <th>Action</th>
          <th>Modified On</th>
        </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
          ?>
          @foreach ($data as $item)
            @include('question.index.'.strtolower($item->cat))
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
