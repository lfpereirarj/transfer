@extends('layouts.default')
@section('content')
<div class="container">
    <form class="form" id="step-form" action="">
        <ul class="progress__bar">
            <li class="active">Dados Pessoais</li>
            <li>Transfer</li>
            <li>Pagamento</li>
        </ul>
        <div class="form__content">
            <fieldset class="fieldset">
                <h2>Dados Pessoais</h2>
                <div class="form-group">
                    <input class="form-control" id="nome" type="text" placeholder="Nome">
                </div>
                <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Telefone">
                </div>
                <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="E-mail">
                </div>
                <button class="btn btn-primary next">Próximo</button>
            </fieldset>
            <fieldset class="fieldset">
                <h2>Transfer</h2>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fi fi-date"></i>
                                    </div>
                                </div>
                                <input class="form-control" id="datepicker" type="text" placeholder="Data Transfer">
                            </div>
                        </div>
                        <div class="col">
                            <select class="custom-select">
                                <option selected="">Horário do transfer</option>
                                <option value="1">Manhã 1 (Entre 5h e 7:15) – Destino Vila do Abraão ou Araçatiba</option>
                                <option
                                    value="2">Manhã 2 (Entre 8:45h e 11:15h) – Destino Vila do Abraão</option>
                                    <option value="3">Tarde (Entre 13:20h e 15h) – Destino Vila do Abraão </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Paxs (Quantidade de pessoas)">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <select class="custom-select">
                                <option selected="">Local de embarque</option>
                                <option value="1">Aeroportos</option>
                                <option value="2">Zona Sul</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="custom-select">
                                <option selected="">Destino</option>
                                <option value="1">Vila do Abraão (Ilha Grande)</option>
                                <option value="2">Praia de Araçatiba </option>
                                <option value="3">Outros </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Cidade e País de origem">
                </div>
                <div class="form-group">
                    <select class="custom-select">
                        <option selected="">Pacote de Viagem</option>
                        <option value="1">Ida e Volta</option>
                        <option value="2">Ida </option>
                    </select>
                </div>
                <button class="btn btn-primary previous">Anterior</button>
                <button class="btn btn-primary next">Próximo</button>
            </fieldset>
            <fieldset class="fieldset">
                <h2>Pagamento</h2>
                <button class="btn btn-primary previous">Anterior</button>
                <button class="btn btn-primary submit">Finalizar</button>
            </fieldset>
        </div>
    </form>
</div>
@endsection