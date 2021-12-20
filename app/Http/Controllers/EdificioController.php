<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use Illuminate\Http\Request;

class EdificioController extends Controller
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
    public function create(Request $request)
    {
        $edificio=new Edificio();
        $edificio->Nome=$request->Nome;
        $edificio->Piso_min=$request->Min_Piso;
        $edificio->Piso_max=$request->Max_Piso;
        $edificio->Morada=$request->Morada;
        return $edificio;
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
            'Nome' => 'required|string|min:10|max:50',
            'Min_Piso' => 'required|integer',
            'Max_Piso' => 'required|integer',
            'Morada' => 'required|string ',
        ]);
        $request->only( 'Nome','Min_Piso','Max_Piso','Morada');
if($request->Min_Piso>$request->Max_Piso){

return redirect()->back()->withErrors('Min_Piso>Max_Piso');
}
$Edificio=$this->create($request);
$Edificio->save();
return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Edificio  $edificio
     * @return \Illuminate\Http\Response
     */
    public function show(Edificio $edificio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Edificio  $edificio
     * @return \Illuminate\Http\Response
     */
    public function edit(Edificio $edificio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Edificio  $edificio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Edificio $edificio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Edificio  $edificio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edificio $edificio)
    {
        //
    }
}
