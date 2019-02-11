@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div id="app">

            </div>
        </div>    
    </div>
@endsection

@section('script')


<!--   Core JS Files   -->
<script src="{{ asset('js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{ asset('js/gsdk-bootstrap-wizard.js') }}"></script>

<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
@endsection