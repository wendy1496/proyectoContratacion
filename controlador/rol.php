<?php
session_start(); 
include_once 'conexion.php';
  $con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $sql3="SELECT * FROM `tblrol` WHERE id = '$_POST[id]'";  
          $consulta3=$con->prepare($sql3);
          $consulta3->execute(); 

      if($consulta3->fetch(PDO::FETCH_ASSOC)){
                            $sql = "UPDATE `tblrol` SET `nombre`='$_POST[nombre]',`rolD`='$_POST[rol]' WHERE id = '$_POST[id]' ";
                            $consulta=$con->prepare($sql);
                            $consulta->execute();
                            header('Location: ../template/views/registrarRol.php?mensaje=actualizado');
    
                  
      }else{
                            $sql="INSERT INTO tblrol (id, nombre, rolD) VALUES ('$_POST[id]', '$_POST[nombre]', '$_POST[rol]')";
                            $consulta=$con->prepare($sql);
                            $consulta->execute();
                            header('Location: ../template/views/registrarRol.php?mensaje=enviado');
                    }
                  }
               
                
?> 