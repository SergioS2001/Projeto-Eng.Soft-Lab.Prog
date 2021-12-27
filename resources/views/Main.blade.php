@extends('Layouts.Model')

@section('Title')
Salas
@endsection

@section('Content')

<div class ="Regis_log_form">

    <div class ="Regis_log_form_trex">
          <div class='left'>
             Salas
             <ul class="list-group">
                <table>
                    <caption>Tabela de Salas</caption>
                 <thead>
 <th id="id">ID</th>
 <th id="Area">Area</th>
 <th id="Piso">Piso</th>
 <th id="id_edificio">id_edificio</th>
 <th id="Requesito">Requisito</th>
 </thead>
                 <tbody>

                @forelse($salas as $sala)
                <li class="list-group-item">
                 <tr>
                    <h5 class="Subtitle"><td>{{$sala->id}}</td><td>  {{$sala->Area}}</td><td>  {{$sala->Piso}} </td><td> {{$sala->id_edificio}}</td><td><a href="/Requisito/Make/{{$sala->id}}" >Requisitar</a></td></h5>
                 </tr>
                 </li>
                @empty

                <h5 class="Subtitle">No Salas Found!</h5>
                @endforelse
                 </tbody>
             </table>
            </ul>
        </div>
        <div class="tablespace">
            <div class="Right">
                Edificios
                <table>
                    <caption>Tabela de Edificios</caption>
                 <thead>
        <th id="id">ID</th>
        <th id="Nome">Nome</th>
        <th id="Piso_Min">Piso_Min</th>
        <th id="Piso_Max">Piso_Max</th>
        <th id="date_in">date_in</th>
        <th id="date_out">date_out</th>
        <th id="Morada">Morada</th>
        </thead>
        <tbody>
                       <ul class="list-group">
                           @forelse($edificios as $edificio)
                           <li class="list-group-item">
        <tr>
                               <h5 class="Subtitle"><td>{{$edificio->id}} </td><td> {{$edificio->Nome}} </td><td> {{$edificio->Piso_min}}</td><td> {{$edificio->Piso_max}}</td><td>{{$edificio->date_in}} </td><td>{{$edificio->date_out}} </td><td> {{$edificio->Morada}}</td></h5>
        </tr>
                            </li>
                           @empty

                           <h5 class="Subtitle">No Edificios Found!</h5>
                           @endforelse
                       </ul>

        </tbody>
                   </table>
        </div>
        </div>
    </div>

@endsection
