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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.Model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ruben\Documents\GitHub\larainfo\resources\views/Main.blade.php ENDPATH**/ ?>