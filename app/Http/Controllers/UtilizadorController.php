<?php

namespace App\Http\Controllers;

use App\Mail\ChangePassword;
use App\Mail\ResetPassword;
use App\Models\Utilizador;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
define("REMAIN13", "/Main");
define("REMAINADMIN13", "/AdminMain");
define("LOGIN", "/logI");
define("DATA_FORMAT13","Y-m-d H:i:s");
define("HOUR_FORMAT13","H:i:s");
define("PASSWORD_FORMAT13","required|string|min:8|max:20");
/**
 *  *  class controler Utilizador
 *     usamos este controller para gerir as funções necessarias para a criação, mostrar, editar ,delete de  Utilizador.
 *
 * @author <40115@ufp.edu.pt> Ruben Pinto <39836@ufp.edu.pt> Sérgio Sousa  ;
 */
class UtilizadorController extends Controller
{

     /**
     * Display a listing of the resource.(NOT IMPLEMENTED)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Utilizador = Utilizador::paginate(5);
        return view('Utilizador/Index', ['utilizador' => $Utilizador]);
    }

    /**
     * Show the form for creating a new resource.(NOT IMPLEMENTED)
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Utilizador/create');
    }

    /**
     * Receve um Request pelo metodo post para registar um utilizador com os requisitos minimos
     *
     * @param  \Illuminate\Http\Request  $request from the Register view that will have the basic user information to validate and create a Utilizador
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $v = Validator::make([], []);
            $request->validate([
            'Nome' => 'required|min:8|max:50|string ',
            'Type' => 'required',
            'Email' => 'required |email|unique:utilizadors',
            'Password' => PASSWORD_FORMAT13,
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

if( $Utilizador->Type =='Admin'){

    return redirect(REMAINADMIN13,303);
}
return redirect(REMAIN13,303);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Utilizador  $utilizador
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
$utilizador=session()->get('utilizadors');
        return view('Utilizador.show', ['util' => $utilizador]);
    }


    /**
     * LOG IN function to verify that the email and passsword match and create a sesson for the user
     *
     * @param  \Illuminate\Http\Request $request with email and password
     * @return \Illuminate\Http\Response
     */
    public function Log_In(Request $request){

        $request->validate([
        'Email' => 'required |email',
        'Password' => PASSWORD_FORMAT13,

    ]);

    $request->only( 'Email','Password');
    $Utilizador=DB::table('utilizadors')->where('Email',$request->Email)->first();
    if($Utilizador!=null && Hash::check($request->Password, $Utilizador->Password)){
        session(['utilizadors' => $Utilizador]);
        if( $Utilizador->Type=='Admin'){

            return redirect(REMAINADMIN13,303);
        }
        return Redirect(REMAIN13,303);



}
return redirect()->back()->withErrors('Email doesnt exist or password doesnt match');

    }

    /**
     * LOG OUT function to forget the seasson and log out the user
     *
     *
     * @return \Illuminate\Http\Response goes back
     */
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
     * Update the specified resource in storage. (NOT IMPLEMENTED)
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


        return redirect(REMAIN13)->withHeaders('Successfull');
    }
/** Function that recieves the current password and the new password with the confirmation and checks if it is current and in the right formatt
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */


    public function change_Password(Request $request)
    {
        $request->validate([
            'Old_Password' => PASSWORD_FORMAT13,
            'New_Password' => PASSWORD_FORMAT13,
            'Re-password' => 'required|same:New_Password',
        ]);
        $request->only( 'Old_Password','New_Password','Re-password');
        $util=session()->get('utilizadors');
        if(Hash::check($request->Old_Password, $util->Password)){
            $Password=bcrypt($request->New_Password);
            $util->Password=$Password;
            DB::update('update utilizadors  set Password = ?  where id = ? ',[$Password,$util->id]);
            session(['utilizadors' => $util]);
            Mail::to($util->Email)->send(new ChangePassword($util));
         return    redirect('/Main')->with('popup','PasswordChanged');
        }
       return redirect('/Utilizador/Show')->withErrors('Erro password not match');
    }


/** Function that display the email request view
 *
 *
 * @return view
 */


    public function VIEW_EMAIL(){
return view('Utilizador.Email_view');
    }

/** Function that recieves the email, validates it , checks if it exists and creates a token and sends an email with the email and token to reset the password
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function forget_Password(Request $request){
        $request->validate([
            'Email' => 'email|required|',
        ]);

$util=DB::table('utilizadors')->where('Email',$request->Email)->get()->first();

if($util==null){
return redirect()->back()->withErrors('ERRO Email doesnt exist');
}

$token=0;
for($i=0;$i<10;$i++){
$token=$token*random_int(2,9)+random_int(2,9);
}


DB::insert('insert into password_resets(email,token,created_at) values(?,?,?)',[$request->Email,$token,now()]);
Mail::to($request->Email)->send(new ResetPassword($request->Email,$token));
return redirect(LOGIN)->with('popup','Check Email');
    }

/** Function that recieves the email, token and checks if it exists, if it doesnt it goes to logi page to warn the user its no valid, if it does it return the view to intruduce the password
 *
 * @param  Email the email
 * @param  token that was generated before
 * @return \Illuminate\Http\Response
 */
    public function forget_Password_commit($Email,$token){

   $result=DB::table('password_resets')->where('email',$Email)->where('token',$token);
if($result==null){

return redirect(LOGIN)->withErrors('ERRO LINK NOT VALID');

}
return view('Utilizador.ConformPassword',['Email'=>$Email,'token'=>$token]);

    }
/** Function that recieves the password and the confirmation to it and updates it and removes the token that in the database to invalidate the links
 *
 * @param  \Illuminate\Http\Request  $request password and confirm password
 * @param  Email the email
 * @param  token that was generated before
 * @return \Illuminate\Http\Response
 */
    public function Password_confirm(Request $request,$Email,$token){

        $request->validate([
            'New_Password' => PASSWORD_FORMAT13,
            'Re-password' => 'required|same:New_Password',
        ]);
        $request->only(  'New_Password', 'Re-password');
        $result=DB::table('password_resets')->where('email',$Email)->where('token',$token)->get()->first();
        if($result==null){

        return redirect(LOGIN)->withErrors('ERRO LINK NOT VALID');

        }
        DB::delete('delete from password_resets where email = ? ', [$Email]);
        $Password=bcrypt($request->New_Password);
        DB::update('update utilizadors  set Password = ?  where Email= ? ',[$Password,$Email]);
        $util=DB::table('Utilizadors')->where('email',$Email)->get()->first();

        Mail::to($Email)->send(new ChangePassword($util));
return redirect(LOGIN)->with('popup','Insert New Password');

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
        return redirect(REMAIN13)->withHeaders('Utilizador Delected');
    }
}
