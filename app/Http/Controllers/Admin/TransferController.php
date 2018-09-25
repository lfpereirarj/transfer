<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transfer;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('admin.transfer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.transfer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
                'name' => 'required|unique:transfers|max:255',
                'type' => 'required',
                'route' => 'nullable',
                'price' =>  'nullable|numeric'
            ));

        //store in the database

        $transfer = new Transfer;

        $transfer->name = $request->name;
        $transfer->type = $request->type;
        $transfer->route = $request->route;
        $transfer->price = $request->price;

        $transfer->save();


        //redirect to another page

        return redirect()->route('admin.transfers.show', $transfer->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tranfer = Transfer::where('id', $id)->firstOrFail();

        return view('admin.transfer.show')->with('transfer', $tranfer);
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
        $tranfer = Transfer::where('id', $id)->firstOrFail();

        return view('admin.transfer.edit')->with('transfer', $tranfer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transfer $transfer)
    {
        $transfer->name = $request->name;
        $transfer->type = $request->type;
        $transfer->route = $request->route;
        $transfer->price = $request->price;


        $transfer->save();

        return view('admin.transfer.edit')->with('transfer', $transfer);
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
}
