@extends('adminlte::page')
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Transfers</h3>

         
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                        <tr>
                            <th>ID</th>
                            <th>Transfer</th>
                            <th>Horários</th>
                            <th>Preço</th>
                            <th>Preço Ida e Volta</th>
                            <th>Embarque</th>
                            <th>Destino</th>
                            <th>Ações</th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($transfers as $transfer)
                    
                        <tr>
                            <td>{{ $transfer->id}}</td>
                            <td>{{ $transfer->name}}</td>
                            <td>
                                @foreach (json_decode($transfer->hour, true) as $hour)
                                    {{$hour}}, <br>
                                @endforeach
                            </td>
                            <td>{{ $transfer->price}}</td>
                            <td>{{ $transfer->price_combo}}</td>
                            <td>
                                @if($transfer->departure)
                                    @foreach (json_decode($transfer->departure, true) as $departure)
                                        {{$departure}}, <br>
                                    @endforeach
                                @else 
                                    -    
                                @endif
                                    
                            </td>
                            <td>
                                @if($transfer->destination)
                                    @foreach (json_decode($transfer->destination, true) as $destination)
                                        {{$destination}}, <br>
                                    @endforeach
                                @else 
                                    -
                                @endif
                            </td>
                            <td>
                               <a href="{{ route('transfers.edit', $transfer->id)}}">editar</a> 
                            </td>        
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