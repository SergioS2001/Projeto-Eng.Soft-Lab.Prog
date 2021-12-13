@extends('Layouts.Model')

@section('Title')
Salas
@endsection

@section('Content')
<div class ="Regis_log_form">
    <h1 class= "Title">
    Salas
    </h1>
    <ul class="list-group">
        @forelse($salas as $sala)
        <li class="list-group-item">
            <h5>{{$sala->id}} - {{$sala->Area}} - {{$sala->Piso}}- {{$sala->id_edificio}}</h5>
        </li>
        @empty

        <h5 class="text-center">No Salas Found!</h5>
        @endforelse
    </ul>
@endsection
