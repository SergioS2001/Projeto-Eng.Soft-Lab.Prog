<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TestController extends Controller
{
    public function Welcome(){
        return view('Welcome');

    }
    public function Registo(){
        return view('Registo');

    }
    public function LogI(){
        return view("logI");

    }
    public function Main(){

        return view('Main');

    }
    public function MakeRequisito($id){

        return view('MakeRequisito',["id"=>$id]);

    }
    public function updatesala($id){
        $result =DB::table('salas')->where('id',$id)->first();

        return view('sala.update',["salas"=>$result]);

    }
    public function updateedificio($id){

        $result =DB::table('edificios')->where('id',$id)->first();
        return view('edificio.update',["edificios"=>$result]);

    }
}
