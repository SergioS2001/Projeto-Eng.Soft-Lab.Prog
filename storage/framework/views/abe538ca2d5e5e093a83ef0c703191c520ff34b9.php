
   <footer class="page-footer">
 <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="<?php echo e(url('/Main' )); ?>">Main</a>
        </div>

            <?php if(session()->has('utilizadors')): ?>

            <?php
                $util=session()->get('utilizadors');
               if (strcmp($util->Type,'Admin')==0 ) {

              ?>
                     <div class="container">
              <a class="grey-text text-lighten-4 right" href="<?php echo e(url('/AdminMain' )); ?>">AdminMain</a>
            </div>
              <?php
               }
                ?>
            <?php endif; ?>

          </div>
        </footer>
<?php /**PATH C:\Users\ruben\Documents\GitHub\Projeto-Eng.Soft-Lab.Prog\resources\views/Include/Footer.blade.php ENDPATH**/ ?>