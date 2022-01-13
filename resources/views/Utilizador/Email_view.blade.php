@extends('Layouts.Model')

@section('Title')
Utilizador Information
@endsection

@section('Content')
<!--  Begin the form    -->
<div class="Regis_log_form">
    <!--  Creates what looks like margins in the form    -->
    <div class="Regis_log_form_trex">
         <!--  division with the table with salas     -->
        <div class="Left">
          <h4>Send Email</h4>
        <div class="border-lines">
            <form class="col s12" action ="/Utilizador/forgot/" method="POST" >
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="inborder-lines">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="email" name ="Email"  >
                      <label for="Email">Email</label>
                    </div>
                  </div>
                </div>

                    <div class="Subtitle">
                    <input  type="submit"  value="Send_Email" />
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
        @if (session()->has('popup'))
        <div class="alert alert-danger">
            <ul>
                <h1>
            <?php  echo session()->get('popup');
            echo session()->forget('popup');
            ?>
            </h1>
            </ul>
        </div>
    @endif
        </div>
       </div>
    </div>
</div>

@endsection
