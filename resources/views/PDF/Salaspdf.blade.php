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
                   <caption>Tabela de Salas</caption>
                <thead>
<th id="id">Id</th>
<th id="Area">Area</th>
<th id="Piso">Piso</th>
<th id="id_edificio">id_edificio</th>

</thead>
<tbody>
    @forelse($Salas as $sala)
     <tr>
        <h5 class="Subtitle"><td>{{$sala->id}}</a></td><td>  {{$sala->Area}}</td><td>  {{$sala->Piso}} </td><td> {{$sala->id_edificio}}</td></h5>
     </tr>

    @empty

    <h5 class="Subtitle">No Salas Found!</h5>
    @endforelse


     </tbody>
            </table>
            @endsection

