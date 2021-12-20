@extends('layouts.Model')

@section('Title')
Salas
@endsection

@section('Content')
<div class="Regis_log_form">
    <div class="Regis_log_form_dux">

        <div id='left'>
            <h4>  Salas</h4>
           <ul class="list-group">
               <table>
                   <caption>Tabela de Salas</caption>
                <thead>
<th id="id">ID</th>
<th id="Area">Area</th>
<th id="Piso">Piso</th>
<th id="id_edificio">id_edificio</th>
<th id="Update">Update</th>
<th id="Delete">Delete</th>
</thead>
                <tbody>

               @forelse($salas as $sala)
               <li class="list-group-item">
                <tr>
                   <h5 class="Subtitle"><td>{{$sala->id}}</td><td>  {{$sala->Area}}</td><td>  {{$sala->Piso}} </td><td> {{$sala->id_edificio}}</td><td>   <a href="/Sala/Update/{{$sala->id}}">Update</a></td><td>   <a href="/Sala/Delete/{{$sala->id}}" >Delete</a></td></h5>
                </tr>
                </li>
               @empty

               <h5 class="Subtitle">No Salas Found!</h5>
               @endforelse
                </tbody>
            </table>
           </ul>
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
            <div class="Subtitle">
                <input type="submit" value="create" />
            </div>



        </form>
       </div>
           <div id="Right">
           <h4>Edificios</h4>
           <table>
            <caption>Tabela de Edificios</caption>
         <thead>
<th id="id">ID</th>
<th id="Nome">Nome</th>
<th id="Piso_Min">Piso_Min</th>
<th id="Piso_Max">Piso_Max</th>
<th id="Morada">Morada</th>
<th id="Update">Update</th>
<th id="Delete">Delete</th>
</thead>
<tbody>
               <ul class="list-group">
                   @forelse($edificios as $edificio)
                   <li class="list-group-item">
<tr>
                       <h5 class="Subtitle"><td>{{$edificio->id}} </td><td> {{$edificio->Nome}} </td><td> {{$edificio->Piso_min}}</td><td> {{$edificio->Piso_max}}</td><td> {{$edificio->Morada}}</td><td>   <a href="/Edificio/Update/{{  $edificio->id }}">Update</a></td><td>  <a href="/Edificio/Delete/{{  $edificio->id}}" >Delete</a></td></h5>
</tr>
                    </li>
                   @empty

                   <h5 class="Subtitle">No Edificios Found!</h5>
                   @endforelse
               </ul>

</tbody>
           </table>
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
                <div class="Subtitle">
                    <input type="submit" value="create" />
                </div>



            </form>
       </div>
    </div>
</div>
@endsection
