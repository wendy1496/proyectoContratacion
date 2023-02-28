<?php
session_start(); 
include_once 'conexion.php';
  $con=new Conexion();
  $con=$con->conectar();
  $arl=$_POST['arl'];
$fechaArl=$_POST['fechaArl'];
$nomEps=$_POST['nomEps'];
$nomPension=$_POST['nomPension'];
$tieneArl = $_POST['CARL'];
  //print_r ($_POST); 
    if($con){ 
       $sql1="SELECT * FROM tbllistaAnexos";  
                  $consulta1=$con->prepare($sql1);
                  $consulta1->execute();  
                  while ($fila1=$consulta1->fetch(PDO::FETCH_ASSOC)){ 
                        $nombre = $fila1['nombre'];
                        $titulo = $fila1['titulo'];
                        $texto = $fila1['texto'];    
                        $observacion = 'observacion'.$fila1['nombre'];                         
                        $sql="UPDATE tblanexos SET $nombre='$_POST[$nombre]', estadoa = '$_POST[estadoa]' WHERE usuario = '$_POST[usuario]' ";
                          $consulta=$con->prepare($sql);
                          $consulta->execute(); 
                        if ($_POST[$observacion] != ""){
                          $sql3= "INSERT INTO `tblObservaciones`(`nombre`, `usuario`, `observacion`) VALUES ('$nombre','$_POST[usuario]','$_POST[$observacion]')";
                          $consulta3=$con->prepare($sql3);
                          $consulta3->execute(); 
                        }
                    }
                    $sql2="UPDATE tblseguridad SET `nomEps`='$nomEps', `nomPension`='$nomPension', `tieneArl`='$tieneArl', `arl`='$arl',`fechaArl`='$fechaArl' WHERE usuario = '$_POST[usuario]' ";
                $consulta=$con->prepare($sql2);
                $consulta->execute();
                  }
                  header('Location: ../template/views/verContratista.php?usuario='.$_POST['usuario']);

?>    
		
	
 