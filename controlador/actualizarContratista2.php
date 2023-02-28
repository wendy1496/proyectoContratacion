<?php
session_start(); 
include_once 'conexion.php';

$cedula = $_REQUEST['cedula'];
$contratista = $_REQUEST['contratista'];
$telefono = $_REQUEST['telefono'];
$correo = $_REQUEST['correo'];
$obligaciones = $_REQUEST['obligaciones'];
$rol = $_REQUEST['rol'];

  $con=new Conexion();
  $con=$con->conectar();
    if($con){  
          $sql2="UPDATE tblcontratista SET contratista = '$contratista' , 
          telefono = '$telefono', correo = '$correo', obligaciones = '$obligaciones' WHERE cedulaContratista='$cedula'";
          $consulta=$con->prepare($sql2);
          $consulta->execute();
          header('Location: ../template/views/contratista.php');         
       }       
?>    
	