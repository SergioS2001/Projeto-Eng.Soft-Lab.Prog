<?php

namespace App\Http\Controllers;

use App\Mail\NEWREQUISITO;
use App\Models\Requisito;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;
use DateTime;

use function PHPUnit\Framework\isEmpty;

define("SHOW", "Requisito.Index");
define("DATA_FORMAT3","Y-m-d H:i:s");
define("HOUR_FORMAT3","H:i:s");
define("REMAIN3", "/Main");
 /**
     * Requisito controller that stores the methods that with interact with the database
     * @author <40115@ufp.edu.pt> Ruben Pinto <39836@ufp.edu.pt> Sérgio Sousa  ;
     */
class RequisitoController extends Controller
{
   /**
     * Display a listing on a table without pagination, all of the requisitos of the utilizador
     * funcao correspodente para a view Requisito.index
     * @return view(SHOW, ['requisitos' => $requisito]);
     */
    public function index()
    {
        session(['Pagenated_Requisito' => 0]);

        $requisito= Requisito::all();
        $requisito =  $requisito->filter( function( $requisito) {
            $util=session()->get('utilizadors');
            if ( $requisito->id_Utilizador==$util->id) {
                return true;
            }
            return false;
  });
        return view(SHOW, ['requisitos' => $requisito]);


    }
      /**
     * Display a listing on a table with pagination, a limited numere of requisitos with the option of update or delete.
     * @param numero numero de requisito para display
     * @return view(SHOW, ['requisitos' => $requisito]);
     */
    public function indexnumb($numero)
    {
   if($numero<0||$numero==null){
            $this->index();
            }else{
                session(['Pagenated_Requisito' => 1]);
                $util=session()->get('utilizadors');
             $requisito= Requisito::all()->append($util->id);
             $requisito =  $requisito->filter( function( $requisito) {
                $util=session()->get('utilizadors');
                if ( $requisito->id_Utilizador==$util->id) {
                    return true;
                }
                return false;
      });
      $requisito->paginate($requisito, ['*'], 'param3Name');
             return view(SHOW, ['requisitos' => $requisito]);
            }
    }

     /**
     * Display information of sala and a form to create a requisito
     * @param id numero de sala para display informacao basica do mesmo e o horario disponivel do edificio
     * @return view(SHOW, ['requisitos' => $requisito]);
     */
    public function MakeRequisito($id){
        $result =DB::table('salas')->where('id',$id)->first();

        $ed=DB::table('edificios')->where('id',$result->id_edificio)->first();

        if($result!=null && $ed!=null){
        return view('Requisito.MakeRequisito',["id"=>$id,"salas"=>$result,"date_in"=>$ed->date_in,"date_out"=>$ed->date_out]);
        }
        return redirect(REMAIN3)->withErrors('ERRo edificio or Sala doesnt exist');

    }
    /**
      * private function to create a Requisto apartir de Um Request
     *@param request request que ira ser utilizado para transferir a classe requisito
     * @return $requisito
     */
    public function create($request,$some)
    {
        $requisito=new Requisito();
        $requisito->id_Sala=$some;
        $uti=session()->get('utilizadors');
        $requisito->id_Utilizador=$uti->id;
        $requisito->date_in=$request->date_in;
        $requisito->date_out=$request->date_out;
        return $requisito;
    }

    /**
     * Valida o request ,com a sala para ver se é possivel com o horario do edificio e se não exister sobrepossição
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   $idsala identificador unico da sala que estamos a tentar requisitar
     * @return redirect(REMAIN)->with('popup','Requisito feito'); normal succefull
     *
     */
    public function store(Request $request, $idsala)
    {
        $request->validate([
            'date_in' => 'date|required|after:now',//now()
            'date_out' => 'date|after:date_in|required',
            'group1' => 'required|integer',
        ]);
        $request->only( 'date_in','date_out','group1');
        $ed=DB::table('salas')->where('id',$idsala)->first();
        $ed1=DB::table('edificios')->where('id',$ed->id_edificio)->first();
        if($ed1==null){
return redirect(REMAIN3)->withErrors('Erro: Sala or Edificio is not found, refresh');
        }
        $aux2=new Carbon($request->date_in);
        $aux2= $aux2->format(HOUR_FORMAT3);
       $aux=new Carbon($request->date_out);
       $aux= $aux->format(HOUR_FORMAT3);
if(($request->group1>0 && $request->group1<4)&&($aux2>$ed1->date_in &&$aux < $ed1->date_out &&$request->date_in>now()) ){
    $re0=Carbon::parse($request->date_in)->format(DATA_FORMAT3);
     $re=Carbon::parse($request->date_in)->addHours($request->group1)->format(DATA_FORMAT3);
     $re2=Carbon::parse($request->date_out)->format(DATA_FORMAT3);
  if($re==$re2){
    $ed=DB::table('requisitos')->where('date_out', '>', $re0)->where('date_in', '<', $re2)->where('id_Sala',$idsala)->get();
    $util=session()->get('utilizadors');
    if(count($ed)==0){
        $requisito=$this->create($request,$idsala);
        Mail::to($util->Email)->send(new NEWREQUISITO($util,$requisito,1));
$requisito->save();
return redirect(REMAIN3,303)->with('popup','Requisito feito');
    }else{ if($util->Type=='Aluno'){
        return redirect()->back()->withErrors('Erro datas incio e fim esta em violaçao com outro requisito');
    }
        else{
            foreach($ed as $req){
$this->destroy($req->id);

            }
            $requisito=$this->create($request,$idsala);
            Mail::to($util->Email)->send(new NEWREQUISITO($util,$requisito,1));
            $requisito->save();
return redirect(REMAIN3,303)->with('popup','Overwrite done');
        }

    }
  }

}

return redirect()->back()->withErrors('Erro datas incio e fim não são espaciadas com a duracao');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requisito  $requisito
     * @return \Illuminate\Http\Response
     */
    public function show(Requisito $requisito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requisito  $requisito
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisito $requisito)
    {
        //
    }

   /**
     * Valida o request ,com o id do reuisito para atualizar, e se existe sobrepossição
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   $idsala identificador unico da sala que estamos a tentar requisitar
     * @return redirect(REMAIN)->with('popup','Requisito feito'); normal succefull
     *
     */
    public function update(Request $request, $idrequisto)
    {
        $request->validate([
            'date_in' => 'date|required',
            'date_out' => 'date|after:date_in|required',
            'group1' => 'required|integer',
        ]);
        $request->only( 'date_in','date_out','group1');
        $requist=DB::table('requisitos')->where('id',$idrequisto)->first();
        $ed=DB::table('salas')->where('id',$requist->id_Sala)->first();
        $util=DB::table('utilizadors')->where('id',$requist->id_Utilizador)->first();
        $ed1=DB::table('edificios')->where('id',$ed->id_edificio)->first();
        if($ed1==null ||$util==null){
return redirect(REMAIN3)->withErrors('Erro: Sala or Edificiois not found, refresh or the utilizador is not right ');
        }
        $aux2=new Carbon($request->date_in);
        $aux2= $aux2->format(HOUR_FORMAT3);
       $aux=new Carbon($request->date_out);
       $aux= $aux->format(HOUR_FORMAT3);
       if(($request->group1>0 && $request->group1<4)&&($aux2>$ed1->date_in &&$aux < $ed1->date_out &&$request->date_in>now())){
        $re0=Carbon::parse($request->date_in)->format(DATA_FORMAT3);
         $re=Carbon::parse($request->date_in)->addHours($request->group1)->format(DATA_FORMAT3);
         $re2=Carbon::parse($request->date_out)->format(DATA_FORMAT3);
      if($re==$re2){
        $ed=DB::table('requisitos')->where('date_out', '>', $re0)->where('date_in', '<', $re2)->where('id_Sala',$requist->id_Sala)->where('id_Utilizador','!=',$util->id)->get();

        if(count($ed)===0){

            $requisito=$this->create($request,$requist->id_Sala);

        DB::update('update requisitos  set date_in = ? , date_out= ? where id = ? ',[$request->date_in, $request->date_out,$request->id]);
       Mail::to($util->Email)->send(new NEWREQUISITO($util,$requisito,2));

    return redirect(REMAIN3)->with('popup','Requisito Updated');
        }else{
            if($util->Type=='Aluno'){
                return redirect()->back()->withErrors('Erro datas incio e fim esta em violaçao com outro requisito' );
            }
                else{

                    foreach($ed as $req){
        $this->destroy($req->id);

                    }
                    $requisito=$this->create($request,$requist->id_Sala);
                    Mail::to($util->Email)->send(new NEWREQUISITO($util,$requisito,1));
                    $requisito->save();
        return redirect(REMAIN3)->with('popup','Overwrite done');
                }


        }
      }

    }

    return redirect()->back()->withErrors('Erro datas incio e fim não são espaciadas com a duracao');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id requisito para remover
     * @return redirect()->back()->with('popup','Requisito Delected'. $id);
     */
    public function destroy($id)
    {
        $result =DB::table('requisitos')->where('id',$id)->first();
        $util=DB::table('utilizadors')->where('id',$result->id_Utilizador)->first();

        if($result==null||$util==null){

            return redirect(REMAIN3)->with('popup','Requisito NOT FOUND');
        }


        DB::delete('delete from requisitos where id = ?', [$id]);
        Mail::to($util->Email)->send(new NEWREQUISITO($result->id_Utilizador,$result,3));
                return redirect(303)->back()->with('popup','Requisito Delected'. $id);
    }
}
