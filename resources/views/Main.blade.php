@extends('Layouts.Model')

@section('Title')
Salas
@endsection

@section('Content')
<!--  Begin the form    -->
<div class="Regis_log_form">
    <!--  Creates what looks like margins in the form    -->
    <div class="Regis_log_form_trex">
         <!--  division with the table with salas     -->
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
        <div class="Left">

               <table class="centered">
                   <caption>Tabela de Salas</caption>
                <thead>
<th id="id">@sortablelink('id')</th>
<th id="Area">@sortablelink('Area')</th>
<th id="Piso">@sortablelink('Piso')</th>
<th id="id_edificio">@sortablelink('id_edificio')</th>
<th id="Requisitar"> Requisitar</th>
</thead>
                <tbody>

               @forelse($salas as $sala)
               <ul class="list-group">
               <li class="list-group-item">
                <tr>
                   <h5 class="Subtitle"><td><a href="/Requisitos/Show_SALA/{{ $sala->id }}">{{$sala->id}}</a></td><td>  {{$sala->Area}}</td><td>  {{$sala->Piso}} </td><td> {{ $sala->id_edificio }}</td><td>   <a href="/Requisito/Make/{{ $sala->id }}}">Make Requisito</a></td></h5>
                </tr>
                </li>
            </ul>
               @empty

               <h5 class="Subtitle">No Salas Found!</h5>
               @endforelse

                </tbody>

            </table>

           @if(session()->get('Pagenated')==1)
           {{ $salas->links() }}
           @endif
       </div>
         <!--  space between the divs     -->
       <div class="tablespace">
             <!--  division with the table with edificios     -->
           <div  class="Right">
           <table class="centered">
            <caption>Tabela de Edificios</caption>
         <thead>
<th id="Nome">@sortablelink('Nome')</th>
<th id="Piso_Min">@sortablelink('Piso_min')</th>
<th id="Piso_Max">@sortablelink('Piso_max')</th>
<th id="Morada">@sortablelink('Morada')</th>
<th id="date_in">@sortablelink('date_in')</th>
<th id="date_out">@sortablelink('date_out')</th>
</thead>
<tbody>
               <ul class="list-group">
                   @forelse($edificios as $edificio)
                   <li class="list-group-item">
<tr>
                       <h5 class="Subtitle"><td> {{$edificio->Nome}} </td><td> {{$edificio->Piso_min}}</td><td> {{$edificio->Piso_max}}</td><td> {{$edificio->Morada}}</td><td>{{$edificio->date_in}} </td><td>{{$edificio->date_out}} </td><td> </h5>
</tr>
                    </li>
                   @empty

                   <h5 class="Subtitle">No Edificios Found!</h5>
                   @endforelse
               </ul>


</tbody>


           </table>

           <div class="row">
            <div class="col s4"><a href="/Main/8:8">8</a></div>
            <div class="col s4"><a href="/Main/16:16">16</a></div>
            <div class="col s4"><a href="/Main/24:24">24</a></div>

        </div>


           @if(session()->get('Pagenated')==1)
           {{ $edificios->links() }}
           @endif

       </div>
       </div>
    </div>
</div>
@endsection
