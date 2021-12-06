@extends('Layout.Model')

@section('Title')
Log In
@endsection

@section('Content')
<div class ="Regis_log_form">
    <h1 class= "Title">
   Log In Utilizador
    </h1>

    <div class="row">
        <form class="col s12" action ="post"method="post">
            {{ csrf_field() }}
          <div class="row">
            <div class="input-field col s12">
                <em class="material-icons prefix">email</em>
              <input id="email" type="email" class="validate">
              <label for="email">Email</label>
              <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
                <em class="material-icons prefix">password</em>
              <input id="password" type="password" minlength="10"  class="validate">
              <label for="password">Password</label>
            </div>

          </div>


          <div class="row" >
            <div class="input-field col s12">
                <div class="submitt">
                <input  type="submit"  value="Login" />
                </div>


            </div>


          </div>

        </form>
        <div class="Subtitle">
            <a href="{{url('/Registo' )}}" class="Subtitle" >Registar</a>
            </div>


      </div>

      </div>
@endsection
