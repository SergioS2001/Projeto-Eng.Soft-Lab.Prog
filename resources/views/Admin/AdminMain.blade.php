@extends('layouts.Model')

@section('Title')
Salas
@endsection

@section('Content')
<div class="Regis_log_form">
    <div class="Regis_log_form_trex">
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

               <table>
                   <caption>Tabela de Salas</caption>
                <thead>
<th id="id">@sortablelink('id')</th>
<th id="Area">@sortablelink('Area')</th>
<th id="Piso">@sortablelink('Piso')</th>
<th id="id_edificio">@sortablelink('id_edificio')</th>
<th id="Update">Update</th>
<th id="Delete">Delete</th>
</thead>
                <tbody>

               @forelse($salas as $sala)
               <ul>
               <li class="list-group-item">
                <tr>
                   <h5 class="Subtitle"><td>{{$sala->id}}</td><td>  {{$sala->Area}}</td><td>  {{$sala->Piso}} </td><td> {{$sala->id_edificio}}</td><td>   <a href="/Sala/Update/{{$sala->id}}">Update</a></td><td>   <a href="/Sala/Delete/{{$sala->id}}" >Delete</a></td></h5>
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

           <div class="tablespace">
           <form action="Sala/store" method="post">
            {{ csrf_field() }}
            <div class='Subtitle'>
                    Create Sala
            </div>
            <input type="text" name='id_edificio'><br>
            <label for="textarea2">Edificio</label>
            <input type="number" name='Area'><br>
            <label for="textarea2">area</label>
            <input type="number" name='Piso'><br>
            <label for="textarea2">piso</label>
            <input type="text" name='Type'><br>
            <label for="textarea2">type</label>
            <br>
            <textarea id="textarea2" class="materialize-textarea" data-length="120" name='Descricao'></textarea>
            <label for="textarea2">Descricao</label>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            @endif
            @if (session()->has('popup'))
            <div class="alert alert-danger">
                <ul>
                    <h4>
                        <?php  echo session()->get('popup');
                              echo session()->forget('popup');
          ?>
                    </h4>
                </ul>
            </div>
            @endif
<br>
            <button class="btn waves-effect waves-light" type="submit" name="action">Create Sala</button>



        </form>

           </div>
       </div>
           <div  class="Right">
           <table>
            <caption>Tabela de Edificios</caption>
         <thead>

            <th id="Nome">@sortablelink('Nome')</th>
            <th id="Piso_Min">@sortablelink('Piso_min')</th>
            <th id="Piso_Max">@sortablelink('Piso_max')</th>
            <th id="Morada">@sortablelink('Morada')</th>
            <th id="date_in">@sortablelink('date_in')</th>
            <th id="date_out">@sortablelink('date_out')</th>
<th id="Update">Update</th>
<th id="Delete">Delete</th>
</thead>
<tbody>
               <ul class="list-group">
                   @forelse($edificios as $edificio)
                   <li class="list-group-item">
<tr>
                       <h5 class="Subtitle"><td> {{$edificio->Nome}} </td><td> {{$edificio->Piso_min}}</td><td> {{$edificio->Piso_max}}</td><td> {{$edificio->Morada}}</td><td>{{$edificio->date_in}} </td><td>{{$edificio->date_out}} </td><td>   <a href="/Edificio/Update/{{  $edificio->id }}">Update</a></td><td>  <a href="/Edificio/Delete/{{  $edificio->id}}" >Delete</a></td></h5>
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



           <div class="tablespace">
               <form action="Edificio/store" method="post">
                {{ csrf_field() }}
                <div class='Subtitle'>
                    Create Edificio
                </div>
                <input type="text" name='Nome'><br>
                <label for="textarea2">Nome</label>
                <input type="number" name='Min_Piso'><br>
                <label for="textarea2">Piso Minimo</label>
                <input type="number" name='Max_Piso'><br>
                <label for="textarea2">Piso Maximo</label>
                <input type="time" name='date_in'><br>
                <label for="textarea2">date_in</label>
                <input type="time" name='date_out'><br>
                <label for="textarea2">date_out</label>
                <input type="text" name='Morada'><br>
                <label for="textarea2">Morada</label>
                <br>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

                @endif
                <br>
                <div class="Subtitle">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Create Edificio</button>
                </div>



            </form>
            <div class="row">
                <div class="col s4"><a href="/AdminMain/8:8">8</a></div>
                <div class="col s4"><a href="/AdminMain/16:16">16</a></div>
                <div class="col s4"><a href="/AdminMain/24:24">24</a></div>

            </div>
           </div>

       </div>



    </div>
</div>
@endsection
