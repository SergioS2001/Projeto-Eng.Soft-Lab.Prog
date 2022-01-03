<?php

namespace App\Http\Controllers;

use App\Models\Utilizador;
use Illuminate\Http\Request;

class UtilizadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Utilizador = Utilizador::paginate(5);
        return view('Utilizador.index', ['utilizador' => $Utilizador]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Utilizador.insert');
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
            'Nome' => 'required',
            'Type' => 'required',
            'Email' => 'required',
            'Password' => 'required',
        ]);

         $Utilizador = new Utilizador;
         $Utilizador->Nome= $request->Nome;
         $Utilizador->Type= $request->Type;
         $Utilizador->Email= $request->Email;
         $Utilizador->Password= $request->Password;

        Utilizador::create($request->all());

        return redirect('/students');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Utilizador  $utilizador
     * @return \Illuminate\Http\Response
     */
    public function show(Utilizador $utilizador)
    {
        return view('Utilizador.show', ['utilizador' => $utilizador]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Utilizador  $utilizador
     * @return \Illuminate\Http\Response
     */
    public function edit(Utilizador $utilizador)
    {
        return view('Utilizador.edit', ['utilizador' => $utilizador]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Utilizador  $utilizador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Utilizador $utilizador)
    {
        $request->validate([
            'Nome' => 'required',
            'Type' => 'required',
            'Email' => 'required',
            'Password' => 'required',
        ]);

        $utilizador->update($request->all());

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Utilizador  $utilizador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utilizador $utilizador)
    {
        $utilizador->delete();

        return redirect('/');
    }
}
