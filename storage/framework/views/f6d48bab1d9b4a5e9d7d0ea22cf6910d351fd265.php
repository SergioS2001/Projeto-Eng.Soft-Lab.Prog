
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>

      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

      <!--Import materialize.css-->
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" integrity="sha512-UJfAaOlIRtdR+0P6C3KUoTDAxVTuy3lnSXLyLKlHYJlcSU8Juge/mjeaxDNMlw9LgeIotgz5FP8eUQPhX1q10A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css" integrity="sha512-t38vG/f94E72wz6pCsuuhcOPJlHKwPy+PY+n1+tJFzdte3hsIgYE7iEpgg/StngunGszVMrRfvwZinrza0vMTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" type="text/css"  href="<?php echo e(URL::asset('mycss/css.css')); ?>">


<title>
                  Requisito has been updated  <?php echo e($requisito->id); ?>

     </title>
</head>
    <body>
      <h1>  My Requisito</h1>


        <div class="Regis_log_form">
            <div class="Regis_log_form_trex">
                <h1>
        New Requisito  has been updatedv Utilizador <?php echo e($requisito->id_Utilizador); ?>


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
                               <h5 class="Subtitle"><td><?php echo e($requisito->id); ?></td><td>  <?php echo e($requisito->id_Sala); ?></td><td>  <?php echo e($requisito->id_Utilizador); ?> </td><td>  <?php echo e($requisito->date_in); ?></td><td><?php echo e($requisito->date_out); ?></td></h5>
                            </tr>
                            </tbody>
                        </table>

            </div>
            </div>








          <script  src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js" integrity="sha512-m2PhLxj2N91eYrIGU2cmIu2d0SkaE4A14bCjVb9zykvp6WtsdriFCiXQ/8Hdj0kssUB/Nz0dMBcoLsJkSCto0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Compiled and minified JavaScript -->
  <script  src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" integrity="sha512-NiWqa2rceHnN3Z5j6mSAvbwwg3tiwVNxiAQaaSMSXnRRDh5C2mk/+sKQRw8qjV1vN4nf8iK2a0b048PnHbyx+Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" src="<?php echo e(URL::asset('mycss/java.js')); ?>"></script>


        </body>
</html>

<?php /**PATH C:\Users\ruben\Documents\GitHub\Projeto-Eng.Soft-Lab.Prog\resources\views/mail/updatedrequsito.blade.php ENDPATH**/ ?>