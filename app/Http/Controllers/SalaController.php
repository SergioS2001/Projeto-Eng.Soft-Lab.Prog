<?php

namespace App\Http\Controllers;

use App\Mail\NEWSALA;
use App\Models\Edificio;
use App\Models\Sala;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
define("DATA_FORMAT","Y-m-d H:i:s");
define("HOUR_FORMAT","H:i:s");

define("REMAIN", "/Main");
define("REMAINADMIN", "Admin.AdminMain");
define("REMAINADMIN2", "/AdminMain");
/**
 *  *  class controler sala
 *     usamos este controller para gerir as funções necessarias para a criação, mostrar, editar ,delete de salas.
 *
 * @author <40115@ufp.edu.pt> Ruben Pinto <39836@ufp.edu.pt> Sérgio Sousa  ;
 */



class SalaController extends Controller
{
    /**
     * Display a listing on a table without pagination, all of salas with the option of make a requisito.
     * funcao correspodente para a view Main
     * @return view(REMAIN, ['salas' => $salas],['edificios' => $edificios]);
     */
    public function index()
    {

        session(['Pagenated' => 1]);
        $salas = Sala::sortable()->paginate(5);
        $edificios = Edificio::sortable()->paginate(5);
        return view(REMAIN, ['salas' => $salas], ['edificios' => $edificios]);
    }
      /**
     * Display a listing on a table with pagination, a limited numere of salas with the option of make a requisito.
     * @param numero numero de salas para display
     * @param numeroedificios numero de edificios para dispay se nao for valido chama-se a funcao index
     * funcao correspodente para a view Main
     * @return view(REMAIN, ['salas' => $salas],['edificios' => $edificios]);
     */
    public function index_num($numero,$numeroedificios)
    {
       if($numero<0||$numero==null||$numeroedificios<0||$numeroedificios==null){
       $this->index();
       }else{
        session(['Pagenated' => 1]);
        $salas = Sala::sortable()->paginate($numero);
        $edificios = Edificio::sortable()->paginate($numeroedificios);
        return view(REMAIN, ['salas' => $salas],['edificios' => $edificios]);
       }

    }
      /**
     * Display a listing on a table with pagination, a limited numere of salas with the option of make a requisito.
     * @param numero numero de salas para display
     * @param numeroedificios numero de edificios para dispay se nao for valido chama-se a funcao ADMINindex
     * funcao correspodente para a view AdminMain
     * @return  view(REMAINADMIN, ['salas' => $salas],['edificios' => $edificios]);
     */
    public function ADMINindex_num($numero,$numeroedificios)
    {
        if($numero<0||$numero==null||$numeroedificios<0||$numeroedificios==null){
            $this->ADMINindex();
            }else{
                session(['Pagenated' => 1]);
             $salas = Sala::sortable()->paginate($numero, ['*'], 'paramName');
             $edificios = Edificio::sortable()->paginate($numeroedificios, ['*'], 'param2Name');
             return view(REMAINADMIN, ['salas' => $salas],['edificios' => $edificios]);
            }

    }
    /**
     * Display a listing on a table without pagination, all of salas with the option of make a requisito.
     * funcao correspodente para a view AdminMain
     * @return view(REMAINADMIN, ['salas' => $salas],['edificios' => $edificios]);
     */
    public function ADMINindex()
    {
        session(['Pagenated' => 1]);
        $salas = Sala::sortable()->paginate(5);
        $edificios = Edificio::sortable()->paginate(5);
        return view(REMAINADMIN, ['salas' => $salas],['edificios' => $edificios]);
    }


    /**
     * private function to create a Sala from Request
     * @param Request parametro do tipo request para utilizar
     * @return sala Class sala com a informação para utilizar
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
     * Store a newly created resource in storage com validações normais para a estabilidade e logica da base de dados.
     *
     * @param  \Illuminate\Http\Request  $request do view da crição da sala apartir do form method PUT
     * @return  redirect()->back()->with('popup','Created sucessfully'); return successfull
     *
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
$this->SendMAIL($sala,1);

$sala->save();
return redirect()->back(303)->with('popup','Created sucessfully');

    }

    /**
     * Display the Information of the requisições of the selected sala atravez do seu identificador unico(id).
     *
     * @param    $id
     * @return view('sala.Requisito',["requisitos"=>$ed]);
     */
    public function show($id)
    {
        $ed=DB::table('requisitos')->where('id_Sala',$id)->get();

      return view('sala.Requisito',["requisitos"=>$ed]);
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
     * Update the specified resource in storage. apartir da informação da form
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sala  $sala
     * @return redirect(REMAINADMIN)->with('popup','Sala Update');
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
return redirect(REMAINADMIN2)->withErrors('Sala not existe or erro nos pisos');
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
        $this->SendMAIL($ed,2);
   return    redirect(REMAINADMIN2,303)->with('popup','Sala Update');

    }


    }
    return    redirect()->back()->withErrors('Edificio does not exist or the piso é errado');
}

    public function check($ed,$sala){
        $Edificio =DB::table('edificios')->where('id',$sala)->first();
    if($Edificio->Piso_min<=$ed->Piso && $Edificio->Piso_max>=$ed->Piso){
        DB::update('update salas  set Area = ? , Piso= ? ,id_edificio= ?  where id = ? ',[$ed->Area, $ed->Piso,$ed->id_edificio,$ed->id]);
        return True;
        }

return False;
    }

    /**
     * Remove the specified resource from storage apartir do indetificador unico
     *
     * @param  $id identificador unico
     * @return redirect()->back()->with('popup','Sala Delected'. $id); successfull delete
     */
    public function destroy($id)
    {
$aux = DB::table('salas')->where('id',$id)->get();
if($aux==null){

    return redirect()->back()->with('popup','Sala NOT FOUND');
}
$g=null;
foreach($aux as $sala){
$g=$sala;

}
$aux2=DB::table('requisitos')->where('id_Sala',$g->id)->get();
$this->SendMAIL($g,3);
foreach($aux2 as $requi){
    DB::delete('delete from requisitos where id = ?', [$requi->id]);

}

DB::delete('delete from salas where id = ?', [$id]);


        return redirect()->back(303)->with('popup','Sala Delected'. $id);
    }
  /**
     * Handler of the mail that recebes a Sala and a mode to give the information in email and what time of email it is
     *
     * @param  $sala informação da sala para display no email
     * @param  $mode mode que sera o tipo de mail que ira ser enviado
     *
     */

    public function SendMAIL($sala,$mode)
    {
     $utils=DB::table('utilizadors')->get();
       foreach($utils as $util){
        Mail::to($util->Email)->send(new NEWSALA($sala,$mode));
       }
}


}
