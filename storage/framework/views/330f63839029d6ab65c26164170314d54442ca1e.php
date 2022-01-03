<?php $__env->startSection('Title'); ?>
Make Requisito
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Content'); ?>
<div class ="Regis_log_form">
    <h1 class= "Title">
   Make Requisito
    </h1>
    <?php
    echo $id;

    ?>
    <div class ="Regis_log_form_dux">
        <div class="row">
<form action="/Requisito/Make<?php echo e($id); ?>" method="POST">
    <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" id="Data_Incio" type="datetime" class="validate">
          <label for="Data_Incio">Data_Incio</label>
        </div>
        <label>
            <input name="group1" type="radio" checked />
            <span>1:00</span>
          </label>
        </p>
        <p>
          <label>
            <input name="group1" type="radio" />
            <span>2:00</span>
          </label>
        </p>
        <p>
          <label>
            <input  name="group1" type="radio"  />
            <span>3:00</span>
          </label>
        </p>
      </div>
</form>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.Model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ruben\Documents\GitHub\Projeto-Eng.Soft-Lab.Prog\resources\views/MakeRequisito.blade.php ENDPATH**/ ?>