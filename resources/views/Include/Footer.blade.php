
   <footer class="page-footer">
 <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="{{url('/Main' )}}">Main</a>
        </div>

            @if(session()->has('utilizadors'))

            <?php
                $util=session()->get('utilizadors');
               if (strcmp($util->Type,'Admin')==0 ) {

              ?>
                     <div class="container">
              <a class="grey-text text-lighten-4 right" href="{{url('/AdminMain' )}}">AdminMain</a>
            </div>
              <?php
               }
                ?>
            @endif

          </div>
        </footer>
