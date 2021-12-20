<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salas = Sala::all();
        $edificios = Edificio::all();
        return view('Main', ['salas' => $salas],['edificios' => $edificios]);
    }
    public function ADMINindex()
    {
        $salas = Sala::all();
        $edificios = Edificio::all();
        return view('/AdminMain', ['salas' => $salas],['edificios' => $edificios]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
$sala=new Sala();
$sala->id_edificio=$request->id_edificio;
$sala->Area=$request->Area;
$sala->Piso=$request->Piso;
$sala->Type=$request->Type;
$sala->Descricao=$request->Descricao;
return $sala;


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
        'id_edificio' => 'required|exists:edificios,id',
        'Piso' => 'required|integer',
        'Type' => 'required|string ',
        'Area' => 'required|numeric',
        'Descricao' => 'string|required|max:200',

    ]);
    $request->only( 'id_edificio','Piso','Type','Descricao','Area');
    $ed=DB::table('edificios')->where('id',$request->id_edificio)->first();
    if($ed==null){

        return redirect()->back()->withErrors('Edificio doesnt exist');

    }
  if($ed->Piso_min >=$request->Piso ||$ed->Piso_max <= $request->Piso){

return redirect()->back()->withErrors('Piso doesnt exist');

  }

$sala=$this->create($request);
$sala->save();
return redirect()->back()->with('popup','Created sucessfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function show(Sala $sala)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function edit(Sala $sala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sala $sala)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sala $sala)
    {
        $sala->delete();

        return redirect('/Main')->withHeaders('Utilizador Delected');
    }
}
