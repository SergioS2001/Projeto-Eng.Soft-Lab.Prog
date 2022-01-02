<?php

namespace App\Http\Controllers;

use App\Mail\NEWEDIFICIO;
use App\Models\Edificio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
        $edificio->date_in=$request->date_in;
        $edificio->date_out=$request->date_out;
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
        return redirect(REMAINADMIN)->with('popup','Edificio Update');


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
public function check3($ed,$edificio){
    $SALA =DB::select('select e.id from requisitos e, edificios f ,salas s where f.id=? and f.id=s.id_edificio and s.id_edificio=e.id_edificio and e.data_out > NOW() and e.data_in< ? and e.data_out>? ', [$edificio,$ed->data_in,$ed->data_out]);
echo $SALA['id'];
 if($SALA['id']!=null){
    return false;
    }
return True;
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Edificio  $edificio
     * @return \Illuminate\Http\Response
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


        return redirect()->back()->with('popup','Edificio Delected'. $id);
    }
    public function SendMAIL($edifio,$mode)
    {
     $utils=DB::table('utilizadors')->get();
       foreach($utils as $util){
        Mail::to($util->Email)->send(new NEWEDIFICIO($edifio,$mode));
       }
}

}
