<?php
session_start();

$userChoice=$_POST["myAnswer"];
if ($userChoice%2==0){
    $userChoice=2;
}
else{
    $userChoice=1;
}



array_push($_SESSION['arrayX'],"$userChoice");

//array_push($arrayX,"1");
//echo $arrayX[0] ;echo $arrayX[1];

for($i=0;$i<count($_SESSION['arrayX']);$i++){
  $sum+=pow(10,$i)*$_SESSION['arrayX'][$i];
}
//echo $sum;
$stringNumber=strval($sum);
$stringNumber= strrev ( $stringNumber );
$intNumber=(int)$stringNumber;

//echo $intNumber;


if (count($_SESSION['arrayX'])==3){
    header("Location:final.php?x=$intNumber");
}
else{
    header("Location:questions.php?x=$intNumber");
}



?>