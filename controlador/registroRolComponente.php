<?php
include_once "conexion.php";
session_start();

$dependencia=$_REQUEST['dependencia'];
$rolDep=$_REQUEST['rolDep'];
$perfil=$_REQUEST['perfil'];
$objetoContratar=$_REQUEST['objetoContratar'];
$honorarios=$_REQUEST['honorarios'];
$cantidadPersonas=$_REQUEST['cantidadPersonas'];
$tiempoDias=$_REQUEST['tiempoDias'];
$valorDia=$_REQUEST['valorDia'];
$valorTotalPresup=$_REQUEST['valorTotalPresup'];
$valorTotalContra=$_REQUEST['valorTotalContra'];
$desplazamiento=$_REQUEST['desplazamiento'];
$numContrato=$_REQUEST['numContrato'];
$presupuesto=$_REQUEST['presupuesto'];
$subcomponente= $_REQUEST['subcomponente'];
print_r($_REQUEST);

$con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $sql="INSERT INTO `tblrolcomponente`(`rolDep`, `perfil`, `objetoContratar`, `honorarios`, `cantidadPersonas`, `tiempoDias`, `valorDia`, `valorTotalPresup`, `valorTotalContra`, `componente_id`)
       VALUES ('$rolDep','$perfil','$objetoContratar','$honorarios','$cantidadPersonas','$tiempoDias','$valorDia','$valorTotalPresup','$valorTotalContra','$dependencia') ";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          header('Location: ../template/views/componentes.php?mensaje2=registrado');


}
?>
