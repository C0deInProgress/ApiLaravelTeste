<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resource\Shedule as SheduleResource;
use App\Models\Model\Shedule;

class SheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Shedule::all();
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
            'client_name'=> 'required',
            'shedule'=> 'required',
            'status'=> 'required',
        ]);
        Shedule::create($request->all());
        return response()->json([
            'data' => 'Horário agendado com sucesso!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Shedule::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Shedule::findOrFail($id);
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
        $request->validate([
            'client_name' => 'required',
            'shedule' => 'required',
            'status' => 'required',
        ]);
        $shedule = Shedule::findOrFail($id);/* 
        $shedule = Shedule::create($request->all()); */
        $shedule->client_name = $request->client_name;
        $shedule->shedule = $request->shedule;
        $shedule->status = $request->status;
        $shedule->save();
        return response()->json([
            'data' => 'Horário alterado com sucesso!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shedule = Shedule::findOrFail($id);
        $shedule->delete();
        return response()->json([
            'data' => 'Horário Desmarcado com sucesso!'
        ]);
    }
}
