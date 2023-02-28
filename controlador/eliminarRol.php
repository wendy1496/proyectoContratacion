<?php
include_once "conexion.php";
session_start();
$id= $_GET['id'];

$con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $sql="DELETE FROM `tblrol` WHERE id = '$id'";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          header('Location: ../template/views/registrarRol.php?mensaje=eliminado');
         
}
