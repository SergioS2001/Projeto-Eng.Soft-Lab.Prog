
<ul id="dropdown1" class="dropdown-content">
    <li>  @if(session()->has('utilizadors'))

        <?php
            $util=session()->get('utilizadors');
            echo '<a>'. $util->Nome.'</a>';
            ?>



        @endif</li>
    <li class="divider"></li>
    <li><a href="#!">two</a></li>

    <li><a href="/UtilizadorOut">Log Out</a></li>
  </ul>
    <nav>
            <div class="nav-wrapper">
              <a href="#" class="brand-logo">Logo</a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="sass.html">Sass</a></li>
                <li><a href="badges.html">Components</a></li>

                @if(session()->has('utilizadors'))

  <!-- Dropdown Trigger -->
  <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Dropdown<em class="material-icons right">arrow_drop_down</em></a></li>

    @else
    <li>  <a href="{{url('/logI' )}}" class="Subtitle" >Log In</a></li>

        @endif
              </ul>
            </div>
             </nav>
