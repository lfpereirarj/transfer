@extends('adminlte::page') @section('title', 'Criar Transfer')
 @section('content_header')
<h1>Horários
    <small>Adicionar</small>
</h1>
<ol class="breadcrumb">
    <li>
        <a href="#">
            <i class="fa fa-dashboard"></i> Home</a>
    </li>
    <li>
        <a href="#">Transfer</a>
    </li>
    <li class="active">Adicionar</li>
</ol>
@endsection 
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Adicionar Novo Transfer</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="row">


        <div class="col-md-6">
            <form method="post" role="form" action="{{ route('transfers.store')}}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Digite o nome">
                    </div>
                   <div class="form-group">
                        <label for="route">Horário</label>
                        <input type="text" name="hour" class="form-control" id="hour" placeholder="Digite a rota">
                    </div>                    
                    
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection