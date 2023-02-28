<?php
session_start(); 
include_once 'conexion.php';
  $con=new Conexion();
  $con=$con->conectar();
  $estadoT=$_REQUEST['estadoT'];
  $usuario = $_REQUEST['usuario'];
$titulos_id = $_POST['titulos_id'];
  //print_r ($_POST); 
    if($con){ 
       $sql1="SELECT * FROM tblListaAnexosPermanentes";  
                  $consulta1=$con->prepare($sql1);
                  $consulta1->execute();  
          $sql2="UPDATE tbltitulos SET `estado`='$estadoT' WHERE cedula='$_POST[usuario]' AND titulos_id = '$titulos_id' ";
          $consulta=$con->prepare($sql2);
          $consulta->execute();
                  while ($fila1=$consulta1->fetch(PDO::FETCH_ASSOC)){ 
                        $nombre = $fila1['nombre'];
                        $titulo = $fila1['titulo'];
                        $texto = $fila1['texto'];    
                        $observacion = 'observacion'.$fila1['nombre'];                         
                        $sql="UPDATE tblanexosPermanentes SET $nombre='$_POST[$nombre]', estado = '$_POST[estado]' WHERE usuario = '$usuario' ";
                          $consulta=$con->prepare($sql);
                          $consulta->execute(); 
                        if ($_POST[$observacion] != ""){
                          $sql3= "INSERT INTO `tblobservaciones`(`nombre`, `usuario`, `observacion`) VALUES ('$nombre','$usuario','$_POST[$observacion]')";
                          $consulta3=$con->prepare($sql3);
                          $consulta3->execute(); 
                        }
                    }
                  }
       header('Location: ../template/views/verContratista.php?usuario='.$usuario);

?>    
		

	