<?php
include_once "conexion.php";
session_start();
$numContrato= $_REQUEST['numContrato'];
//$nombreContrato= $_REQUEST['nombreContrato'];
$entidadConvenio= $_REQUEST['entidadConvenio'];
$objeto= $_REQUEST['objeto'];
$fechaInicio= $_REQUEST['fechaInicio'];
$fechaFinal= $_REQUEST['fechaFinal'];
$valor= $_REQUEST['valor'];
$supervisor= $_REQUEST['supervisor'];
$identificacion= $_REQUEST['identificacion'];
//$rol= $_REQUEST['rol'];
$estado = $_REQUEST['estado'];
//$periodo= $_REQUEST['periodo'];
$centroCostos = $_REQUEST['centroCostos'];
$planAccion = $_REQUEST['planAccion'];
print_r($_REQUEST);
$con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $sql="INSERT INTO `tblcontratos`(`numContrato`, `planAccion`,`entidadConvenio`, `centroCostos`, `objeto`, `fechaInicio`, `fechaFinal`, `valor`, `supervisor`, `identificacion`, `estado`)
       VALUES ('$numContrato', '$planAccion', '$entidadConvenio', '$centroCostos', '$objeto','$fechaInicio','$fechaFinal','$valor','$supervisor','$identificacion', '$estado') ";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          header('Location: ../template/views/contratos.php?mensaje=registrado');
         
}
