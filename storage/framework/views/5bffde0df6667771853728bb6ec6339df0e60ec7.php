<?php $__env->startSection('Title'); ?>
Update Requisito <?php echo e($requisitos->id); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('Content'); ?>
<div class="Regis_log_form">
    <div class="Regis_log_form_trex">
        <h1>
 Update Requisito

        </h1>
        <table>
            <caption>Tabela de Requisito</caption>
         <thead>
<th id="id">Id</th>
<th id="Area">Id_Sala</th>
<th id="Piso">Id_Utilizador</th>
<th id="Type">Data In</th>
<th id="Descricao">Data_Out</th>
</thead>
         <tbody>
         <tr>
            <h5 class="Subtitle"><td><?php echo e($requisitos->id); ?></td><td>  <?php echo e($requisitos->id_Sala); ?></td><td>  <?php echo e($requisitos->id_Utilizador); ?> </td><td>  <?php echo e($requisitos->date_in); ?></td><td><?php echo e($requisitos->date_out); ?></td></h5>
         </tr>
         </tbody>
     </table>

     <form action="/Requisito/updateput/<?php echo e($requisitos->id); ?>/"method="GET" >
        <?php echo e(method_field('Get')); ?>

        <?php echo e(csrf_field()); ?>

     <table>
        <caption>Form de update de Requisito</caption>
     <thead>

<th id="Data In">NEW Data In</th>
<th id="Data out">NEW Data Out</th>
<th id="Duration">NEW Duration</th>
</thead>
     <tbody>
     <tr>
        <h5 class="Subtitle"><td>  <input name='date_in' type="datetime-local"></td><td>  <input name='date_out'type="datetime-local"> </td><td>  <fieldset id="group1">
            <legend>Hora desejada</legend>
            <p>
    <label>
        <input name="group1" type="radio" checked value="1"/>
        <span>1:00</span>
      </label>
    </p>
    <p>
      <label>
        <input name="group1" type="radio" value="2"/>
        <span>2:00</span>
      </label>
    </p>
    <p>
      <label>
        <input  name="group1" type="radio"  value="3"/>
        <span>3:00</span>
      </label>
    </p>

</fieldset></td></h5>
     </tr>
     </tbody>
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

<?php echo $__env->make('layouts.Model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ruben\Documents\GitHub\Projeto-Eng.Soft-Lab.Prog\resources\views/Requisito/update.blade.php ENDPATH**/ ?>