@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 offset-sm-2">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="card wizard-card" data-color="orange" id="wizardProfile">
                    <form method="post" class="form" id="transfer-form" action="/orders">
                        @csrf
                        <div class="wizard-header">
                            <h3>
                                Transfer <b>{{ $transfer->name }}</b>
                                <br>
                                <br>
                            </h3>
                        </div>

                        <div class="wizard-navigation">
                            <ul>
                                <li><a href="#about" data-toggle="tab">Dados Pessoais</a></li>
                                <li><a href="#account" data-toggle="tab">Transfer</a></li>
                                <li><a href="#confirmation" data-toggle="tab">Confirmação</a></li>
                                <li><a href="#payment" data-toggle="tab">Pagamento</a></li>
                            </ul>

                        </div>

                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                                <h4 class="info-text"> Dados Pessoais</h4>
                                <div class="row">

                                    <div class="col-sm-8 offset-sm-2">
                                        <div class="form-group">
                                            <input class="form-control" id="name" my-input="name" type="text"
                                                placeholder="Nome" name="nome" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" id="phone" type="tel" placeholder="Telefone"
                                                name="phone" my-input="phone" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" id="email" type="email" placeholder="E-mail"
                                                name="email" my-input="email" autocomplete="off">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="account">
                                <h4 class="info-text"> Transfer - {{ $transfer->name }} </h4>
                                <div class="row">

                                    <div class="col-sm-8 offset-sm-2">
                                        <div class="form-group">
                                            <select class="custom-select" name="price_combo" id="package">
                                                <option selected="" value="1">Pacote de Viagem</option>
                                                @if($transfer->price_combo)
                                                <option value="{{ $transfer->price_combo }}">Ida e Volta</option>
                                                @endif
                                                @if($transfer->price)
                                                <option value="{{ $transfer->price }}">Ida </option>
                                                @endif

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <h5>Ida</h5>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fi fi-date"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control" id="datepicker" type="text"
                                                            placeholder="Data Transfer" name="date" my-input="date"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <select class="custom-select" name="hour" my-input="hour">
                                                        <option selected="">Horário do transfer</option>
                                                        @foreach (json_decode($transfer->hour, true) as $hour)
                                                        <option value="{{ $hour }}">{{ $hour }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-back">
                                                <h5>Volta</h5>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fi fi-date"></i>
                                                                </div>
                                                            </div>
                                                            <input class="form-control" id="datepicker-back" type="text"
                                                                placeholder="Data Transfer" name="date_back" my-input="date"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <select class="custom-select" name="hour_back" my-input="hour">
                                                            <option selected="">Horário do transfer</option>
                                                            @foreach (json_decode($transfer->hour_back, true) as $hour_back)
                                                            <option value="{{ $hour_back }}">{{ $hour_back }}</option>
                                                            @endforeach
                                                        </select>
    
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Paxs (Quantidade de pessoas)"
                                                name="quantity" id="quantity" my-input="quantity" autocomplete="off">
                                        </div>
                                        @if($transfer->departure)
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col">
                                                    <select class="custom-select" name="departure" my-input="departure">
                                                        <option selected="">Local de embarque</option>
                                                        @foreach (json_decode($transfer->departure, true) as
                                                        $departure)
                                                        <option value="{{ $departure }}">{{ $departure }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if($transfer->destination)
                                                <div class="col">
                                                    <select class="custom-select" name="destination" my-input="destination">
                                                        <option selected="">Destino</option>
                                                        @foreach (json_decode($transfer->destination, true) as
                                                        $destination)
                                                        <option value="{{ $destination }}">{{ $destination }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Cidade e País de origem"
                                                name="city_country" my-input="city_country" autocomplete="off">
                                        </div>
                                       
                                        <input type="hidden" name="price_total" id="price_total" my-input="price_total">
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="confirmation">
                                <h4 class="info-text">Confirmação </h4>
                                <div class="row">

                                    <div class="col-sm-7 offset-sm-2">
                                        <p><strong>Nome:</strong> <span class="nome"></span></p>
                                        <p><strong>Telefone:</strong> <span class="phone"></span></p>
                                        <p><strong>E-mail:</strong> <span class="email"></span></p>
                                        <p><strong>Transfer:</strong> {{ $transfer->name }}</p>
                                        <p><strong>Data Ida:</strong> <span class="date"></span> - <strong>Horário Ida:</strong> <span class="hour"></span></p>
                                        <p class="form-back"><strong>Data Volta:</strong> <span class="date_back"></span> - <strong>Horário Volta:</strong> <span class="hour_back"></span></p>
                                        <p><strong>Quantidade:</strong> <span class="quantity"></span></p>
                                        @if($transfer->departure)
                                        <p><strong>Embarque:</strong> <span class="departure"></span></p>
                                        @endif
                                        @if($transfer->destination)
                                        <p><strong>Destino:</strong> <span class="destination"></span></p>
                                        @endif
                                        <p><strong>Pacote:</strong> <span class="price_combo"></span></p>
                                        <p><strong>Preço Total:</strong> <span class="price_total"></span></p>


                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="payment">
                                <h4 class="info-text">Pagamento </h4>
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div id="paypal-button-container" style="text-align: center;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next'
                                    value='Próximo' />
                                <input type='button' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish'
                                    value='Finalizar' />

                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous'
                                    value='Anterior' />
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
    </div><!-- end row -->
</div> <!--  big container -->

<form method="post" id="form-update" style="display: none" action="/orders">
    @csrf
    @method('PATCH')
    <input type="hidden" name="id">

</form>
@endsection

@section('script')

<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<!--   Core JS Files   -->
<script src="{{ asset('js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{ asset('js/gsdk-bootstrap-wizard.js') }}"></script>

<script src="{{ asset('js/jquery.validate.min.js') }}"></script>

<script>
    paypal.Button.render({

        env: 'sandbox',

        client: {
            sandbox: 'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
            production: '<insert production client id>'
        },

        style: {
            label: 'paypal',
            size: 'medium', // small | medium | large | responsive
            shape: 'rect', // pill | rect
            color: 'blue', // gold | blue | silver | black
            tagline: false
        },

        commit: true,

        payment: function (data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [{
                        amount: {
                            total: $('#price_total').val(),
                            currency: 'BRL'
                        }
                    }]
                }
            });
        },

        onAuthorize: function (data, actions) {
            return actions.payment.execute().then(function () {


                var fields = {}

                $('#update-form').find(
                    `input[type="text"],
                        input[type="number"],
                        input[type="tel"],
                        input[type="email"],
                        input[type="hidden"],
                        input[type="radio"]:checked,
                        input[type="checkbox"]:checked,
                        select,
                        textarea`
                ).each(function (i) {
                    var name = $(this).attr('name') || $(this).attr('id')
                    if (name) {
                        fields[name] = $(this).val()
                    }
                })

                $.ajax({
                    type: "PUT",
                    url: $('#update-form').attr('action'),
                    data: fields,
                    success: function (msg) {
                        window.location = 'http://transferilhagrande.com.br'
                    }
                });
            });
        }

    }, '#paypal-button-container');
</script>
@endsection