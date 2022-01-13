
@extends('layouts.MAIL_MODEL')

@section('Title')
CHANGED PASSWORD
@endsection
@section('Title2')
CHANGED PASSWORD
@endsection
@section('Content')


{{ $Email }}, you have requested a password click here for a password , <a href="http://127.0.0.1:8000/Utilizador/Passwordrestet/{{$Email}}:{{ $token }}">Here</a>.

@endsection
