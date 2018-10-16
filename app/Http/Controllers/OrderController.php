<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Order;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        



        $order = new Order;

        $order->name = $request->nome;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->date = date( 'Y-m-d', strtotime($request->date));
        $order->hour = $request->hour;
        $order->quantity = $request->quantity;
        $order->city_country = $request->city_country;
        $order->price_unit = $request->price_combo;
        $order->price_total = $request->price_total;
        $order->transfer = $request->transfer;
        if(! $request->departure) {
            $order->departure = '-';
        }else {
            $order->departure = $request->departure;
        }

        if(! $request->destination) {
            $order->destination = '-';
        }else {
            $order->destination = $request->destination;
        }
        
        $order->payment_method = 'Pay Pal';
        $order->status = 'Aguardando Pagamento';
        //dd($order);

        $order->save();

        if($order->save()){
            $response = array(
                'status' => 'success',
                'msg' => 'Pedido Criado com sucesso',
                'order_id' => $order->id
            );
            return \Response::json($response, 200);
        }else {
            $response = array(
                'status' => 'error',
                'msg' => 'Não foi possivel criar o pedido'
            );
            return \Response::json($response, 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->status;
        return Redirect::to('orders/success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function export() 
    {
        return Excel::download(new OrdersExport, 'orders.xlsx');
    }
}
