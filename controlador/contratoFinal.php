<?php
session_start(); 
include_once 'conexion.php';
  $con=new Conexion();
  $con=$con->conectar();
  $usuario = $_POST['usuario'];
    if($con){ 
      $sql3="SELECT * FROM tblanexoscontratos WHERE usuario = $usuario";  
          $consulta3=$con->prepare($sql3);
          $consulta3->execute(); 
          print_r($_REQUEST);
if(!$consulta3->fetch(PDO::FETCH_ASSOC)){
         $sql= "UPDATE `tblcontratofinal` SET `honorariosLetras`= '$_POST[honorariosLetras]',`tipoContrato`= '$_POST[tipoContrato]',`contratoLetras`='$_POST[contratoLetras]',`numCDP`='$_POST[numCDP]',`valorCDP`='$_POST[valorCDP]',`fechaCDP`='$_POST[fechaCDP]',`desplazamiento`='$_POST[desplazamiento]',`CDPDesplazamiento`='$_POST[CDPDesplazamiento]',`valorCDPDesplazamiento`='$_POST[valorCDPDesplazamiento]',`fechaCDPDesplazamiento`='$_POST[fechaCDPDesplazamiento]',`fechaCDPDesplazamiento2`='$_POST[fechaCDPDesplazamiento2]',`numRP`='$_POST[numRP]',`valorRP`='$_POST[valorRP]',`fechaRP`='$_POST[fechaRP]', `identificacionNecesidad`='$_POST[necesidad]', `nombreD`='$_POST[nombreD]',`nomOrdenador`='$_POST[nomOrdenador]' WHERE usuario = '$_POST[usuario]'";                                                                                                                                                                                
          $consulta=$con->prepare($sql);
          $consulta->execute();
          $sql2="INSERT INTO `tblanexoscontratos`(`usuario`, `docGenerales`, `anexo`, `contrato`, `contratoFirmado`, `cdp`, `rp`, `cdpDesplazamiento`, `estudioPrevio`, `evaluacionAceptacion`, `analisisSector`, `actaInicio`)
                            VALUES ('$usuario', 'Sin subir', 'Sin subir', 'Sin subir', 'Sin subir', 'Sin subir', 'Sin subir', 'Sin subir', 'Sin subir', 'Sin subir', 'Sin subir', 'Sin subir')";
                            $consulta2=$con->prepare($sql2);
                            $consulta2->execute(); 
                            header('Location: ../template/views/verContratista.php?usuario='.$usuario);  
  }else{
    $sql= "UPDATE `tblcontratofinal` SET `honorariosLetras`= '$_POST[honorariosLetras]',`tipoContrato`= '$_POST[tipoContrato]',`contratoLetras`='$_POST[contratoLetras]',`numCDP`='$_POST[numCDP]',`valorCDP`='$_POST[valorCDP]',`fechaCDP`='$_POST[fechaCDP]',`desplazamiento`='$_POST[desplazamiento]',`CDPDesplazamiento`='$_POST[CDPDesplazamiento]',`valorCDPDesplazamiento`='$_POST[valorCDPDesplazamiento]',`fechaCDPDesplazamiento`='$_POST[fechaCDPDesplazamiento]',`fechaCDPDesplazamiento2`='$_POST[fechaCDPDesplazamiento2]',`numRP`='$_POST[numRP]',`valorRP`='$_POST[valorRP]',`fechaRP`='$_POST[fechaRP]', `identificacionNecesidad`='$_POST[necesidad]', `nombreD`='$_POST[nombreD]',`nomOrdenador`='$_POST[nomOrdenador]' WHERE usuario = '$_POST[usuario]'";                                                                                                       print_r('update');                                                                         
          $consulta=$con->prepare($sql);
          $consulta->execute();
          $sql2="UPDATE `tblanexoscontratos` SET `docGenerales`='Sin subir',`anexo`='Sin subir',`contrato`='Sin subir',`contratoFirmado`='Sin subir',`cdp`='Sin subir',`rp`='Sin subir',`cdpDesplazamiento`='Sin subir',`estudioPrevio`='Sin subir',`evaluacionAceptacion`='Sin subir',`analisisSector`='Sin subir',`actaInicio`='Sin subir' WHERE usuario = '$_POST[usuario]'";
                            $consulta2=$con->prepare($sql2);
                            $consulta2->execute(); 
                            print_r('   update2');
                            header('Location: ../template/views/verContratista.php?usuario='.$usuario);  
                    }
  }
              
                
?> 