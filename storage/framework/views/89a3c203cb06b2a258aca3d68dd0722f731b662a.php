<?php $__env->startSection('Title'); ?>
Salas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Content'); ?>

<div class ="Regis_log_form">

    <div class ="Regis_log_form_dux">
          <div id='left'>
             Salas
             <ul class="list-group">
                <table>
                    <caption>Tabela de Salas</caption>
                 <thead>
 <th id="id">ID</th>
 <th id="Area">Area</th>
 <th id="Piso">Piso</th>
 <th id="id_edificio">id_edificio</th>
 <th id="Requesito">Requisito</th>
 </thead>
                 <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $salas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sala): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li class="list-group-item">
                 <tr>
                    <h5 class="Subtitle"><td><?php echo e($sala->id); ?></td><td>  <?php echo e($sala->Area); ?></td><td>  <?php echo e($sala->Piso); ?> </td><td> <?php echo e($sala->id_edificio); ?></td><td><a href="/Requisito/Make/<?php echo e($sala->id); ?>" >Requisitar</a></td></h5>
                 </tr>
                 </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <h5 class="Subtitle">No Salas Found!</h5>
                <?php endif; ?>
                 </tbody>
             </table>
            </ul>
        </div>
            <div id="Right">
                Edificios
                <table>
                    <caption>Tabela de Edificios</caption>
                 <thead>
        <th id="id">ID</th>
        <th id="Nome">Nome</th>
        <th id="Piso_Min">Piso_Min</th>
        <th id="Piso_Max">Piso_Max</th>
        <th id="Morada">Morada</th>
        </thead>
        <tbody>
                       <ul class="list-group">
                           <?php $__empty_1 = true; $__currentLoopData = $edificios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edificio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                           <li class="list-group-item">
        <tr>
                               <h5 class="Subtitle"><td><?php echo e($edificio->id); ?> </td><td> <?php echo e($edificio->Nome); ?> </td><td> <?php echo e($edificio->Piso_min); ?></td><td> <?php echo e($edificio->Piso_max); ?></td><td> <?php echo e($edificio->Morada); ?></td></h5>
        </tr>
                            </li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                           <h5 class="Subtitle">No Edificios Found!</h5>
                           <?php endif; ?>
                       </ul>

        </tbody>
                   </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.Model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ruben\Documents\GitHub\Projeto-Eng.Soft-Lab.Prog\resources\views/Main.blade.php ENDPATH**/ ?>