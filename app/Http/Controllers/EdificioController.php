<?php

namespace App\Http\Controllers;

use App\Mail\NEWEDIFICIO;
use App\Models\Edificio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
define("REMAINADMIN5", "/AdminMain");
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
define("DATA_FORMAT5","Y-m-d H:i:s");
define("HOUR_FORMAT5","H:i:s");
/**
 *  *  class controler Edificio
 *     usamos este controller para gerir as funções necessarias para a criação, mostrar, editar ,delete de edificios.
 *
 * @author <40115@ufp.edu.pt> Ruben Pinto <39836@ufp.edu.pt> Sérgio Sousa  ;
 */
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
     * private function to create a edificio from Request
     * @param Request parametro do tipo request para utilizar
     * @return edificio Class edificio com a informação para utilizar
     */
    public function create(Request $request)
    {
        $edificio=new Edificio();
        $edificio->Nome=$request->Nome;
        $edificio->Piso_min=$request->Min_Piso;
        $edificio->Piso_max=$request->Max_Piso;
        $edificio->Morada=$request->Morada;
        $edificio->date_in=$request->date_in;
        $edificio->date_out=$request->date_out;
        return $edificio;
    }

    /**
     * Store a newly created resource in storage with validation
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
            'date_in' => 'required|date_format:H:i',
            'date_out' => 'required|date_format:H:i|after:date_in',
        ]);
        $request->only( 'Nome','Min_Piso','Max_Piso','Morada','date_in','date_out');
if($request->Min_Piso>$request->Max_Piso ){

return redirect()->back()->withErrors('Min_Piso>Max_Piso or date_in>date_out');
}
$Edificio=$this->create($request);
$Edificio->save();
$this->SendMAIL($request,1);
return redirect()->back(303)->with('popup','Edificiocreated');

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
     * @param  $edificio id para update
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$edificio)
    {
        $request->validate([
            'Nome' => 'string|min:10|max:50|nullable',
            'Min_Piso' => 'integer|nullable',
            'Max_Piso' => 'integer|nullable',
            'Morada' => 'string|nullable',
            'date_in' => 'nullable|date_format:H:i',
            'date_out' => 'nullable|date_format:H:i|after:date_in',
        ]);
        $request->only( 'Nome','Min_Piso','Max_Piso','Morada','date_in','date_out');
        $ed=DB::table('edificios')->where('id',$edificio)->first();
        $string="Doesnt exits";
if(!($ed==null ||$request->Min_Piso>$request->Max_Piso)){
    $this->check2($request,$ed);

    if($this->check($ed,$edificio)&& $this->check3($ed,$edificio)){


        DB::update('update edificios  set Nome = ? , Piso_min= ? ,Piso_max= ? , Morada= ?, date_in=?, date_out=? where id = ? ',[$ed->Nome, $ed->Piso_min,$ed->Piso_max,$ed->Morada,$ed->date_in,$ed->date_out,$ed->id]);
        $this->SendMAIL($request,2);
        return redirect(REMAINADMIN5,303)->with('popup','Edificio Update');


}
$string="Erro exite um requisito que aborda o espacao temporal exterior ou piso nao valido ";
}

return  redirect()->back()->withErrors($string);
    }

public function check($ed,$edificio){
    $SALA =DB::select('select * from salas where id_edificio =? ', [$edificio]);
    if($SALA!=null){
    foreach( $SALA as $sala){
        if($sala->Piso<$ed->Piso_min||$ed->Piso_max<$sala->Piso ){
return FAlse;

        }
    }
    }
return True;
}
/**
     * check created to see if a vallidated atribute is null or not, if null then dont change if it isnt then alter the values
     *
     * @param  \Illuminate\Http\Request  $request values to check
     * @param  $ed old edificio to alter if $request isnt null
     * NO return because of altering arguments not returning results
     */
public function check2(Request $request,$ed){
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

}
/**
     * checked if there is a requisito that is active that is outside of the altered values of time in the updated edificio
     *
     * @param  $ed edificio updated
     * @param  $ed id of the edificio
     * @return TRUE if there isnt a requisito
     * @return False if there is a requisito that is outside of horario
     */
public function check3($ed,$edificio){

    $SALA =DB::select('select * from requisitos e, edificios f ,salas s where f.id= ? and f.id=s.id_edificio and s.id=e.id_Sala and e.date_in > NOW()', [$edificio]);
foreach($SALA as $sala){
    $aux2=new Carbon($sala->date_in);
    $aux2= $aux2->format(HOUR_FORMAT5);
   $aux=new Carbon($sala->date_in);
   $aux= $aux->format(HOUR_FORMAT5);
if($aux2<$ed->date_in ||$aux>$ed->date_in ){
return false;
}

}
return True;
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  $id identificador unico
     * @return redirect()->back()->with('popup','Edificio Delected'. $id);
     */
    public function destroy($id)
    {
$result = DB::table('edificios')->where('id',$id)->first();

if($result==null){

    return redirect()->back()->with('popup','Edificio NOT FOUND');
}

$this->SendMAIL($result,3);
$aux = DB::table('salas')->where('id_edificio',$id)->get();
foreach($aux as $sala ){
$aux2=DB::table('requisitos')->where('id_Sala',$sala->id)->get();
foreach($aux2 as $requi){
    DB::delete('delete from requisitos where id = ?', [$requi->id]);

}

DB::delete('delete from salas where id = ?', [$sala->id]);
}
DB::delete('delete from edificios where id = ?', [$id]);


        return redirect()->back(303)->with('popup','Edificio Delected'. $id);
    }
   /**
     * Handler of the mail that recebes a edificio and a mode to give the information in email and what time of email it is
     * @param  $edificio informação do edificio para display no email
     * @param  $mode mode que sera o tipo de mail que ira ser enviado
     */


    public function SendMAIL($edifio,$mode)
    {
     $utils=DB::table('utilizadors')->get();
       foreach($utils as $util){
        Mail::to($util->Email)->send(new NEWEDIFICIO($edifio,$mode));
       }
}
public function SendPDF()
{
$Edificios=Edificio::all();
$pdf=PDF::loadView('PDF.Edificiospdf', ['edificios' => $Edificios])->setOptions(['defaultFont' => 'sans-serif']);
return $pdf->stream('Edificios.pdf');

}
}
