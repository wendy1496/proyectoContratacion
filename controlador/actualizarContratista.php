<?php
session_start(); 
include_once 'conexion.php';

$cedula = $_POST['cedula'];
$contratista = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$fijo = $_POST['fijo'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];


  $con=new Conexion();
  $con=$con->conectar();
    if($con){  
          $sql="UPDATE tblusuarios SET cedula = '$cedula', nombre = '$contratista' , 
          fechaNacimiento = '$fechaNacimiento', correo = '$correo', telefono = '$telefono', fijo = '$fijo', direccion = '$direccion', ciudad = '$ciudad' WHERE usuario='$_SESSION[username]'";
          $consulta=$con->prepare($sql);
          $consulta->execute();
          $sql2="UPDATE tblcontratista SET contratista = '$contratista' , 
          telefono = '$telefono', correo = '$correo' WHERE cedulaContratista='$_SESSION[username]'";
          $consulta=$con->prepare($sql2);
          $consulta->execute();
          header('Location: ../template/views/respuesta.php?mensaje=actualizado');         
       }       
?>    
	