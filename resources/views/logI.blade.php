@extends('Layouts.Model')

@section('Title')
Log In
@endsection

@section('Content')
<div class ="Regis_log_form">
    <h1 class= "Title">
   Log In Utilizador
    </h1>
    <div class ="Regis_log_form_dux">
    <div class="row">
        <form class="col s12" action ="Utilizador/Log_In"method="post">
            {{ csrf_field() }}
          <div class="row">
            <div class="input-field col s12">
                <em class="material-icons prefix">email</em>
              <input id="email" type="email" class="validate" name ="Email">
              <label for="email">Email</label>
              <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
                <em class="material-icons prefix">password</em>
              <input id="password" type="Password" name ="Password"  class="validate" Password="*">
              <label for="password">Password</label>
            </div>

          </div>
          @if (session()->has('popup'))
          <div class="alert alert-danger">
              <ul>

              <?php  echo session()->get('popup');
             session()->forget('popup');
              ?>

              </ul>
          </div>
      @endif
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

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
      </div>
@endsection
