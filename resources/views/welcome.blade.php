@extends('layouts.default')

@section('content')
<div class="container">
        <div class="row">
        <div class="col-sm-8 offset-2">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="card wizard-card" data-color="orange" id="wizardProfile">
                    <form action="" method="">
                    	<div class="wizard-header">
                        	<h3>
                               <b>AGENDE</b> O SEU TRANSFER 
                               <br>
                               <br>
                        	</h3>
                    	</div>

						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#about" data-toggle="tab">Dados Pessoais</a></li>
	                            <li><a href="#account" data-toggle="tab">Transfer</a></li>
                                <li><a href="#address" data-toggle="tab">Confirmação</a></li>
                                <li><a href="#address" data-toggle="tab">Pagamento</a></li>
	                        </ul>

						</div>

                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                                <h4 class="info-text"> Dados Pessoais</h4>
                              <div class="row">
                                  
                                  <div class="col-sm-8 offset-2">
                                        <div class="form-group">
                                            <input class="form-control" id="name"  type="text" placeholder="Nome" name="nome">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" id="phone" type="tel" placeholder="Telefone" name="phone">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" id="email" type="email" placeholder="E-mail" name="email">
                                        </div>
                                  </div>
                                  
                              </div>
                            </div>
                            <div class="tab-pane" id="account">
                                <h4 class="info-text"> Transfer - $transfer->name </h4>
                                <div class="row">

                                    <div class="col-sm-10 col-sm-offset-1">
                                        
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="info-text"> Are you living in a nice area? </h4>
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Street Name</label>
                                            <input type="text" class="form-control" placeholder="5h Avenue">
                                          </div>
                                    </div>
                                    <div class="col-sm-3">
                                         <div class="form-group">
                                            <label>Street Number</label>
                                            <input type="text" class="form-control" placeholder="242">
                                          </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control" placeholder="New York...">
                                          </div>
                                    </div>
                                    <div class="col-sm-5">
                                         <div class="form-group">
                                            <label>Country</label><br>
                                             <select name="country" class="form-control">
                                                <option value="Afghanistan"> Afghanistan </option>
                                                <option value="Albania"> Albania </option>
                                                <option value="Algeria"> Algeria </option>
                                                <option value="American Samoa"> American Samoa </option>
                                                <option value="Andorra"> Andorra </option>
                                                <option value="Angola"> Angola </option>
                                                <option value="Anguilla"> Anguilla </option>
                                                <option value="Antarctica"> Antarctica </option>
                                                <option value="...">...</option>
                                            </select>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Próximo' />
                                <input type='button' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Finalizar' />

                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Anterior' />
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
        </div><!-- end row -->
    </div> <!--  big container -->
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