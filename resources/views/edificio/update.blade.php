@extends('layouts.Model')

@section('Title')
Update Edificio {{ $edificios->id }}
@endsection

@section('Content')
<div class="Regis_log_form">
    <div class="Regis_log_form_trex">
        <h1>
 Update Edificio

        </h1>
        <table>
            <caption>Tabela de Sala</caption>
         <thead>
<th id="id">Id</th>
<th id="Nome">Nome</th>
<th id="Piso_Min">Piso_Min</th>
<th id="Piso_Max">Piso_Max</th>
<th id="Morada">Morada</th>
</thead>
         <tbody>
         <tr>
            <h5 class="Subtitle"><td>{{$edificios->id}}</td><td>  {{$edificios->Nome}}</td><td>  {{$edificios->Piso_min}} </td><td>  {{$edificios->Piso_max}}</td><td>{{$edificios->Morada}}</td></h5>
         </tr>
     </table>
     <form action="/Edificio/updateput/{{ $edificios->id }}/"method="post" >
        {{ method_field('PUT') }}
        {{ csrf_field() }}
     <table>
        <caption>Form de update de Edificio</caption>
     <thead>

<th id="Area">NEW Nome}</th>
<th id="Piso">NEW Piso_Min</th>
<th id="Type">NEW Piso_Max</th>
<th id="NewDescricao">New Morada</th>
<th id="date_in">Date In</th>
<th id="date_out">Date Out</th>
</thead>
     <tbody>
     <tr>
        <h5 class="Subtitle"><td>  <input name='Nome' type="text"></td><td>  <input name='Min_Piso' type="number"> </td><td>  <input name='Max_Piso' type="number"> </td><td> <input name='Morada' type="text"></td><td> <input name='date_in' type="time"></td><td> <input name='date_out' type="time"></td></h5>
     </tr>
 </table>
 <br>

 <button class="btn waves-effect waves-light" type="submit" name="action">Update Edificio</button>
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
    </div>
    </div>

@endsection
