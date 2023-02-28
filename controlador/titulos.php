<?php
session_start(); 
include_once 'conexion.php';
  $con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      print_r ($_FILES);
      $tamano = $_FILES['anexo']['size'];   
                  echo $tamano; 
              if (! ($_FILES['anexo']["error"] > 0) ){   
                  $tamano = $_FILES['anexo']['size'];   
                  echo $tamano;   
                  if($tamano > 0) {                     
                           $url= move_uploaded_file($_FILES['anexo']['tmp_name'],  
                              "anexos/diploma".$_SESSION['username'].$_POST['tituloNombre'].".pdf");
                            $sql="INSERT INTO tbltitulos (nombreTitulo, institucion, anexo, nivel, cedula) VALUES ('$_POST[tituloNombre]', '$_POST[institucion]','si','$_POST[nivel]', '$_SESSION[username]')";
                            $consulta=$con->prepare($sql);
                            $consulta->execute();
                            header('Location: ../template/views/respuesta.php');
                    }
                  }
                }
            
                
?> 