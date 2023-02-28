<?php
session_start(); 
include_once 'conexion.php';

function getListasComponentes(){
  $con=new Conexion();
  $con=$con->conectar();
    if($con){  
      $numContrato=$_POST['numContrato'];
      $sql2="SELECT * FROM `tblcomponentes` WHERE numContrato = '$numContrato' ";  
      $consulta=$con->prepare($sql2);
      $consulta->execute();  
      $listas = '<option selected>Seleccione...</option>';
      while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){  
        $listas .= "<option value='$fila[componente_id]' required>$fila[dependencia]</option>";     
       }   
       return $listas;
      }
    }
      echo getListasComponentes();
    
?>    
	