<?php
session_start(); 
include_once 'conexion.php';
$arl=$_POST['arl'];
$fechaArl=$_POST['fechaArl'];
$nomEps=$_POST['nomEps'];
$nomPension=$_POST['nomPension'];
$tieneArl = $_POST['CARL'];
$cProceso = $_POST['cProceso'];
$respuesta = $_POST['respuesta'];
  $con=new Conexion();
  $con=$con->conectar();
    if($con){ 
        $sql1="SELECT * FROM tblListaAnexos";  
                  $consulta1=$con->prepare($sql1);
                  $consulta1->execute();  

                  while ($fila1=$consulta1->fetch(PDO::FETCH_ASSOC)){ 
                        $nombre = $fila1['nombre'];
                        $titulo = $fila1['titulo'];
                        $texto = $fila1['texto'];
                        
                        if (! ($_FILES[$nombre]["error"] > 0) ){   
                            $tamano = $_FILES[$nombre]['size'];  

                        if($tamano > 0) {                     
                            move_uploaded_file($_FILES[$nombre]['tmp_name'],  "anexos/".$texto.$_SESSION['username'].".pdf");
                            echo "Hoja de vida subida correctamente";
                            $sql="UPDATE tblanexos SET $nombre='Enviado', `estadoa`='Sin revisar',`cProceso`='$cProceso',`respuesta`='$respuesta' WHERE usuario = '$_SESSION[username]' ";
                            $consulta=$con->prepare($sql);
                            $consulta->execute();

                    }
                  }
                }
                $sql2="UPDATE tblseguridad SET `nomEps`='$nomEps', `nomPension`='$nomPension', `tieneArl`='$tieneArl', `arl`='$arl',`fechaArl`='$fechaArl' WHERE usuario = '$_SESSION[username]' ";
                $consulta=$con->prepare($sql2);
                $consulta->execute();
                print_r(' seguridad');
            }

            header('Location: ../template/views/respuesta.php');

?>    
  