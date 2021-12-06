@extends('Layout.Model')

@section('Title')
Salas
@endsection

@section('Content')
<div class ="Regis_log_form">
    <h1 class= "Title">
    Salas
    </h1>

    <ul class="list-group">
        @forelse($Sala as $Sala)
        <li class="list-group-item">
            <h5>{{$Sala->id}} - {{$Sala->}} - {{$student->lastName}}</h5>
        </li>
        @empty
        <h5 class="text-center">No Students Found!</h5>
        @endforelse
    </ul>

</div>
@endsection
