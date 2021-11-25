<?php



function validate_password(){
    $Macro_MIN=10;
    $password=$_POST["password"];
    if($password ==NULL){
        echo 'n value'; 
return;
    }
if(  count($password)<$Macro_MIN){
    echo 'TOO SHORT';

return;
}
$j=0;
$j2=0;
$j3=0;
for($i=0;$i<count($password);$i++){
    switch($password[$i]){
case $password[$i]>='0' && $password[$i]<='9':
    $j=1;
break;
case $password[$i]>='a' && $password[$i]<='z':
    $j2=1;
    break;
    case $password[$i]>='A' && $password[$i]<='Z':
        $j3=1;
        break;
     
        default:
        break;
    }

}
if($j==0){

echo'NO NUMBERS';

}
if($j2==0){

    echo'NO M Chars';
    
    }
    if($j3==0){

        echo'NO S Chars';
        
        }
}

?>