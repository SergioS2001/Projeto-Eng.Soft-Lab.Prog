<?php

namespace App\Http\Controllers;
use App\Http\Controllers\SalaController;
use App\Models\Sala;
use Illuminate\Http\Request;

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

}
