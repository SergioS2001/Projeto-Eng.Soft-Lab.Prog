@extends('Layout.Model')
@section('Title')
Registo
@endsection

@section('Content')
<div class ="Regis_log_form">
    <h1 class= "Title">
    Register Utilizador
    </h1>

    <div class="row">
        <form class="col s12" action ="" method="post" >

          <div class="row">
            <div class="input-field col s12">
                <em class="material-icons prefix">email</em>
              <input id="email" type="text" name="email" class="validate">
              <label for="email">Email</label>
              <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
            </div>
          </div>
          <div class="row">
          <div class="input-field col s12">
            <em class="material-icons prefix">people</em>
            <select name="type">
              <option value="Admin" id="OP-A">Admin</option>
              <option value="Docente" id="OP-D">Docente</option>
              <option selected="selected" value="Aluno" id="OP-A">Aluno</option>
            </select>
            <label>Type</label>
          </div>
        </div>


          <div class="row">
            <div class="input-field col s12">
                <em class="material-icons prefix">password</em>
              <input id="password" type="text" name="password" minlength="10"  class="validate" Password="*">
              <label for="password">Password</label>
            </div>

          </div>

          <div class="row">
            <div class="input-field col s12">
                <em class="material-icons prefix">password</em>
              <input id="Re-password" type="text"name="re-password" minlength="10"  class="validate">
              <label for="password">Re-Password</label>
            </div>

          </div>



                <input  type="submit"  value="Register" />




        </form>
        <div class="Subtitle">
        <a href="Login.html" >Login in</a>
      </div>




      </div>

      </div>



@endsection
