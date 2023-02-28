<?php
session_start(); 
include_once 'conexion.php';

$rolcomponente_id=$_REQUEST['componente_id'];
$dependencia=$_REQUEST['dependencia'];
$rolDep=$_REQUEST['rolDep'];
$perfil=$_REQUEST['perfil'];
$objetoContratar=$_REQUEST['objetoContratar'];
$honorarios=$_REQUEST['honorarios'];
$cantidadPersonas=$_REQUEST['cantidadPersonas'];
$tiempoDias=$_REQUEST['tiempoDias'];
$valorDia=$_REQUEST['valorDia'];
$valorTotalPresup=$_REQUEST['valorTotalPresup'];
$valorTotalContra=$_REQUEST['valorTotalContra'];
$fechaApertura=$_REQUEST['fechaApertura'];
$fechaCierre=$_REQUEST['fechaCierre'];
$horaCierre=$_REQUEST['horaCierre'];
$fechaPublicacion=$_REQUEST['fechaPublicacion'];
$medioPublicacion=$_REQUEST['medioPublicacion'];
$adiciones=$_REQUEST['adiciones'];

  $con=new Conexion();
  $con=$con->conectar();
    if($con){  
          $sql="UPDATE tblrolcomponente SET `rolDep`='$rolDep',`perfil`='$perfil',`objetoContratar`='$objetoContratar',`honorarios`='$honorarios',`cantidadPersonas`='$cantidadPersonas',`tiempoDias`='$tiempoDias',`valorDia`='$valorDia',`valorTotalPresup`='$valorTotalPresup',`valorTotalContra`='$valorTotalContra',`fechaApertura`='$fechaApertura',`fechaCierre`='$fechaCierre',`horaCierre`='$horaCierre',`fechaPublicacion`='$fechaPublicacion',`medioPublicacion`='$medioPublicacion',`adiciones`='$adiciones' WHERE rolcomponente_id='$rolcomponente_id'";
          $consulta=$con->prepare($sql);
          $consulta->execute();
          header('Location: ../template/views/componentes.php');         
       }       
?>    
	