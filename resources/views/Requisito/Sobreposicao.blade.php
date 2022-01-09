@extends('layouts.Model')

@section('Title')
Sobreposicao
@endsection

@section('Content')
<div class="Regis_log_form">
    <div class="Regis_log_form_trex">
        <h1>
Sobre Posicao detected!!

        </h1>
        <h2>
            Will you Sobreposicao?

                    </h2>
                    <div class="Subtitle">
                        <a href="/requisito/sobreposicaoConf/{{ $ed2 }}" class="Subtitle" >Yes</a>
                        <a href="{{url('/Main' )}}" class="Subtitle" >No</a>
                        </div>

    </div>
    </div>

@endsection
