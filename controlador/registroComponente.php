<?php
include_once "conexion.php";
session_start();

$componente_id=$_REQUEST['componente_id'];
$dependencia=$_REQUEST['dependencia'];
$desplazamiento=$_REQUEST['desplazamiento'];
$numContrato=$_REQUEST['numContrato'];
$presupuesto=$_REQUEST['presupuesto'];
$subcomponente= $_REQUEST['subcomponente'];
print_r($_REQUEST);

$con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $sql="INSERT INTO `tblcomponentes`(`dependencia`, `subcomponente`, `desplazamiento`, `numContrato`, `presupuesto`)
       VALUES ('$dependencia','$subcomponente','$desplazamiento','$numContrato','$presupuesto') ";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          header('Location: ../template/views/componentes.php?mensaje=registrado');


}
?>
