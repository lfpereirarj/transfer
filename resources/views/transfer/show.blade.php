@extends('adminlte::page') 
@section('title', $transfer->name)
@section('content_header')
<h1>Transfer
    <small>id: {{ $transfer->id }}</small>
</h1>
<ol class="breadcrumb">
    <li>
        <a href="#">
            <i class="fa fa-dashboard"></i> Home</a>
    </li>
    <li>
        <a href="#">Transfer</a>
    </li>
    <li class="active">{{ $transfer->name }}</li>
</ol>
@endsection 


@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $transfer->name }}</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      Nome: {{ $transfer->name }}
      <br>
      Tipo: {{ $transfer->type }}
      <br>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <a href="{{ route('transfers.edit', $transfer->id )}}" class="btn btn-warning">Editar</a>
    </div>
    <!-- /.box-footer-->
  </div>
@endsection