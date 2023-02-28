<?php
session_start(); 
include_once 'conexion.php';
$usuario= $_REQUEST['usuario'];
$honorarios= $_REQUEST['honorarios'];
$smlv= $_REQUEST['smlv'];
$pensionado= $_REQUEST['pensionado'];
$tipoArl= $_REQUEST['tipoArl'];
$ibc= ($honorarios * 0.4);
if($ibc < $smlv){
    $ibc = $smlv;
}


if($pensionado == "no"){
    $pension = $ibc * 0.16;
}else if($pensionado == "si"){
    $pension = 0;
}

if($tipoArl == "1"){
    $arl = $ibc * 0.00522;
}else if($tipoArl == "2"){
    $arl = $ibc * 0.01044;
}else if($tipoArl == "3"){
    $arl = $ibc * 0.02436;
}else if($tipoArl == "5"){
    $arl = $ibc * 0.0696;
}

$salud = $ibc * 0.125;
$total = $salud + $pension + $arl;
$totalF = number_format($total, 0 , '', '.');

  $con=new Conexion();
  $con=$con->conectar();
    if($con){  
          $sql="UPDATE `tblibc` SET `smlv`='$smlv',`ibc`='$ibc',`salud`='$salud',`pension`='$pension',`arl`='$arl',`riesgo`='$tipoArl',`total`='$totalF' WHERE usuario='$usuario'";
          $consulta=$con->prepare($sql);
          $consulta->execute();
          header('Location: ../template/views/verContratista.php?usuario='.$usuario);         
       }      
?>    
	