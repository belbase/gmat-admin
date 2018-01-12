@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>
    Question Editor
    <small>Advanced and Full of Features</small>
  </h1>
  {{-- Breadcrumbs --}}
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item">Question</li>
    <li class="breadcrumb-item active"> Editor </li>
  </ol>
@stop

@section('content')
  <div class="col-md-9">
    @include('form.editor')
  </div>
  <div class="col-md-3">
    {{-- <div class="box box-info opt">
      <!-- /.box-header -->
      <div class="box-body pad"> --}}
            @include('form.editor-components')
      {{-- </div>
    </div> --}}
  </div>
@stop
