@extends('layouts.MAIL_MODEL')

@section('Title')
PDF
@endsection
@section('Title2')
PDF
@endsection
@section('Content')
<!--  Begin the form    -->
<div class="Regis_log_form">
    <!--  Creates what looks like margins in the form    -->
    <div class="Regis_log_form_trex">
         <!--  division with the table with salas     -->
        <div class="Left">

            <table>
                <caption>Tabela de Edificios</caption>
             <thead>
    <th id="id">Id</th>
    <th id="Nome">Nome</th>
    <th id="Piso_Min">Piso_Min</th>
    <th id="Piso_Max">Piso_Max</th>
    <th id="Morada">Morada</th>
    <th id="date_in">date_in</th>
    <th id="date_out">date_out</th>
    </thead>
    <tbody>

                       @forelse($edificios as $edificio)

    <tr>
                           <h5 class="Subtitle"><td>{{$edificio->id}} </td><td> {{$edificio->Nome}} </td><td> {{$edificio->Piso_min}}</td><td> {{$edificio->Piso_max}}</td><td> {{$edificio->Morada}}</td><td>{{$edificio->date_in}} </td><td>{{$edificio->date_out}} </td><td> </h5>
    </tr>

                       @empty

                       <h5 class="Subtitle">No Edificios Found!</h5>
                       @endforelse


    </tbody>

               </table>
        </div>
    </div>
</div>
            @endsection

