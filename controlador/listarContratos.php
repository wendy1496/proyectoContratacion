<?php
session_start(); 
include_once 'conexion.php';
function getListasContratos(){
  $con=new Conexion();
  $con=$con->conectar();
    if($con){  
      $sql2="SELECT * FROM tblcontratos";  
      $consulta=$con->prepare($sql2);
      $consulta->execute();  
      $listas = '<option selected>Seleccione...</option>';
      while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){  
        $listas .= "<option value='$fila[numContrato]'>$fila[entidadConvenio] - $fila[numContrato]</option>";     
       }   
       return $listas;
      }
    }
      echo getListasContratos();
?>    
	