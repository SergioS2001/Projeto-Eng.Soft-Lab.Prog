@extends('Layouts.Model')

@section('Title')
Salas
@endsection

@section('Content')
<div class="Regis_log_form">
    <div class="Regis_log_form_dux">

        <div class="Left">
           <ul class="list-group">
               <table>
                   <caption>Tabela de Salas</caption>
                <thead>
<th id="id">Id</th>
<th id="Area">Area</th>
<th id="Piso">Piso</th>
<th id="id_edificio">id_edificio</th>
<th id="Requisitar"> Requisitar</th>
</thead>
                <tbody>

               @forelse($salas as $sala)
               <li class="list-group-item">
                <tr>
                   <h5 class="Subtitle"><td>{{$sala->id}}</td><td>  {{$sala->Area}}</td><td>  {{$sala->Piso}} </td><td> {{$sala->id_edificio}}</td><td>   <a href="/Requisito/Make/{{ $sala->id }}}">Make Requisito</a></td></h5>
                </tr>
                </li>
               @empty

               <h5 class="Subtitle">No Salas Found!</h5>
               @endforelse
                </tbody>
            </table>
           </ul>
           @if(session()->get('Pagenated')==1)
           {{ $salas->links() }}
           @endif
       </div>
       <div class="tablespace">
           <div  class="Right">
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
                   @forelse($edificios as $edificio)
                   <li class="list-group-item">
<tr>
                       <h5 class="Subtitle"><td>{{$edificio->id}} </td><td> {{$edificio->Nome}} </td><td> {{$edificio->Piso_min}}</td><td> {{$edificio->Piso_max}}</td><td> {{$edificio->Morada}}</td><td>{{$edificio->date_in}} </td><td>{{$edificio->date_out}} </td><td> </h5>
</tr>
                    </li>
                   @empty

                   <h5 class="Subtitle">No Edificios Found!</h5>
                   @endforelse
               </ul>


</tbody>
           </table>
           @if(session()->get('Pagenated')==1)
           {{ $edificios->links() }}
           @endif
           @if (session()->has('popup'))
           <div class="alert alert-danger">
               <ul>
                   <h1>
                       <?php  echo session()->get('popup');
                          echo session()->forget('popup');?>
                   </h1>
               </ul>
           </div>
           @endif






       </div>
       </div>
    </div>
</div>
@endsection
