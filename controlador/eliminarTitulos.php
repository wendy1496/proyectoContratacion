<?php
include_once "conexion.php";
session_start();
$titulos_id= $_GET['titulos_id'];

$con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $sql="DELETE FROM tblTitulos where titulos_id = '$titulos_id'";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          header('Location: ../template/views/respuesta.php?mensaje=eliminado');
         
}
