@extends('layouts.Model')

@section('Title')
Update Sala {{ $salas->id }}
@endsection

@section('Content')
<div class="Regis_log_form">
    <div class="Regis_log_form_trex">
        <h1>
 Update sala

        </h1>
        <table>
            <caption>Tabela de Sala</caption>
         <thead>
<th id="id">Id</th>
<th id="Area">Area</th>
<th id="Piso">Piso</th>
<th id="Type">Type</th>
<th id="Descricao">Descricao</th>
<th id="id_edificio">id_edificio</th>
</thead>
         <tbody>
         <tr>
            <h5 class="Subtitle"><td>{{$salas->id}}</td><td>  {{$salas->Area}}</td><td>  {{$salas->Piso}} </td><td>  {{$salas->Type}}</td><td>{{$salas->Descricao}}</td><td> {{$salas->id_edificio}}</td></h5>
         </tr>
     </table>

     <form action="/Sala/updateput/{{ $salas->id }}/"method="post" >
        {{ method_field('PUT') }}
        {{ csrf_field() }}
     <table>
        <caption>Form de update de sala</caption>
     <thead>

<th id="Area">NEW Area</th>
<th id="Piso">NEW Piso</th>
<th id="Type">NEW Type</th>
<th id="NewDescricao">New Descricao</th>
<th id="id_edificio">NEW id_edificio</th>
</thead>
     <tbody>
     <tr>
        <h5 class="Subtitle"><td>  <input name='Area'></td><td>  <input name='Piso'> </td><td>  <input name='Type'> </td><td> <input name='Descricao'></td><td> <input name='Id_edificio'></td></h5>
     </tr>
 </table>

 <button class="btn waves-effect waves-light" type="submit" name="action">Update Sala</button>
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
