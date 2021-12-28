<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use App\Models\Sala;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\True_;

define("REMAIN", "/Main");
define("REMAINADMIN", "Admin.AdminMain");
class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        session(['Pagenated' => 0]);
        $salas = Sala::all();
        $edificios = Edificio::all();
        return view(REMAIN, ['salas' => $salas],['edificios' => $edificios]);


    }
    public function index_num($numero,$numeroedificios)
    {

       if($numero<0||$numero==null||$numeroedificios<0||$numeroedificios==null){
       $this->index();
       }else{
        session(['Pagenated' => 1]);
        $salas = Sala::paginate($numero);
        $edificios = Edificio::paginate($numeroedificios);
        return view(REMAIN, ['salas' => $salas],['edificios' => $edificios]);


       }

    }
    public function ADMINindex_num($numero,$numeroedificios)
    {
        if($numero<0||$numero==null||$numeroedificios<0||$numeroedificios==null){
            $this->ADMINindex();
            }else{
                session(['Pagenated' => 1]);
             $salas = Sala::paginate($numero, ['*'], 'paramName');
             $edificios = Edificio::paginate($numeroedificios, ['*'], 'param2Name');
             return view(REMAINADMIN, ['salas' => $salas],['edificios' => $edificios]);
            }

    }
    public function ADMINindex()
    {
        session(['Pagenated' => 0]);
        $salas = Sala::all();
        $edificios = Edificio::all();
        return view(REMAINADMIN, ['salas' => $salas],['edificios' => $edificios]);
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
        'Descricao' => 'string|required|max:200|min:20',

    ]);
    $request->only( 'id_edificio','Piso','Type','Descricao','Area');
    $ed=DB::table('edificios')->where('id',$request->id_edificio)->first();
    if($ed==null){

        return redirect()->back()->withErrors('Edificio doesnt exist');

    }
  if($ed->Piso_min > $request->Piso ||$ed->Piso_max < $request->Piso){

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
    public function update(Request $request, $sala)
    {

        $request->validate([
            'Id_edificio' => 'exists:edificios,id|nullable',
            'Piso' => 'integer|nullable',
            'Type' => 'string |nullable',
            'Area' => 'numeric|nullable',
            'Descricao' => 'string|max:200|nullable',

        ]);

        $request->only( 'Id_edificio','Piso', 'Type','Area','Descricao');
        $ed=DB::table('salas')->where('id',$sala)->first();


if($ed==null ){
return redirect(REMAINADMIN)->withErrors('Sala not existe or erro nos pisos');
}else{
if($request->Id_edificio!=null){
$ed->id_edificio=$request->Id_edificio;
}
if($request->Piso!=null){
    $ed->Piso=$request->Piso;
    }

    if($request->Type!=null){
        $ed->Type=$request->Type;
        }

if($request->Area!=null){
    $ed->Area=$request->Area;
    }
    if($request->Descricao!=null){
        $ed->Descricao=$request->Descricao;
        }

    if($this->check($ed,$ed->id_edificio)){
   return    redirect(REMAINADMIN)->with('popup','Sala Update');

    }


    }
    return    redirect()->back()->withErrors('Edificio does not exist or the piso é errado');
}

    public function check($ed,$sala){
        $Edificio =DB::table('edificios')->where('id',$sala)->first();
if($Edificio!=null ){
    if($Edificio->Piso_min>=$ed->Piso ||$Edificio->Piso_max<=$ed->Piso){
        DB::update('update salas  set Area = ? , Piso= ? ,id_edificio= ?  where id = ? ',[$ed->Area, $ed->Piso,$ed->id_edificio,$ed->id]);
        return True;
        }


}

return False;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
$result =DB::select('select id from salas where id =? ', [$id]);
if($result==null){

    return redirect()->back()->with('popup','Sala NOT FOUND');
}
DB::delete('delete from salas where id = ?', [$id]);


        return redirect()->back()->with('popup','Sala Delected'. $id);
    }
}
