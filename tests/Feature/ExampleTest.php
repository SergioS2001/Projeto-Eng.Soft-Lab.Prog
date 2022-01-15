<?php

namespace Tests\Feature;

use App\Models\Utilizador;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Edificio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ExampleTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');
        $response->assertStatus(200);


    }
 /**
     * @test
     */
    public function test1()
    {

       $this->get('/AdminMain')
      ->assertRedirect('/logI');

    }

    public function test2()
    {
        $Utilizador=new Utilizador();
        $Utilizador->Nome= 'NAme';
        $Utilizador->Type= 'Aluno';
        $Utilizador->Email= 'rubbbbb@gmail.com';
        $Utilizador->Password=bcrypt('passworld');
     $this->withSession(array('utilizadors'=>$Utilizador))->get('/Main')->assertStatus(200);
    }
    public function test3()
    {
        $Utilizador=new Utilizador();
        $Utilizador->Nome= 'NAme';
        $Utilizador->Type= 'Admin';
        $Utilizador->Email= 'rubbbbb@gmail.com';
        $Utilizador->Password=bcrypt('passworld');
          $this->withSession(array('utilizadors'=>$Utilizador))->get('/AdminMain')->assertStatus(200);
    }

    public function test5()
    {


        $Utilizador=new Utilizador();
        $Utilizador->id=1;
        $Utilizador->Nome= 'Admin123';
        $Utilizador->Type= 'Admin';
        $Utilizador->Email= 'Admin@gmail.com';
        $Utilizador->Password=bcrypt('passworld');
          $this->withSession(array('utilizadors'=>$Utilizador))->post('Edificio/store',array('Nome'=>'NOMMMMMMMMMMMME','Min_Piso'=>-20,'Max_Piso'=>10,'Morada'=>'DESSSSSSSSSSSSSSSSSSSSSSSSdddddddddSSSSSD','date_in'=>'10:00','date_out'=>'19:00'))->assertStatus(303);
    }
    public function test4()
    {
        $Utilizador=new Utilizador();
        $Utilizador->id=1;
        $Utilizador->Nome= 'Admin123';
        $Utilizador->Type= 'Admin';
        $Utilizador->Email= 'Admin@gmail.com';
        $Utilizador->Password=bcrypt('passworld');
        $sala=DB::table('edificios')->first();
          $this->withSession(array('utilizadors'=>$Utilizador))->post('/Sala/store',array('id_edificio'=>$sala->id,'Piso'=>1,'Type'=>'SALAS SALAS SALS','Area'=>80,'Descricao'=>'DESSSSSSSSSSSSSSSSSSSSSSSSSSSSSD'))->assertStatus(303);
    }
    public function test6()
    {


        $Utilizador=new Utilizador();
        $Utilizador->id=1;
        $Utilizador->Nome= 'Admin123';
        $Utilizador->Type= 'Admin';
        $Utilizador->Email= 'Admin@gmail.com';
        $Utilizador->Password=bcrypt('passworld');
        $f=DB::table('salas')->first('id');
        $string="/Requisito/Create/".$f->id."?date_in=2022-01-20 16:00:00&date_out=2022-01-20 17:00:00&group1=1";
          $this->withSession(array('utilizadors'=>$Utilizador))->get($string)->assertStatus(303);
    }
    public function test7()
    {


        $Utilizador=new Utilizador();
        $Utilizador->id=1;
        $Utilizador->Nome= 'Admin123';
        $Utilizador->Type= 'Admin';
        $Utilizador->Email= 'Admin@gmail.com';
        $Utilizador->Password=bcrypt('passworld');
        $ff=DB::table('edificios')->first();
        $f="/Edificio/Delete/". $ff->id;
          $this->withSession(array('utilizadors'=>$Utilizador))->get($f)->assertStatus(303);
    }
    public function test8()
    {


        $Utilizador=new Utilizador();
        $Utilizador->id=1;
        $Utilizador->Nome= 'Admin123';
        $Utilizador->Type= 'Admin';
        $Utilizador->Email= 'Admin@gmail.com';
        $Utilizador->Password=bcrypt('passworld');
        $ff=DB::table('salas')->first();
        $f="/Sala/Delete/". $ff->id;
          $this->withSession(array('utilizadors'=>$Utilizador))->get($f)->assertStatus(303);
    }
    public function test9()
    {

          $this->post("/Utilizador/store",['Nome'=>'aaaaaaaaaaaa','Type'=>'Aluno','Email'=>'rrrrrrrrrrrrrr@gmail.com','Password'=>'PASSSWWWOORDD','Re-password'=>'PASSSWWWOORDD'])->assertStatus(303);
    }
    public function test10()
    {

          $this->post("/Utilizador/Log_In",['Email'=>'rrrrrrrrrrrrrr@gmail.com','Password'=>'PASSSWWWOORDD'])->assertStatus(303);
    }
}
