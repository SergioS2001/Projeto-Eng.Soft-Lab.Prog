<?php $__env->startSection('Title'); ?>
SALAS CRIADADAS
<?php $__env->stopSection(); ?>
<?php $__env->startSection('Title2'); ?>
SALAS CRIADADAS
<?php $__env->stopSection(); ?>
<?php $__env->startSection('Content'); ?>


<ul class="list-group">
    <table>
        <caption>Tabela de Salas</caption>
     <thead>
<th id="id">Id</th>
<th id="Area">Area</th>
<th id="Piso">Piso</th>
<th id="id_edificio">id_edificio</th>
<th id="Requisitar"> Requisitar</th>
</thead>
     <tbody>


    <li class="list-group-item">
     <tr>

        SAlas     </tr>
     </li>

 </table>
</ul>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.MAIL_MODEL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ruben\Documents\GitHub\Projeto-Eng.Soft-Lab.Prog\resources\views/sala/NEWSALA.blade.php ENDPATH**/ ?>