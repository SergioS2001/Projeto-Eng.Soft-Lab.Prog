<?php $__env->startSection('Title'); ?>
Salas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Content'); ?>
<div class ="Regis_log_form">

        <h1 class= "Title">
        Salas
        </h1>
        <ul class="list-group">
            <?php $__empty_1 = true; $__currentLoopData = $salas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sala): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li class="list-group-item">
                <h5><?php echo e($sala->id); ?> - <?php echo e($sala->Area); ?> - <?php echo e($sala->Piso); ?>- <?php echo e($sala->id_edificio); ?></h5>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <h5 class="text-center">No Salas Found!</h5>
            <?php endif; ?>
        </ul>
        <div class="Subtitle">
          Create
            </div>
            <form  action ="Sala/create" method="post" >
                <?php echo e(csrf_field()); ?>

         Edificio :<input type="text" name='id_edificio'><br>
         Area :<input type="number" name='area'><br>
         Piso :<input type="number" name='piso'><br>
         Type :<input type="number" name='type'><br>
         Descricao :<br>

              <textarea id="textarea2" class="materialize-textarea" data-length="120" name='Descricao'></textarea>
              <label for="textarea2">Descricao</label>



              <?php if($errors->any()): ?>
              <div class="alert alert-danger">
                  <ul>
                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li><?php echo e($error); ?></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
              </div>

          <?php endif; ?>
          <?php if(session()->has('popup')): ?>
          <div class="alert alert-danger">
              <ul>
                  <h1>
              <?php  echo session()->get('popup');
              echo session()->forget('popup');
              ?>
              </h1>
              </ul>
          </div>
        <?php endif; ?>


                    <div class="Subtitle">
                    <input  type="submit"  value="create" />

                    </div>


            </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ruben\Documents\GitHub\Projeto-Eng.Soft-Lab.Prog\resources\views//Utilizador_admin/Main.blade.php ENDPATH**/ ?>