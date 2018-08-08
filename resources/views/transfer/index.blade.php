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
                    <input class="form-control" id="name"  type="text" placeholder="Nome" name="nome">
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
                

                <label>
                    <input type="radio" name="payment-option" value="paypal" checked>
                    <img src="/demo/checkout/static/img/paypal-mark.jpg" alt="Pay with Paypal">
                </label>

                <label>
                    <input type="radio" name="payment-option" value="card">
                    <img src="/demo/checkout/static/img/card-mark.png" alt="Accepting Visa, Mastercard, Discover and American Express">
                </label>

                <div id="paypal-button-container"></div>
                <div id="card-button-container" class="hidden"><button>Continue</button></div>

                <button class="btn btn-primary previous">Anterior</button>
                <button id="submit" type="submit" class="btn btn-primary">Finalizar</button>
            </fieldset>
        </div>
    </form>
</div>
@endsection
@section('script')

<script src="https://www.paypalobjects.com/api/checkout.js"></script>


<script>
    $(document).ready(function() {
        $('#step-form').on('submit', function (e) {
            e.preventDefault();
            var name = $('#name').val();
            var email = $('#email').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: "POST",
                url: $('#step-form').attr('action'),
                data: {name: name, email: email, _token: _token},
                success: function( msg ) {
                    console.log(msg);
                }
            });
        });
    });

    function getElements(el) {
        return Array.prototype.slice.call(document.querySelectorAll(el));
    }

    function hideElement(el) {
        document.body.querySelector(el).style.display = 'none';
    }

    function showElement(el) {
        document.body.querySelector(el).style.display = 'block';
    }

    // Listen for changes to the radio fields

    getElements('input[name=payment-option]').forEach(function(el) {
        el.addEventListener('change', function(event) {

            // If PayPal is selected, show the PayPal button

            if (event.target.value === 'paypal') {
                hideElement('#card-button-container');
                showElement('#paypal-button-container');
            }

            // If Card is selected, show the standard continue button

            if (event.target.value === 'card') {
                showElement('#card-button-container');
                hideElement('#paypal-button-container');
            }
        });
    });

    // Hide Non-PayPal button by default

    hideElement('#card-button-container');

    // Render the PayPal button

    paypal.Button.render({

        env: 'sandbox',

        client: {
            sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
            production: '<insert production client id>'
        },

        style: {
            label: 'paypal',
            size:  'medium',    // small | medium | large | responsive
            shape: 'rect',     // pill | rect
            color: 'blue',     // gold | blue | silver | black
            tagline: false    
        },

        commit: true,

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: $('#price_total').val(), currency: 'BRL' }
                        }
                    ]
                }
            });
        },

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                window.alert('Payment Complete!');
            });
        }

    }, '#paypal-button-container');

</script>
@endsection;