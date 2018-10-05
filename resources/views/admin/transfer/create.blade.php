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
            <form method="post" role="form" action="{{ route('transfers.store')}}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Digite o nome">
                    </div>
                    
                    <div class="form-group">
                        <label for="route">Preço</label>
                        <div class="input-group">
                            <span class="input-group-addon">R$</span>
                            <input type="number" class="form-control" name="price">
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="route">Preço Ida e Volta</label>
                        <div class="input-group">
                            <span class="input-group-addon">R$</span>
                            <input type="number" class="form-control" name="price_combo">
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                    <input type="hidden" id="type" class="form-control" name="type" value="ida">
                    <div class="form-group">
                            <label for="name">Destinos</label>
                            <input type="text" name="destination" class="form-control" id="destination">
                        </div>
                    <div class="form-group">
                            <label for="name">Embarque</label>
                            <input type="text" name="departure" class="form-control" id="departure">
                        </div>
                        <div class="form-group">
                                <label for="name">Horários Ida</label>
                                <input type="text" name="hour" class="form-control" id="hour">
                            </div> 
                            <div class="form-group">
                                    <label for="name">Horários Volta</label>
                                    <input type="text" name="hour_back" class="form-control" id="hour_back">
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