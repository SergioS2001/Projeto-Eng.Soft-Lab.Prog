
@extends('layouts.MAIL_MODEL')

@section('Title')
SALAS CRIADADAS
@endsection
@section('Title2')
SALAS CRIADADAS
@endsection
@section('Content')


<ul class="list-group">
    <table>
        <caption>Tabela de Salas</caption>
     <thead>
<th id="id">Id</th>
<th id="Area">Area</th>
<th id="Piso">Piso</th>
<th id="id_edificio">id_edificio</th>
<th id="Requisitar"> Requisitar</th>
</thead>
     <tbody>


    <li class="list-group-item">
     <tr>

        <h5 class="Subtitle"><td>{{$sala->id}} </td><td> {{$sala->Area}} </td><td> {{$sala->Piso}}</td><td> {{$sala->id_edificio}}</td></h5>


    </tr>
     </li>

 </table>
</ul>

@endsection
