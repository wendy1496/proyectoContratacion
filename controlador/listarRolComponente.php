<?php
session_start(); 
include_once 'conexion.php';

function getListasComponentes(){
  $con=new Conexion();
  $con=$con->conectar();
    if($con){  
      $dependencia=$_POST['dependencia'];
      $sql2="SELECT * FROM `tblrolcomponente` WHERE componente_id = '$dependencia' ";  
      $consulta=$con->prepare($sql2);
      $consulta->execute();  
      $listas = '<option selected>Seleccione...</option>';
      while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){  
        $listas .= "<option value='$fila[rolcomponente_id]'>$fila[rolDep]</option>";     
       }   
       return $listas;
      }
    }
      echo getListasComponentes();
    
?>     
	