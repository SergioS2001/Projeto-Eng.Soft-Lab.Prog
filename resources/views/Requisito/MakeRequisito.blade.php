@extends('Layouts.Model')

@section('Title')
Make Requisito
@endsection

@section('Content')
<div class ="Regis_log_form">
    <h1 class= "Title">
   Make Requisito
    </h1>
    <div class ="Regis_log_form_trex">
        <table>
            <caption>Tabela da Sala</caption>
         <thead>
<th id="id">Id</th>
<th id="Area">Area</th>
<th id="Piso">Piso</th>
<th id="Type">Type</th>
<th id="Descricao">Descricao</th>
<th id="id_edificio">id_edificio</th>
<th id="data_in">data_in</th>
<th id="data_out">data_out</th>
</thead>
         <tbody>
         <tr>
            <h5 class="Subtitle"><td>{{$salas->id}}</td><td>  {{$salas->Area}}</td><td>  {{$salas->Piso}} </td><td>  {{$salas->Type}}</td><td>{{$salas->Descricao}}</td><td> {{$salas->id_edificio}}</td><td> {{$date_in}}</td><td> {{$date_out}}</td></h5>
         </tr>
     </table>
        <div class="row">
<form action="/Requisito/Create/{{ $salas->id }}" method="GET">
    {{ method_field('GET') }}
    {{ csrf_field() }}
    <div class="Together">
    <div class="row">
        <div class="input-field col s6">
            <em class="material-icons prefix">I</em>
            <input class="top" name='date_in' type="datetime-local" >
        </div>

<div class='input-field col s6'>
    <em class='material-icons prefix'>F</em>
    <input class='top' name='date_out' type='datetime-local' >
</div>


        <div class="row">

            <fieldset id="group1">
                <legend>Hora desejada</legend>
                <p>
        <label>
            <input name="group1" type="radio" checked value="1"/>
            <span>1:00</span>
          </label>
        </p>
        <p>
          <label>
            <input name="group1" type="radio" value="2"/>
            <span>2:00</span>
          </label>
        </p>
        <p>
          <label>
            <input  name="group1" type="radio"  value="3"/>
            <span>3:00</span>
          </label>
        </p>
        </div>
    </fieldset>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="action">Create Requisito</button>
    </div>
</form>
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
                    echo session()->forget('popup');?>
             </h1>
         </ul>
     </div>
     @endif
        </div>
    </div>
    </div>

@endsection
