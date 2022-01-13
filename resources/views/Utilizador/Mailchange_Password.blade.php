
@extends('layouts.MAIL_MODEL')

@section('Title')
CHANGED PASSWORD
@endsection
@section('Title2')
CHANGED PASSWORD
@endsection
@section('Content')


{{ $util->Nome }}, you have changed your password,if you want to change your password again <a href="http://127.0.0.1:8000/Utilizador/Show">Here</a>.

@endsection
