@extends('layouts.MAIL_MODEL')

@section('Title')
EDIFICIOS UPDATED
@endsection
@section('Title2')
EDIFICIOS UPDATED
@endsection
@section('Content')
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
    <ul class="list-group">

        <li class="list-group-item">
<tr>
            <h5 class="Subtitle"><td>{{$edificios->id}} </td><td> {{$edificios->Nome}} </td><td> {{$edificios->Piso_min}}</td><td> {{$edificios->Piso_max}}</td><td> {{$edificios->Morada}}</td><td>{{$edificios->date_in}} </td><td>{{$edificios->date_out}} </td></h5>
</tr>
         </li>



    </ul>


</tbody>
   </table>
@endsection
