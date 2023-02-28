<?php
include_once 'conexion.php';
session_start();
$cedula = $_REQUEST['cedula'];
$contratista = $_REQUEST['contratista'];
$telefono = $_REQUEST['telefono'];
$correo = $_REQUEST['correo'];
$obligaciones = $_REQUEST['obligaciones'];
$rol = $_REQUEST['rol'];
$componente = $_REQUEST['rolcomponente_id'];


print_r($_REQUEST);



  $con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $sql3="SELECT * FROM tblcontratista WHERE cedulaContratista = $cedula";  
          $consulta3=$con->prepare($sql3);
          $consulta3->execute(); 
print_r('consulta');
      if($consulta3->fetch(PDO::FETCH_ASSOC)){
        $sql4="UPDATE tblusuarios SET cedula = '$cedula', nombre = '$contratista', correo = '$correo', telefono = '$telefono' WHERE cedula='$cedula'";
        $consulta=$con->prepare($sql4);
        $consulta->execute();
        print_r('usuario');
        $sql5="UPDATE tblcontratista SET contratista = '$contratista', telefono = '$telefono', correo = '$correo', obligaciones = '$obligaciones', rol = '$rol', rolcomponente_id = '$componente' WHERE cedulaContratista='$cedula'";
        $consulta=$con->prepare($sql5);
        $consulta->execute();
        print_r('contratista');
        $sql13="UPDATE `tblanexos` SET `ofertaServicios`='Sin enviar',`hvPublica`='Sin enviar',`libretaMilitar`='Sin enviar',`certificadoProcuraduria`='Sin enviar',`certificadoContraloria`='Sin enviar',`certificadoPolicia`='Sin enviar',`certificadoCodigoPolicia`='Sin enviar',      `inhabilidadesDelitos` ='Sin enviar', `declaracionBienes`='Sin enviar',`certificadosLaborales`='Sin enviar',`certificadoTarjeta`='Sin enviar',`certificadoRetencion`='Sin enviar',`certificadoSalud`='Sin enviar',`certificadoPension`='Sin enviar',`estadoa`='Sin revisar' WHERE usuario='$cedula'";
        $consulta=$con->prepare($sql13);
        $consulta->execute();
        print_r('anexos');
        $sql14="UPDATE `tblseguridad` SET `nomEps`='',`nomPension`='',`tieneArl`='',`arl`='',`fechaArl`='' WHERE usuario='$cedula'";
        $consulta=$con->prepare($sql14);
        $consulta->execute();
        print_r('seguridad');
        $sql161="DELETE FROM `tblproyeccion` WHERE usuario='$cedula' ";
        $consulta=$con->prepare($sql161);
        $consulta->execute();
         $sql161="DELETE FROM `tblcontratofinal` WHERE usuario='$cedula' ";
        $consulta=$con->prepare($sql161);
        $consulta->execute();
        print_r('proyeccioneliminar');
        $sql162="INSERT INTO `tblproyeccion`(`usuario`) VALUES ('$cedula')";
        $consulta=$con->prepare($sql162);
        $consulta->execute();
        print_r('proyexxion');
        $sql17="UPDATE `tblibc` SET `smlv`='0',`ibc`='0',`salud`='0',`pension`='0',`arl`='0',`riesgo`='0',`total`='0' WHERE usuario='$cedula' ";
       
        $consulta=$con->prepare($sql17);
        $consulta->execute();
        $sql161="DELETE FROM `tblcontratofinal` WHERE usuario='$cedula' ";
        $consulta=$con->prepare($sql161);
        $consulta->execute();

        header('Location: ../template/views/contratista.php?mensaje=actualizado');
        
      }else{
         $sql="INSERT INTO `tblcontratista`(`cedulaContratista`, `contratista`, `telefono`, `correo`, `obligaciones`, `rol`, `rolcomponente_id`)
        VALUES ('$cedula','$contratista','$telefono','$correo','$obligaciones','$rol','$componente') ";  
           $consulta=$con->prepare($sql);
           $consulta->execute(); 
            print_r('holaaaaaaa');
           $sql2="INSERT INTO `tblusuarios`(`cedula`, `nombre`, `correo`, `telefono`, `rol`, `usuario`, `contrasena`) 
           VALUES ('$cedula','$contratista','$correo','$telefono','$rol','$cedula','$cedula')";
           $consulta2=$con->prepare($sql2);
           $consulta2->execute(); 
           $sql8="INSERT INTO `tblanexosPermanentes`(`usuario`, `cedula`, `rut`, `tarjetaProfesional`, `certificadoCuenta`, `examenMedico`, `inhabilidades`, `estado`) 
           VALUES ('$cedula', 'Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin revisar')";
           $consulta8=$con->prepare($sql8);

           $consulta8->execute(); 
           $sql9="INSERT INTO `tblanexos`(`usuario`, `ofertaServicios`, `hvPublica`, `libretaMilitar`, `certificadoProcuraduria`, `certificadoContraloria`, `certificadoPolicia`, `certificadoCodigoPolicia`, `inhabilidadesDelitos`,`declaracionBienes`, `certificadosLaborales`, `certificadoTarjeta`, `certificadoRetencion`, `certificadoSalud`, `certificadoPension`, `estadoa`)
            VALUES ('$cedula', 'Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin enviar','Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin revisar')";
           $consulta9=$con->prepare($sql9);
           $consulta9->execute();  
          $sql10="INSERT INTO `tblibc`(`usuario`) VALUES ('$cedula')";
          $consulta9=$con->prepare($sql10);
          $consulta9->execute();  
          $sql11="INSERT INTO `tblproyeccion`(`usuario`) VALUES ('$cedula')";
          $consulta=$con->prepare($sql11);
          $consulta->execute();   
           $sql12="INSERT INTO `tblseguridad`(`usuario`) VALUES ('$cedula')";
           $consulta9=$con->prepare($sql12);
           $consulta9->execute();    
           

    header('Location: ../template/views/contratista.php?mensaje=registrado');           
        }       
}


?>  