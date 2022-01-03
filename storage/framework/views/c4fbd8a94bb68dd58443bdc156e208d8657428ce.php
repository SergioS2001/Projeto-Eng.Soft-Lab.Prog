
<ul id="dropdown1" class="dropdown-content">
    <li></li>
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

                <?php if(session()->has('utilizadors')): ?>

  <!-- Dropdown Trigger -->
  <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Dropdown<em class="material-icons right">arrow_drop_down</em></a></li>

    <?php else: ?>
    <li>  <a href="<?php echo e(url('/logI' )); ?>" class="Subtitle" >Log In</a></li>

        <?php endif; ?>
              </ul>
            </div>
             </nav>
<?php /**PATH C:\Users\ruben\Documents\GitHub\larainfo\resources\views/Include/Header.blade.php ENDPATH**/ ?>