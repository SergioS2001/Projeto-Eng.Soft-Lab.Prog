<!DOCTYPE html>
<html lang="en">
    <head>


        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>


<title>
DEfault
     </title>
</head>
    <body>
<!--  Begin the form    -->
<div class="Regis_log_form">
    <!--  Creates what looks like margins in the form    -->
    <div class="Regis_log_form_trex">
         <!--  division with the table with salas     -->
        <div class="Left">

               <table>
                   <caption>Tabela de Salas</caption>
                <thead>
<th id="id">Id</th>
<th id="Area">Area</th>
<th id="Piso">Piso</th>
<th id="id_edificio">id_edificio</th>

</thead>
<tbody>
<?php
    foreach ($Salas as$sala) {

    echo' <tr>';
       echo' <h5 class="Subtitle"><td>'.$sala->id.'</a></td><td> '. $sala->Area .'</td><td>' .$sala->Piso . '</td><td>'. $sala->id_edificio . '</td></h5>
     </tr>';

    }


    ?>


     </tbody>
            </table>
        </div>
    </div>
</div>

        </body>
