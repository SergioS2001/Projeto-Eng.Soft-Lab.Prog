@extends('Layouts.Model')

@section('Title')
Utilizador Information
@endsection

@section('Content')
<!--  Begin the form    -->
<div class="Regis_log_form">
    <!--  Creates what looks like margins in the form    -->
    <div class="Regis_log_form_trex">
         <!--  division with the table with salas     -->
        <div class="Left">

               <table>
                   <caption>Tabela do Utilizador</caption>
                <thead>
                   <th id="id">id</th>
                   <th id="Area">Nome</th>
                   <th id="Piso">Email</th>
                   <th id="id_edificio">Type</th>
</thead>
                <tbody>


               <ul class="list-group">
               <li class="list-group-item">
                <tr>
                   <h5 class="Subtitle"><td>{{ $util->id }} </td><td>  {{ $util->Nome }}</td><td>  {{ $util->Email }} </td><td> {{ $util->Type }}</td></h5>
                </tr>
                </li>
            </ul>
                </tbody>
            </table>
          <h4>Change Password</h4>
        <div class="border-lines">
            <form class="col s12" action ="/Utilizador/changeupdate" method="post" >
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="inborder-lines">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="Password" name ="Old_Password"  class="validate" Password="*">
                      <label for="password">OLD Password</label>
                    </div>

                  </div>
              <div class="row">
                <div class="input-field col s12">

                    <input id="password" type="Password" name ="New_Password"  class="validate" Password="*">
                  <label for="password">NEW Password</label>
                </div>

              </div>

              <div class="row">
                <div class="input-field col s12">

                    <input id="password" type="Password" name ="Re-password"  class="validate" Password="*">
                        <label for="password">Re-Password</label>
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
                    <input  type="submit"  value="Changed" />
                    </div>
                </div>
            </form>
        </div>
       </div>
    </div>
</div>


@endsection
