@extends('layouts.Model')

@section('Title')
Update Requisito {{ $requisitos->id }}
@endsection

@section('Content')
<div class="Regis_log_form">
    <div class="Regis_log_form_trex">
        <h1>
 Update Requisito

        </h1>
        <table>
            <caption>Tabela de Requisito</caption>
         <thead>
<th id="id">Id</th>
<th id="Area">Id_Sala</th>
<th id="Piso">Id_Utilizador</th>
<th id="Type">Data In</th>
<th id="Descricao">Data_Out</th>
</thead>
         <tbody>
         <tr>
            <h5 class="Subtitle"><td>{{$requisitos->id}}</td><td>  {{$requisitos->id_Sala}}</td><td>  {{$requisitos->id_Utilizador}} </td><td>  {{$requisitos->date_in}}</td><td>{{$requisitos->date_out}}</td></h5>
         </tr>
         </tbody>
     </table>

     <form action="/Requisito/updateput/{{ $requisitos->id }}/"method="GET" >
        {{ method_field('Get') }}
        {{ csrf_field() }}
     <table>
        <caption>Form de update de Requisito</caption>
     <thead>

<th id="Data In">NEW Data In</th>
<th id="Data out">NEW Data Out</th>
<th id="Duration">NEW Duration</th>
</thead>
     <tbody>
     <tr>
        <h5 class="Subtitle"><td>  <input name='date_in' type="datetime-local"></td><td>  <input name='date_out'type="datetime-local"> </td><td>  <fieldset id="group1">
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

</fieldset></td></h5>
     </tr>
     </tbody>
 </table>

 <button class="btn waves-effect waves-light" type="submit" name="action">Update Requisito</button>
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

@endsection
