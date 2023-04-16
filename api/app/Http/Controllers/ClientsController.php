<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Clients::all();
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:8',
            'enroll_number' => 'required|min:8',
            'date_of_payment' => 'required',
        ]);

        $client = new Clients();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->enroll_number = $request->enroll_number;
        $client->date_of_payment = $request->date_of_payment;

        $client->save();

        return $client;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients, $id)
    {
        return Clients::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $clients)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $client)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:8',
            'enroll_number' => 'required|min:8',
            'date_of_payment' => 'required',
        ]);

        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->enroll_number = $request->enroll_number;
        $client->date_of_payment = $request->date_of_payment;

        $client->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients, $id)
    {
        $client = Clients::find($id);

        if(is_null($client)){
            return response()->json('No se pudo realizar la operación', 404);
        }
        
        $client->delete();
        return response()->noContent();
    }
}
