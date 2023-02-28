<?php
session_start(); 
include_once 'conexion.php';
function getListasComponentes(){
  $con=new Conexion();
  $con=$con->conectar();
    if($con){  
      $sql2="SELECT a.nombreContrato, b.dependencia, b.componente_id FROM tblcontratos a INNER JOIN tblcomponentes b ON b.numContrato = a.numContrato ";  
      $consulta=$con->prepare($sql2);
      $consulta->execute();  
      $listas = '<option selected>Seleccione...</option>';
      while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){  
        $listas .= "<option value='$fila[componente_id]'>$fila[dependencia] - $fila[nombreContrato]</option>";     
       }   
       return $listas;
      }
    }
      echo getListasComponentes();
?> 
	