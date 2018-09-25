<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalController extends Controller
{
    //protected $provider;
    public function __construct() {
        $this->provider = new ExpressCheckout();
    }
}
