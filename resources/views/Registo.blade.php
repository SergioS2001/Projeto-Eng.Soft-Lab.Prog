@extends('Layouts.Model')

@section('Title')
Registo
@endsection

@section('Content')
<div class ="Regis_log_form">
    <h1 class= "Title">
    Register Utilizador
    </h1>
    <div class ="Regis_log_form_trex">



        <form class="col s12" action ="Utilizador/store" method="post" >
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12">
                    <em class="material-icons prefix">email</em>
                  <input  type="text" name="Nome" class="validate">
                  <label for="Nome">Nome</label>
                    </div>
              </div>
          <div class="row">
            <div class="input-field col s12">
                <em class="material-icons prefix">email</em>
              <input id="Email" type="text" name="Email" class="validate">
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
          <div class="input-field col s12">
            <em class="material-icons prefix">people</em>
            <select name="Type">
              <option value="Admin" id="OP-A">Admin</option>
              <option value="Docente" id="OP-D">Docente</option>
              <option selected="selected" value="Aluno" id="OP-a">Aluno</option>
            </select>
            <label>Type</label>
          </div>
        </div>


          <div class="row">
            <div class="input-field col s12">
                <em class="material-icons prefix">password</em>
                <input id="password" type="Password" name ="Password"  class="validate" Password="*">
              <label for="password">Password</label>
            </div>

          </div>

          <div class="row">
            <div class="input-field col s12">
                <em class="material-icons prefix">password</em>
                <input id="password" type="Password" name ="Re-password"  class="validate" Password="*">          <label for="password">Re-Password</label>
            </div>

          </div>

          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      @if (session()->has('popup'))
      <div class="alert alert-danger">
          <ul>
              <h1>
          <?php  echo session()->get('popup');
          echo session()->forget('popup');
          ?>
          </h1>
          </ul>
      </div>
  @endif
                <div class="Subtitle">
                <input  type="submit"  value="Register" />

                <div>


        </form>
        <div class="Subtitle">
            <a href="{{url('/logI' )}}" class="Subtitle" >Log In</a>
            </div>








    </div>
</div>



@endsection
