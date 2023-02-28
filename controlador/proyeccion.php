<?php
session_start(); 
include_once 'conexion.php';
$usuario= $_REQUEST['usuario'];
$honorarios= $_REQUEST['honorarios'];
$inicio= $_REQUEST['inicio'];
$final= $_REQUEST['final'];
$periodo= $_REQUEST['periodo'];
$prefijo = "DEX_";
$numContrato= $prefijo.$periodo;
$valorDia = $honorarios / 30; 
$plazo = $_REQUEST['plazo'];
$contrato = $_REQUEST['contrato'];
$valorContrato = $plazo * $valorDia;
$valorContratoF = number_format($valorContrato, 0 , '', '.');
$honorariosF = number_format($honorarios, 0 , '', '.');
$contratoF = number_format($valorContrato, 0 , '', '.');

print_r($_REQUEST);

  $con=new Conexion();
  $con=$con->conectar();
    if($con){  
      $sql4="SELECT MAX( id ) id, MAX( consecutivo ) consecutivo, periodo FROM tblproyeccion t2 GROUP BY periodo ORDER BY consecutivo DESC LIMIT 1";  
      $consulta4=$con->prepare($sql4);
      $consulta4->execute();
      if($fila=$consulta4->fetch(PDO::FETCH_ASSOC)){
        if($fila['periodo'] == $periodo){
          $codigo1 = $fila['consecutivo'];
          $codigo1 +=1;
          $codigo = sprintf("%04d", $codigo1);
          $consecutivo = $prefijo.$codigo."_".$periodo;
      $sql3="SELECT * FROM tblcontratofinal WHERE usuario = $usuario";  
      $consulta3=$con->prepare($sql3);
      $consulta3->execute(); 
      print_r('entra a la consulta del periodo ');
        if($consulta3->fetch(PDO::FETCH_ASSOC)){
          $sql="UPDATE `tblproyeccion` SET `consecutivo`='$codigo', `numContrato`='$consecutivo', `periodo`='$periodo', `honorarios`='$honorarios', `inicio`='$inicio',`final`='$final',`plazo`='$plazo',`valorDia`='$valorDia',`valorContrato`='$valorContratoF' WHERE usuario='$usuario' ";
          $consulta=$con->prepare($sql);
          $consulta->execute();
           print_r(' hace el update de proyeccion1');
          $sql2="UPDATE `tblcontratofinal` SET `honorarios`='$honorariosF',`valorContrato`='$contratoF'";
          $consulta2=$con->prepare($sql2);
          $consulta2->execute();
           print_r('contrato1');
          header('Location: ../template/views/verContratista.php?usuario='.$usuario);         
        
        }else{
          $sql="UPDATE `tblproyeccion` SET  `consecutivo`='$codigo', `numContrato`='$consecutivo', `periodo`='$periodo', `honorarios`='$honorarios', `inicio`='$inicio',`final`='$final',`plazo`='$plazo',`valorDia`='$valorDia',`valorContrato`='$valorContratoF' WHERE usuario='$usuario' ";
          $consulta=$con->prepare($sql);
          $consulta->execute();
           print_r('proyeccion2');
          $sql2="INSERT INTO `tblcontratofinal` ( `contrato` , `usuario` , `honorarios` , `valorContrato` ) VALUES ('$consecutivo', '$usuario', '$honorariosF', '$valorContratoF')";
          $consulta2=$con->prepare($sql2);
          $consulta2->execute();
          print_r('contrato2');
          header('Location: ../template/views/verContratista.php?usuario='.$usuario);     
        }
        } else {
          $codigo1 = 1;
          $codigo = sprintf("%04d", $codigo1);
          $consecutivo = $prefijo.$codigo."_".$periodo;
      $sql3="SELECT * FROM tblcontratofinal WHERE usuario = $usuario";  
      $consulta3=$con->prepare($sql3);
      $consulta3->execute(); 
      print_r('entra a la consulta del periodo ');
        if($consulta3->fetch(PDO::FETCH_ASSOC)){
          $sql="UPDATE `tblproyeccion` SET `consecutivo`='$codigo', `numContrato`='$consecutivo', `periodo`='$periodo', `honorarios`='$honorarios', `inicio`='$inicio',`final`='$final',`plazo`='$plazo',`valorDia`='$valorDia',`valorContrato`='$valorContratoF' WHERE usuario='$usuario' ";
          $consulta=$con->prepare($sql);
          $consulta->execute();
           print_r(' hace el update de proyeccion1');
          $sql2="UPDATE `tblcontratofinal` SET `honorarios`='$honorariosF',`valorContrato`='$contratoF'";
          $consulta2=$con->prepare($sql2);
          $consulta2->execute();
           print_r('contrato1');
          header('Location: ../template/views/verContratista.php?usuario='.$usuario);         
        
        }else{
          $sql="UPDATE `tblproyeccion` SET  `consecutivo`='$codigo', `numContrato`='$consecutivo', `periodo`='$periodo', `honorarios`='$honorarios', `inicio`='$inicio',`final`='$final',`plazo`='$plazo',`valorDia`='$valorDia',`valorContrato`='$valorContratoF' WHERE usuario='$usuario' ";
          $consulta=$con->prepare($sql);
          $consulta->execute();
           print_r('proyeccion2');
          $sql2="INSERT INTO `tblcontratofinal` ( `contrato` , `usuario` , `honorarios` , `valorContrato` ) VALUES ('$consecutivo', '$usuario', '$honorariosF', '$valorContratoF')";
          $consulta2=$con->prepare($sql2);
          $consulta2->execute();
          print_r('contrato2');
          header('Location: ../template/views/verContratista.php?usuario='.$usuario);     
        }
        }
      }
    }  

?>    
	