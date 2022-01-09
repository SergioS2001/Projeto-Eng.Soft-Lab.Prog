@extends('layouts.Model')

@section('Title')
Requisito das Salas
@endsection

@section('Content')
<div class="Regis_log_form">
    <div class="Regis_log_form_trex">
        <h1>
            Requisito das Salas

        </h1>

            <table>
             <caption>Tabela de Requisitos</caption>
          <thead>
 <th id="id">Id</th>
 <th id="id_Utilizador">id_Utilizador</th>
 <th id="id_Sala">id_Sala</th>
 <th id="date_in">date_in</th>
 <th id="date_out">date_out</th>
 </thead>
 <tbody>
                <ul class="list-group">
                    @forelse($requisitos as $requisito)
                    <li class="list-group-item">
 <tr>
                        <h5 class="Subtitle"><td>{{ $requisito->id}}</td><td>{{  $requisito->id_Utilizador }} </td><td> {{$requisito->id_Sala}}</td><td>{{$requisito->date_in}} </td><td>{{$requisito->date_out}} </td></h5>
 </tr>
                     </li>
                    @empty

                    <h5 class="Subtitle">No Requisitos Found!</h5>
                    @endforelse
                </ul>
 </tbody>
            </table>
            @if(session()->get('Pagenated_Requisito')==1)
            {{ $edificios->links() }}
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
            @endif

    </div>
    </div>

@endsection
