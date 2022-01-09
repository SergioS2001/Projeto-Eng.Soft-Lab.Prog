@extends('layouts.MAIL_MODEL')

@section('Title')
REQUISITOS DELETED
@endsection
@section('Title2')
REQUISITOS DELETED
@endsection
@section('Content')
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
                               <h5 class="Subtitle"><td>{{$requisito->id}}</td><td>  {{$requisito->id_Sala}}</td><td>  {{$requisito->id_Utilizador}} </td><td>  {{$requisito->date_in}}</td><td>{{$requisito->date_out}}</td></h5>
                            </tr>
                            </tbody>
                        </table>
                        @endsection
