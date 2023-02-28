<?php
        include_once '../../controlador/conexion.php';
          $con=new Conexion();
          $con=$con->conectar();  
          $titulos_id = $_GET['titulos_id'];
          if($con){      
              $sql="SELECT * FROM tblTitulos WHERE titulos_id= '".$titulos_id."'";  
                  $consulta=$con->prepare($sql);
                  $consulta->execute();  
                  if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
                  ?>                 
<iframe src="<?php ECHO 'anexos/diploma'.$_SESSION['username'].$fila['tituloNombre'].'.pdf' ?>" style="width:100%; height:600px;" frameborder="0"></iframe>
<?php
                    }  
                }
              ?>