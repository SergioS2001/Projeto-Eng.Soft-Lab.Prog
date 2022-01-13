
<ul id="dropdown1" class="dropdown-content">
    <li>  @if(session()->has('utilizadors'))

        <?php
            $util=session()->get('utilizadors');
            echo '<a href="/Utilizador/Show">'. $util->Nome.'</a>';
            ?>



        @endif</li>
    <li class="divider"></li>
    <li><a href="/Requisitos/Show">See My Requisitos</a></li>

    <li><a href="/UtilizadorOut">Log Out</a></li>
  </ul>
    <nav>
            <div class="nav-wrapper">
              <a href="/Requisitos/Show" class="brand-logo">Requisitos</a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="https://www.w3schools.com/sass/sass_intro.asp">Sass</a></li>
                <li><a href="https://materializecss.com/">Materialize</a></li>

                @if(session()->has('utilizadors'))

  <!-- Dropdown Trigger -->
  <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Dropdown<em class="material-icons right">arrow_drop_down</em></a></li>

    @else
    <li>  <a href="{{url('/logI' )}}" class="Subtitle" >Log In</a></li>

        @endif
              </ul>
            </div>
             </nav>
