<?php $__env->startSection('Title'); ?>
EDIFICIOS DELETED
<?php $__env->stopSection(); ?>
<?php $__env->startSection('Title2'); ?>
EDIFICIOS DELETED
<?php $__env->stopSection(); ?>
<?php $__env->startSection('Content'); ?>
<table>
    <caption>Tabela de Edificios</caption>
 <thead>
<th id="id">Id</th>
<th id="Nome">Nome</th>
<th id="Piso_Min">Piso_Min</th>
<th id="Piso_Max">Piso_Max</th>
<th id="Morada">Morada</th>
<th id="date_in">date_in</th>
<th id="date_out">date_out</th>
</thead>
<tbody>
       <ul class="list-group">

           <li class="list-group-item">
<tr>
               <h5 class="Subtitle"><td><?php echo e($edificios->id); ?> </td><td> <?php echo e($edificios->Nome); ?> </td><td> <?php echo e($edificios->Piso_min); ?></td><td> <?php echo e($edificios->Piso_max); ?></td><td> <?php echo e($edificios->Morada); ?></td><td><?php echo e($edificios->date_in); ?> </td><td><?php echo e($edificios->date_out); ?> </td></h5>
</tr>
            </li>



       </ul>


</tbody>
   </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.MAIL_MODEL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ruben\Documents\GitHub\Projeto-Eng.Soft-Lab.Prog\resources\views/edificio/DELETEDEDIFICIOS.blade.php ENDPATH**/ ?>