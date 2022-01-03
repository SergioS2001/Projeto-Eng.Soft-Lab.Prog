<?php $__env->startSection('Title'); ?>
Log In
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Content'); ?>
<div class ="Regis_log_form">
    <h1 class= "Title">
   Log In Utilizador
    </h1>
    <div class ="Regis_log_form_dux">
    <div class="row">
        <form class="col s12" action ="Utilizador/Log_In"method="post">
            <?php echo e(csrf_field()); ?>

          <div class="row">
            <div class="input-field col s12">
                <em class="material-icons prefix">email</em>
              <input id="email" type="email" class="validate" name ="Email">
              <label for="email">Email</label>
              <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
                <em class="material-icons prefix">password</em>
              <input id="password" type="Password" name ="Password"  class="validate" Password="*">
              <label for="password">Password</label>
            </div>

          </div>
          <?php if(session()->has('popup')): ?>
          <div class="alert alert-danger">
              <ul>

              <?php  echo session()->get('popup');
             session()->forget('popup');
              ?>

              </ul>
          </div>
      <?php endif; ?>
          <?php if($errors->any()): ?>
          <div class="alert alert-danger">
              <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
          </div>
      <?php endif; ?>

          <div class="row" >
            <div class="input-field col s12">
                <div class="submitt">
                <input  type="submit"  value="Login" />
                </div>


            </div>


          </div>

        </form>
        <div class="Subtitle">
            <a href="<?php echo e(url('/Registo' )); ?>" class="Subtitle" >Registar</a>
            </div>


      </div>
    </div>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.Model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ruben\Documents\GitHub\Projeto-Eng.Soft-Lab.Prog\resources\views/logI.blade.php ENDPATH**/ ?>