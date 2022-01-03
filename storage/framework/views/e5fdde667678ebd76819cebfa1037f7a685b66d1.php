<?php $__env->startSection('Title'); ?>
Make Requisito
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Content'); ?>
<div class ="Regis_log_form">
    <h1 class= "Title">
   Make Requisito
    </h1>
    <div class ="Regis_log_form_trex">
        <table>
            <caption>Tabela da Sala</caption>
         <thead>
<th id="id">Id</th>
<th id="Area">Area</th>
<th id="Piso">Piso</th>
<th id="Type">Type</th>
<th id="Descricao">Descricao</th>
<th id="id_edificio">id_edificio</th>
<th id="data_in">data_in</th>
<th id="data_out">data_out</th>
</thead>
         <tbody>
         <tr>
            <h5 class="Subtitle"><td><?php echo e($salas->id); ?></td><td>  <?php echo e($salas->Area); ?></td><td>  <?php echo e($salas->Piso); ?> </td><td>  <?php echo e($salas->Type); ?></td><td><?php echo e($salas->Descricao); ?></td><td> <?php echo e($salas->id_edificio); ?></td><td> <?php echo e($date_in); ?></td><td> <?php echo e($date_out); ?></td></h5>
         </tr>
     </table>
        <div class="row">
<form action="/Requisito/Create/<?php echo e($salas->id); ?>" method="GET">
    <?php echo e(method_field('GET')); ?>

    <?php echo e(csrf_field()); ?>

    <div class="Together">
    <div class="row">
        <div class="input-field col s6">
            <em class="material-icons prefix">I</em>
            <input class="top" name='date_in' type="datetime-local" >
        </div>

<div class='input-field col s6'>
    <em class='material-icons prefix'>F</em>
    <input class='top' name='date_out' type='datetime-local' >
</div>";


        <div class="row">

            <fieldset id="group1">
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
        </div>
    </fieldset>
      </div>
      <div class="row">
        <input type="submit"  value="Create requisito"/>
      </div>
    </div>
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
        </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.Model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ruben\Documents\GitHub\Projeto-Eng.Soft-Lab.Prog\resources\views/Requisito/MakeRequisito.blade.php ENDPATH**/ ?>