<?php $__env->startSection('Title'); ?>
Salas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Content'); ?>
<div class="Regis_log_form">
    <div class="Regis_log_form_dux">

        <div class="Left">
           <ul class="list-group">
               <table>
                   <caption>Tabela de Salas</caption>
                <thead>
<th id="id">Id</th>
<th id="Area">Area</th>
<th id="Piso">Piso</th>
<th id="id_edificio">id_edificio</th>
<th id="Update">Update</th>
<th id="Delete">Delete</th>
</thead>
                <tbody>

               <?php $__empty_1 = true; $__currentLoopData = $salas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sala): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
               <li class="list-group-item">
                <tr>
                   <h5 class="Subtitle"><td><?php echo e($sala->id); ?></td><td>  <?php echo e($sala->Area); ?></td><td>  <?php echo e($sala->Piso); ?> </td><td> <?php echo e($sala->id_edificio); ?></td><td>   <a href="/Sala/Update/<?php echo e($sala->id); ?>">Update</a></td><td>   <a href="/Sala/Delete/<?php echo e($sala->id); ?>" >Delete</a></td></h5>
                </tr>
                </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

               <h5 class="Subtitle">No Salas Found!</h5>
               <?php endif; ?>
                </tbody>
            </table>
           </ul>
           <?php if(session()->get('Pagenated')==1): ?>
           <?php echo e($salas->links()); ?>


           <?php endif; ?>

           <div class="tablespace">
           <form action="Sala/store" method="post">
            <?php echo e(csrf_field()); ?>

            <div class='Subtitle'>
                    Create Sala
            </div>
            <input type="text" name='id_edificio'><br>
            <label for="textarea2">Edificio</label>
            <input type="number" name='Area'><br>
            <label for="textarea2">area</label>
            <input type="number" name='Piso'><br>
            <label for="textarea2">piso</label>
            <input type="text" name='Type'><br>
            <label for="textarea2">type</label>
            <br>
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
                    <h4>
                        <?php  echo session()->get('popup');
                              echo session()->forget('popup');
          ?>
                    </h4>
                </ul>
            </div>
            <?php endif; ?>
            <div class="Subtitle">
                <input type="submit" value="create" />
            </div>



        </form>

           </div>
       </div>
           <div  class="Right">
           <table>
            <caption>Tabela de Edificios</caption>
         <thead>
<th id="id">Id</th>
<th id="Nome">Nome</th>
<th id="Piso_Min">Piso_Min</th>
<th id="Piso_Max">Piso_Max</th>
<th id="Morada">Morada</th>
<th id="Update">Update</th>
<th id="Delete">Delete</th>
</thead>
<tbody>
               <ul class="list-group">
                   <?php $__empty_1 = true; $__currentLoopData = $edificios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edificio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                   <li class="list-group-item">
<tr>
                       <h5 class="Subtitle"><td><?php echo e($edificio->id); ?> </td><td> <?php echo e($edificio->Nome); ?> </td><td> <?php echo e($edificio->Piso_min); ?></td><td> <?php echo e($edificio->Piso_max); ?></td><td> <?php echo e($edificio->Morada); ?></td><td>   <a href="/Edificio/Update/<?php echo e($edificio->id); ?>">Update</a></td><td>  <a href="/Edificio/Delete/<?php echo e($edificio->id); ?>" >Delete</a></td></h5>
</tr>
                    </li>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                   <h5 class="Subtitle">No Edificios Found!</h5>
                   <?php endif; ?>
               </ul>


</tbody>
           </table>
           <?php if(session()->get('Pagenated')==1): ?>
           <?php echo e($edificios->links()); ?>


           <?php endif; ?>



           <div class="tablespace">
               <form action="Edificio/store" method="post">
                <?php echo e(csrf_field()); ?>

                <div class='Subtitle'>
                    Create Edificio
                </div>
                <input type="text" name='Nome'><br>
                <label for="textarea2">Nome</label>
                <input type="number" name='Min_Piso'><br>
                <label for="textarea2">Piso Minimo</label>
                <input type="number" name='Max_Piso'><br>
                <label for="textarea2">Piso Maximo</label>
                <input type="text" name='Morada'><br>
                <label for="textarea2">Morada</label>
                <br>
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
                <div class="Subtitle">
                    <input type="submit" value="create" />
                </div>



            </form>
           </div>

       </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ruben\Documents\GitHub\Projeto-Eng.Soft-Lab.Prog\resources\views//Admin/AdminMain.blade.php ENDPATH**/ ?>