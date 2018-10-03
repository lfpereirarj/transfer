@extends('adminlte::page')
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Transfers</h3><br><br>

            <a href="/orders/export" class="btn btn-success">Baixar Planilha</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Data</th>
                            <th>Horário</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Preço Total</th>
                            <th>Embarque</th>
                            <th>Destino</th>
                            <th>Cidade</th>
                            <th>Forma de Pagamento</th>
                            <th>Status</th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    
                        <tr>
                            <td>{{ $order->id}}</td>
                            <td>{{ $order->name}}</td>
                            <td>{{ $order->email}}</td>
                            <td>{{ $order->phone}}</td>
                            <td>{{ $order->date}}</td>
                            <td>{{ $order->hour}}</td>
                            <td>{{ $order->quantity}}</td>
                            <td>{{ $order->price_unit}}</td>
                            <td>{{ $order->price_total}}</td>
                            <td>{{ $order->departure}}</td>
                            <td>{{ $order->destination}}</td>
                            <td>{{ $order->city_country}}</td>
                            <td>{{ $order->payment_method}}</td>       
                            <td>{{ $order->status}}</td>       
                        </tr>    
                    @endforeach
            
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
@endsection