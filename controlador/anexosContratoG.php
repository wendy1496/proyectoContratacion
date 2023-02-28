<?php
session_start(); 
include_once 'conexion.php';
  $con=new Conexion();
  $con=$con->conectar();
    if($con){ 
        $sql1="SELECT * FROM tbllistaanexoscontratos";  
                  $consulta1=$con->prepare($sql1);
                  $consulta1->execute();  
                  while ($fila1=$consulta1->fetch(PDO::FETCH_ASSOC)){ 
                        $nombre = $fila1['nombre'];
                        $titulo = $fila1['titulo'];
                        $texto = $fila1['texto'];
                        if (! ($_FILES[$nombre]["error"] > 0) ){   
                            $tamano = $_FILES[$nombre]['size'];      
                        if($tamano > 0) {                     
                            move_uploaded_file($_FILES[$nombre]['tmp_name'],  "anexos/".$texto.$_POST['usuario'].".pdf");
                            echo "Hoja de vida subida correctamente";
                            $sql="UPDATE `tblanexoscontratos` SET $nombre='Guardado' WHERE usuario = '$_POST[usuario]' ";
                            $consulta=$con->prepare($sql);
                            $consulta->execute();
                    }
                  }
                }
            }

            header('Location: ../template/views/verContratista.php?usuario='.$_POST['usuario']);  
?>    
		

