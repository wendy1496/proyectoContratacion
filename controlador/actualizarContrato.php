<?php
session_start(); 
include_once 'conexion.php';

$numContrato= $_REQUEST['numContrato'];
$nombreContrato= $_REQUEST['nombreContrato'];
$entidadConvenio= $_REQUEST['entidadConvenio'];
$objeto= $_REQUEST['objeto'];
$fechaInicio= $_REQUEST['fechaInicio'];
$fechaFinal= $_REQUEST['fechaFinal'];
$valor= $_REQUEST['valorActual'];
$supervisor= $_REQUEST['supervisor'];
$identificacion= $_REQUEST['identificacion'];
$rol= $_REQUEST['rol'];
$estado = $_REQUEST['estado'];
$periodo= $_REQUEST['periodo'];
$centroCostos = $_REQUEST['centroCostos'];
$planAccion = $_REQUEST['planAccion'];
print_r($_REQUEST);
  $con=new Conexion();
  $con=$con->conectar();
    if($con){  
          $sql="UPDATE tblcontratos SET numContrato = '$numContrato', nombreContrato = '$nombreContrato', periodo = '$periodo' , planAccion = '$planAccion', entidadConvenio = '$entidadConvenio', centroCostos = '$centroCostos', objeto = '$objeto', fechaInicio = '$fechaInicio', fechaFinal = '$fechaFinal', valor = '$valor', supervisor = '$supervisor', identificacion = '$identificacion', rol = '$rol', estado = '$estado' WHERE numContrato='$numContrato'";
          $consulta=$con->prepare($sql);
          $consulta->execute();
          header('Location: ../template/views/contratos.php');         
       }       
?>    
	