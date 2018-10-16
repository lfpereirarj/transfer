@extends('adminlte::page')
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Transfers</h3><br><br>

          <div class="btn-group open">
            <button type="button" class="btn btn-success">Baixar Planilha</button>
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <span class="caret"></span>
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="/orders/export/">Todos</a></li>
              <li><a href="/orders/export/1">Ilha Grande x Búzios</a></li>
              <li><a href="/orders/export/2">Rio de Janeiro x Ilha Grande</a></li>
              <li><a href="/orders/export/3">Ilha Grande x Rio de Janeiro</a></li>
              <li><a href="/orders/export/4">Rio de Janeiro x Angra dos Reis</a></li>
              <li><a href="/orders/export/5">Angra dos Reis x Rio de Janeiro</a></li>
              <li><a href="/orders/export/6">Rio de Janeiro x Búzios</a></li>
            </ul>
          </div>
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