@extends('layouts.default')
@section('content')
<div class="container">
    <form method="post" class="form" id="step-form" action="{{ route('orders.store')}}">
        @csrf
        <ul class="progress__bar">
            <li class="active">Dados Pessoais</li>
            <li>Transfer</li>
            <li>Pagamento</li>
        </ul>
        <div class="form__content">
            <fieldset class="fieldset">
                <h2>Dados Pessoais</h2>
                <div class="form-group">
                    <input class="form-control" id="nome"  type="text" placeholder="Nome" name="nome">
                </div>
                <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Telefone" name="phone">
                </div>
                <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="E-mail" name="email">
                </div>
                <button class="btn btn-primary next">Próximo</button>
            </fieldset>
            <fieldset class="fieldset">
                <h2>Transfer - {{ $transfer->name }}</h2>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fi fi-date"></i>
                                    </div>
                                </div>
                                <input class="form-control" id="datepicker" type="text" placeholder="Data Transfer" name="date">
                            </div>
                        </div>
                        <div class="col">
                            <select class="custom-select" name="hour">
                                <option selected="">Horário do transfer</option>
                                @foreach (json_decode($transfer->hour, true) as $hour)
                                    <option value="{{ $hour }}">{{ $hour }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Paxs (Quantidade de pessoas)" name="quantity" id="quantity">
                </div>
                @if($transfer->departure)
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <select class="custom-select" name="departure">
                                <option selected="">Local de embarque</option>
                                @foreach (json_decode($transfer->departure, true) as $departure)
                                    <option value="{{ $departure }}">{{ $departure }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($transfer->destination)
                        <div class="col">
                            <select class="custom-select" name="destination">
                                <option selected="">Destino</option>
                                @foreach (json_decode($transfer->destination, true) as $destination)
                                    <option value="{{ $destination }}">{{ $destination }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Cidade e País de origem" name="city_country">
                </div>
                <div class="form-group">
                    <select class="custom-select" name="price_combo" id="package">
                        <option selected="" value="1">Pacote de Viagem</option>
                        <option value="{{ $transfer->price_combo }}">Ida e Volta</option>
                        <option value="{{ $transfer->price }}">Ida </option>
                    </select>
                </div>
                <input type="hidden" name="price_total" id="price_total">
                <button class="btn btn-primary previous">Anterior</button>
                <button class="btn btn-primary next">Próximo</button>
            </fieldset>
            <fieldset class="fieldset">
                <h2>Pagamento</h2>
                <button class="btn btn-primary previous">Anterior</button>
                <button type="submit" class="btn btn-primary">Finalizar</button>
            </fieldset>
        </div>
    </form>
</div>
@endsection