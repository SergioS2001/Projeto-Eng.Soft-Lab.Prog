<?php

namespace App\Http\Controllers;

use App\Models\Utilizador;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

define("REMAIN", "/Main");
define("REMAINADMIN", "/AdminMain");

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
        return view('Utilizador/Index', ['utilizador' => $Utilizador]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Utilizador/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make([], []);
            $request->validate([
            'Nome' => 'required|min:8|max:50|string ',
            'Type' => 'required',
            'Email' => 'required |email|unique:utilizadors',
            'Password' => 'required|string|min:8|max:20',
            'Re-password'=>'required|same:Password',
        ], ['Nome.required'=> 'The Name field is required.',
        'Nome.min'=> 'The Name field is too short(<8).',
        'Nome.max'=> 'The Name field is too long (>50).',
        'Type.required'=> 'The Type field is required.',
        'Email.required'=> 'The Email field is required.',
        'Email.email'=> 'The email field is not an email.',
        'Password.required'=> 'The Password field is required.',
        'Password.min'=> 'The Password field is too short(<8).',
        'Password.max'=> 'The Password field is is too long (>20).',
        'Re-password.required'=> 'The Re-Password field is Required.',
        ]);
if(!($request->Type== 'Aluno'||$request->Type=='Docente'||$request->Type=='Admin')){
    $v->errors()->add('popup', 'Not Valid');

     redirect()->back()->withErrors($v);
}


         $Utilizador = new Utilizador;

         $Utilizador->Nome= $request->Nome;
         $Utilizador->Type= $request->Type;
         $Utilizador->Email= $request->Email;
         $Utilizador->Password=bcrypt($request->Password);

         $Utilizador->save();

         session(['utilizadors' => $Utilizador]);
         echo $Utilizador->Type;
if( $Utilizador->Type =='Admin'){

    return redirect(REMAINADMIN);
}
return redirect(REMAIN);


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
    public function Log_In(Request $request){

        $request->validate([
        'Email' => 'required |email',
        'Password' => 'required|string|min:8|max:20',

    ]);

    $request->only( 'Email','Password');
    $Utilizador=DB::table('utilizadors')->where('Email',$request->Email)->first();
    if($Utilizador!=null && Hash::check($request->Password, $Utilizador->Password)){
        session(['utilizadors' => $Utilizador]);
        if( $Utilizador->Type=='Admin'){

            return redirect(REMAINADMIN);
        }
        return(REMAIN);



}
    return redirect()->back()->withErrors('ERRROOO');

    }
    public function LogOut()
    {
        $value = session('utilizadors','default');
            if($value!='default'){
                session()->forget('utilizadors');
            return redirect()->back();
}
            return redirect()->back()->withErrors('ERRROOO');
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


        return redirect(REMAIN)->withHeaders('Successfull');
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
        return redirect(REMAIN)->withHeaders('Utilizador Delected');
    }
}
