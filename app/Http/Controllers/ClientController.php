<?php

namespace App\Http\Controllers;
use App\Client;
use App\City;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id')->get();
        $list = [];
        foreach($clients as $client){
            $list[]=[
                'id' => $client->id,
                'names' => $client->first_name.' '.$client->second_name.' '.$client->last_name.' '.$client->second_last_name,
                'identification_type' => $client->identification_type,
                'identification' => $client->identification,
                'address' => $client->address,
                'phone' => $client->phone,
                'email' => $client->email,
                'position' => $client->position,
                'department_name' => $client->city->department_name,
                'municipality_name' => $client->city->municipality_name
            ];
        }

        return $list;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = City::all()->unique('department_code');
        return view('clients.create', ['departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = validator($request->all(), [
            'identification'=> 'required|string|max:30',
            'identification_type'=> 'required|string|max:2',
            'first_name'=> 'required|string|max:30',
            'second_name'=> 'nullable|string|max:30',
            'last_name'=> 'required|string|max:30',
            'second_last_name'=> 'nullable|string|max:30',
            'address'=> 'required|string|max:100',
            'phone'=> 'required|integer|min:12',
            'email'=> 'required|email|string|max:50',
            'position'=> 'required|string|max:30',
            'city_id'=> 'required|exists:cities,id'
        ]);

        $client = new Client();
        $client->fill($validateData->validated());

        if ($client->save()) {
            toastr()->success('Datos guardados correctamente!');
        } else {
            toastr()->error('Ocurrio un error, por favor intente nuevamente.');
        }

        return redirect()->route('clients.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        $departments = City::all()->unique('department_code');
        $selectedCity = $client->city->department_code;
        return view('clients.edit', ['client' => $client,'departments' => $departments, 'selected_city'=>$selectedCity]);
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
        $validateData = validator($request->all(), [
            'identification'=> 'required|string|max:30',
            'identification_type'=> 'required|string|max:2',
            'first_name'=> 'required|string|max:30',
            'second_name'=> 'nullable|string|max:30',
            'last_name'=> 'required|string|max:30',
            'second_last_name'=> 'nullable|string|max:30',
            'address'=> 'required|string|max:100',
            'phone'=> 'required|integer|min:12',
            'email'=> 'required|email|string|max:50',
            'position'=> 'required|string|max:30',
            'city_id'=> 'required|exists:cities,id'
        ]);

        $client = Client::find($id);
        $client->fill($validateData->validated());

        if ($client->update()) {
            toastr()->success('Datos modificados correctamente!');
        } else {
            toastr()->error('Ocurrio un error, por favor intente nuevamente.');
        }

        return redirect('clients/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $clients = Client::find($id);

        if ($clients->delete()) {
            return 'Datos eliminados correctamente!';
        }
        return 'Ocurrio un error, por favor intente nuevamente.';

    }

}
