<?php $__env->startSection('Title'); ?>
Update Edificio <?php echo e($edificios->id); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('Content'); ?>
<div class="Regis_log_form">
    <div class="Regis_log_form_trex">
        <h1>
 Update Edificio

        </h1>
        <table>
            <caption>Tabela de Sala</caption>
         <thead>
<th id="id">Id</th>
<th id="Nome">Nome</th>
<th id="Piso_Min">Piso_Min</th>
<th id="Piso_Max">Piso_Max</th>
<th id="Morada">Morada</th>
</thead>
         <tbody>
         <tr>
            <h5 class="Subtitle"><td><?php echo e($edificios->id); ?></td><td>  <?php echo e($edificios->Nome); ?></td><td>  <?php echo e($edificios->Piso_min); ?> </td><td>  <?php echo e($edificios->Piso_max); ?></td><td><?php echo e($edificios->Morada); ?></td></h5>
         </tr>
     </table>
     <form action="/Edificio/updateput/<?php echo e($edificios->id); ?>/"method="post" >
        <?php echo e(method_field('PUT')); ?>

        <?php echo e(csrf_field()); ?>

     <table>
        <caption>Form de update de Edificio</caption>
     <thead>

<th id="Area">NEW Nome}</th>
<th id="Piso">NEW Piso_Min</th>
<th id="Type">NEW Piso_Max</th>
<th id="NewDescricao">New Morada</th>
<th id="date_in">Date In</th>
<th id="date_out">Date Out</th>
</thead>
     <tbody>
     <tr>
        <h5 class="Subtitle"><td>  <input name='Nome' type="text"></td><td>  <input name='Min_Piso' type="number"> </td><td>  <input name='Max_Piso' type="number"> </td><td> <input name='Morada' type="text"></td><td> <input name='date_in' type="time"></td><td> <input name='date_out' type="time"></td></h5>
     </tr>
 </table>
 <input type="submit">
     </form>
     <?php if($errors->any()): ?>
     <div class="alert alert-danger">
         <ul>
             <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <li><?php echo e($error); ?></li>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </ul>
     </div>

     <?php endif; ?>
    </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ruben\Documents\GitHub\Projeto-Eng.Soft-Lab.Prog\resources\views/edificio/update.blade.php ENDPATH**/ ?>