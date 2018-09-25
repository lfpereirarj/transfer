@extends('adminlte::page') @section('title', 'Criar Transfer') @section('content_header')
<h1>Transfer
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
@endsection @section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Adicionar Novo Transfer</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="row">


        <div class="col-md-6">
            <form method="post" role="form" action="{{ route('transfers.update', $transfer->id)}}">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" value="{{ $transfer->name }}" name="name" class="form-control" id="name" placeholder="Digite o nome">
                    </div>
                    <div class="form-group">
                        <label for="type">Tipo</label>
                        <select id="type" class="form-control" name="type">
                            <option @if($transfer->type == 'volta') selected="selected" @endif value="volta">Volta</option>
                            <option @if($transfer->type == 'ida') selected="selected" @endif value="ida">Ida</option>
                            <option @if($transfer->type == 'ida-volta') selected="selected" @endif value="ida-volta">Ida/Volta</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="route">Rota</label>
                        <input type="text" name="route" value="{{ $transfer->route }}" class="form-control" id="route" placeholder="Digite a rota">
                    </div>
                    <div class="form-group">
                        <label for="route">Preço</label>
                        <div class="input-group">
                            <span class="input-group-addon">R$</span>
                            <input type="number" value="{{ $transfer->price }}" class="form-control" name="price">
                            <span class="input-group-addon">.00</span>
                        </div>
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