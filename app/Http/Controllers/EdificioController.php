<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
define("REMAINADMIN", "/AdminMain");
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
            'date_in' => 'required|time',
            'date_out' => 'required|time',
        ]);
        $request->only( 'Nome','Min_Piso','Max_Piso','Morada','date_in','date_out');
if($request->Min_Piso>$request->Max_Piso ||$request->date_in>$request->date_out){

return redirect()->back()->withErrors('Min_Piso>Max_Piso or date_in>date_out');
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
    public function update(Request $request,$edificio)
    {
        $request->validate([
            'Nome' => 'string|min:10|max:50|nullable',
            'Min_Piso' => 'integer|nullable',
            'Max_Piso' => 'integer|nullable',
            'Morada' => 'string|nullable',
            'date_in'=> 'time|nullable',
            'date_out'=> 'time|nullable',
        ]);
        $request->only( 'Nome','Min_Piso', 'Max_Piso','Morada','date_in','date_out');
        $ed=DB::table('edificios')->where('id',$edificio)->first();
if($ed==null ||$request->Min_Piso>$request->Max_Piso){
return redirect(REMAINADMIN)->withErrors('Edificio not existe or erro nos pisos');
}else{
if($request->Nome!=null){
$ed->Nome=$request->Nome;
}
if($request->Min_Piso!=null){
    $ed->Piso_min=$request->Min_Piso;
    }

    if($request->Max_Piso!=null){
        $ed->Piso_max=$request->Max_Piso;
        }
        if($request->date_in!=null){
            $ed->date_in=$request->date_in;
            }
            if($request->date_out!=null){
                $ed->date_out=$request->date_out;
                }
if($request->Morada!=null){
    $ed->Morada=$request->Morada;
    }
    $this->check($ed,$edificio);
    return redirect(REMAINADMIN)->with('popup','Edificio Update');
}
    }
public function check($ed,$edificio){
    $SALA =DB::select('select * from salas where id_edificio =? ', [$edificio]);
    if($SALA!=null){
    foreach( $SALA as $sala){
        if($sala->Piso>$ed->Piso_min||$ed->Piso_max<$sala->Piso ){

            return  redirect(REMAINADMIN)->withErrors('Piso utltrapassa os limites');
        }


    }
    DB::update('update edificios  set Nome = ? , Piso_min= ? ,Piso_max= ? , Morada= ? where id = ? ',[$ed->Nome, $ed->Piso_min,$ed->Piso_max,$ed->Morada,$ed->id]);

    }

}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Edificio  $edificio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
$result =DB::select('select id from edificios where id =? ', [$id]);
if($result==null){

    return redirect()->back()->with('popup','Edificio NOT FOUND');
}
DB::delete('delete from edificios where id = ?', [$id]);


        return redirect()->back()->with('popup','Edificio Delected'. $id);
    }
}
