<?php $__env->startSection('Title'); ?>
My Requisito
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Content'); ?>
<div class="Regis_log_form">
    <div class="Regis_log_form_trex">
        <h1>
 My Requisitos

        </h1>

            <table>
             <caption>Tabela de Requisitos</caption>
          <thead>
 <th id="id">Id</th>
 <th id="id_Utilizador">id_Utilizador</th>
 <th id="id_Sala">id_Sala</th>
 <th id="date_in">date_in</th>
 <th id="date_out">date_out</th>
 <th id="Update">Update</th>
 <th id="Delete">Delete</th>
 </thead>
 <tbody>
                <ul class="list-group">
                    <?php $__empty_1 = true; $__currentLoopData = $requisitos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requisito): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li class="list-group-item">
 <tr>
                        <h5 class="Subtitle"><td><?php echo e($requisito->id); ?></td><td><?php echo e($requisito->id_Utilizador); ?> </td><td> <?php echo e($requisito->id_Sala); ?></td><td><?php echo e($requisito->date_in); ?> </td><td><?php echo e($requisito->date_out); ?> </td><td>   <a href="/Requisito/Update/<?php echo e($requisito->id); ?>">Update</a></td><td>  <a href="/requisito/Delete/<?php echo e($requisito->id); ?>" >Delete</a></td></h5>
 </tr>
                     </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <h5 class="Subtitle">No Requisitos Found!</h5>
                    <?php endif; ?>
                </ul>
 </tbody>
            </table>
            <?php if(session()->get('Pagenated_Requisito')==1): ?>
            <?php echo e($edificios->links()); ?>

            <?php if(session()->has('popup')): ?>
            <div class="alert alert-danger">
                <ul>
                    <h1>
                        <?php  echo session()->get('popup');
                           echo session()->forget('popup');?>
                    </h1>
                </ul>
            </div>
            <?php endif; ?>
            <?php endif; ?>

    </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ruben\Documents\GitHub\Projeto-Eng.Soft-Lab.Prog\resources\views/Requisito/Index.blade.php ENDPATH**/ ?>