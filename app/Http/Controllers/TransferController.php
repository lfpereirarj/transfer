<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        return view('transfer.index');
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

        return view('transfer.index')->with('transfer', $tranfer);
    }

    
}
