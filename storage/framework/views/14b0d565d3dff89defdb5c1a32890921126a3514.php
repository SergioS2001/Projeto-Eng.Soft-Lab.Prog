<?php $__env->startSection('Title'); ?>
Registo
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Content'); ?>
<div class ="Regis_log_form">
    <h1 class= "Title">
    Register Utilizador
    </h1>
    <div class ="Regis_log_form_dux">
    <div class="row">

        <form class="col s12" action ="Utilizador/store" method="post" >
            <?php echo e(csrf_field()); ?>

            <div class="row">
                <div class="input-field col s12">
                    <em class="material-icons prefix">email</em>
                  <input  type="text" name="Nome" class="validate">
                  <label for="Nome">Nome</label>
                    </div>
              </div>
          <div class="row">
            <div class="input-field col s12">
                <em class="material-icons prefix">email</em>
              <input id="Email" type="text" name="Email" class="validate">
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
          <div class="input-field col s12">
            <em class="material-icons prefix">people</em>
            <select name="Type">
              <option value="Admin" id="OP-A">Admin</option>
              <option value="Docente" id="OP-D">Docente</option>
              <option selected="selected" value="Aluno" id="OP-a">Aluno</option>
            </select>
            <label>Type</label>
          </div>
        </div>


          <div class="row">
            <div class="input-field col s12">
                <em class="material-icons prefix">password</em>
              <input  type="text" name="Password" minlength="10"  class="validate" Password="*">
              <label for="password">Password</label>
            </div>

          </div>

          <div class="row">
            <div class="input-field col s12">
                <em class="material-icons prefix">password</em>
              <input  type="text"name="Re-password" minlength="10"  class="validate">
              <label for="password">Re-Password</label>
            </div>

          </div>

          <?php if($errors->any()): ?>
          <div class="alert alert-danger">
              <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
          </div>
      <?php endif; ?>
                <div class="Subtitle">
                <input  type="submit"  value="Register" />

                <div>


        </form>
        <div class="Subtitle">
            <a href="<?php echo e(url('/logI' )); ?>" class="Subtitle" >Log In</a>
            </div>




      </div>
    </div>
      </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.Model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ruben\Documents\GitHub\larainfo\resources\views/Registo.blade.php ENDPATH**/ ?>