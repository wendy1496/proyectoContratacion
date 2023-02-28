<?php
session_start(); 
include_once 'conexion.php';

$componente_id=$_REQUEST['componente_id'];
$dependencia=$_REQUEST['dependencia'];
$desplazamiento=$_REQUEST['desplazamiento'];
$numContrato=$_REQUEST['numContrato'];
$presupuesto=$_REQUEST['presupuesto'];
$subcomponente= $_REQUEST['subcomponente'];



  $con=new Conexion();
  $con=$con->conectar();
    if($con){  
          $sql="UPDATE tblcomponentes SET `dependencia`='$dependencia',`subcomponente`='$subcomponente',`desplazamiento`='$desplazamiento',`numContrato`='$numContrato',`presupuesto`='$presupuesto' WHERE componente_id='$componente_id'";
          $consulta=$con->prepare($sql);
          $consulta->execute();
          header('Location: ../template/views/componentes.php');         
       }       
?>    
	