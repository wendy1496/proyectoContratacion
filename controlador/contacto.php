<?php
$nombres=isset($_REQUEST['txtNombre'])?$_REQUEST['txtNombre']:"";
$apellidos=isset($_REQUEST['txtApellido'])?$_REQUEST['txtApellido']:"";
$correo=isset($_REQUEST['txtCorreo'])?$_REQUEST['txtCorreo']:"f";
$telefono=isset($_REQUEST['txtTelefono'])?$_REQUEST['txtTelefono']:"";
$mensaje=isset($_REQUEST['txtMensaje'])?$_REQUEST['txtMensaje']:"";
include_once "conexion.php";
$con= new conexion(); 
$con= $con->conectar();
if($con==null)
	echo "No se pudo conectar";
else{
	include_once "../modelo/contactomod.php";
	$enviar= new Contacto();
	$resultado= $enviar->insertar($con,$nombres,$apellidos,$correo,$telefono,$mensaje);
	echo ($resultado);
}

?>

