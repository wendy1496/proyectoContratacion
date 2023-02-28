<?php  
  include_once "header.php"
?>
<?php
  session_start();   
?>  
<nav class="navbar navbar-expand-lg navbar-light bg-light container mb-4">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
    <div>
      <a class="btn" href="listaRevision.php"><i class="fas fa-undo-alt"></i> VOLVER AL LISTADO REVISIÓN </a>
    </div>
  </div>
  <div>
    <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                ?>
      <a class="btn" href="../views/inicioSesion.php">Salir <i class="fas fa-sign-out-alt"></i></a>
      <?php                
              }
            ?>
    </div>
</nav>
<div class="accordion container mb-4 mt-4" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Datos Personales
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <form action="../../controlador/actualizarContratista.php" method="post"  enctype="multipart/form-data" class="img-form">
 <div class="overlay">
      <div class="container">

        <h5 class="text-center pt-3 pb-3">DATOS PERSONALES</h5>
        <?php
include_once '../../controlador/conexion.php';
  $con=new Conexion();
  $con=$con->conectar();
  $usuario = $_REQUEST['usuario'];
  if($con){ 
      $sql="SELECT * FROM tblUsuarios WHERE usuario='$usuario' ";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
          ?>
         <div class="row pt-2 pb-2">
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Nombres y Apellidos</label>
              <input class="form-control text-secondary" type="" name="nombre" placeholder="Nombre Contratista" value="<?php echo $fila['nombre'] ?>" required>
            </div>
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Cédula</label>
              <input class="form-control text-secondary" type="" id="cedula" name="cedula" placeholder="Cédula Contratista" value="<?php echo $fila['cedula'] ?>" required>
            </div>

          </div>
          <div class="row pt-2 pb-2">

            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Fecha de Nacimiento</label>
              <input class="form-control text-secondary" type="date" name="fechaNacimiento" value="<?php echo $fila['fechaNacimiento'] ?>">
            </div>
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Correo Electrónico</label>
              <input class="form-control text-secondary" type="email" name="correo" value="<?php echo $fila['correo'] ?>">
            </div>
          </div> 
          <div class="row pt-2 pb-2">
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Teléfono</label>
              <input class="form-control text-secondary" type="" name="fijo" placeholder="Teléfono" value="<?php echo $fila['fijo'] ?>">
            </div>
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Celular
              </label>
              <input class="form-control text-secondary" type="" name="telefono" placeholder="Celular" value="<?php echo $fila['telefono'] ?>">
            </div>
          </div> 
          <div class="row pt-2 pb-2">

            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Dirección</label>
              <input class="form-control text-secondary" type="" name="direccion" placeholder="Direccion" value="<?php echo $fila['direccion'] ?>">
            </div>
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Ciudad</label>
              <input class="form-control text-secondary" type="" name="ciudad" placeholder="Ciudad" value="<?php echo $fila['ciudad'] ?>">
            </div>
          </div> 

         
          
          <?php
              }  
          }
        ?> 
          </div>
          </div>
</form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        Títulos Profesionales
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form action="../../controlador/actualizarObservaciones.php"  method="post"  enctype="multipart/form-data" class="img-form">
          <div class="overlay">
               <div class="container">
        <h5 class="pt-2 pb-2 text-dark text-center">Títulos Profesionales</h5>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                    <th>Nombre Título</th>
                    <th>Nivel</th>
                    <th>Visualizar</th>
                    <th>Observaciones</th>
                  </tr>
              </thead>
              <tbody>
                <?php
              
            if($con){      
              $sql="SELECT * FROM tblTitulos WHERE cedula = '$usuario'";  
              $consulta=$con->prepare($sql);
              $consulta->execute();  
              while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
              ?>
                  <tr>
                    <td><?php echo $fila['nombreTitulo'] ?></td>
                    <td><?php echo $fila['nivel'] ?></td>
                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#a<?php echo $fila['titulos_id'] ?>">
                  Visualizar
                </button></td> 
                <td> <div class="row pt-2 pb-2">
                <div class="col-12">
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="estadoT" rows="3" required><?php echo $fila['estado'] ?></textarea> 
              <input class="form-control text-secondary" type="hidden" name="usuario" placeholder="" value="<?php echo $usuario ?>">
              <input class="form-control text-secondary" type="hidden" name="titulos_id" placeholder="" value="<?php echo $fila['titulos_id'] ?>">
                  </div>
              </div> 
                  </td>
              </tr>
              <div class="modal fade" id="a<?php echo $fila['titulos_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Anexo</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                  <iframe src="<?php ECHO '../../controlador/anexos/diploma'.$usuario.$fila['nombreTitulo'].'.pdf' ?>" style="width:100%; height:600px;" frameborder="0"></iframe>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }  
        }
      ?>
              </tbody>
              
          </table>
          <div class="row pt-2 text-center">
              <div class="col-6">
                  <button class="btn btn-tdea">Guardar comentarios</button>
              </div>
            </div>
            </div>
            </div>
            </form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
        Anexos Permanentes
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form action="../../controlador/actualizarObservaciones.php" method="post"  enctype="multipart/form-data" class="img-form">
          <div class="overlay">
               <div class="container">
        <h5 class="pt-2 pb-2 text-dark text-center">LISTA DE DOCUMENTOS A ADJUNTAR</h5>
        <?php 
        if($con){      
          $sql="SELECT * FROM tblAnexosPermanentes WHERE usuario='$usuario' ";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){ 

              $sql1="SELECT * FROM tblListaAnexosPermanentes ORDER BY orden  ";  
                  $consulta1=$con->prepare($sql1);
                  $consulta1->execute();  
                  while ($fila1=$consulta1->fetch(PDO::FETCH_ASSOC)){ 
                      $nombre = $fila1['nombre'];
                      $titulo = $fila1['titulo'];
                      $texto = $fila1['texto'];
                      $variable = $fila[$nombre];
                      include "../../controlador/anexosPermanentesrevision.php" ; 
                  }
                  ?>
                  <hr>
                  <h4 class="mb-3 mt-2 text-center">Estado actual </h4>
                  <div class="row pt-2 text-center">
                   <div class="col-6">
                     <select class="form-select" id="exampleFormControlSelect1" name="estado">
                       <option value="<?php echo $fila['estado'] ?>"><?php echo $fila['estado'] ?></option>
                       <option  value="Pendiente">Pendiente</option>
                       <option  value="Completo">Completo</option>                  
                       </select>
                   </div>
                  </div>
                  <?php 
                   }  
          }
             ?>   
            <input  name="usuario" type="hidden" value="<?php echo $usuario ?>">
      
            <div class="row pt-2 text-center">
              <div class="col-6">
                  <button class="btn btn-tdea">Guardar</button>
              </div>
            </div> 
            </div>
            </div>
            </form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Anexo Periodo a contratar
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form action="../../controlador/anexosPeriodoRevision.php" method="post"  enctype="multipart/form-data" class="img-form">
          <div class="overlay">
               <div class="container">
        <h5 class="pt-2 pb-2 text-dark text-center">LISTA DE DOCUMENTOS A ADJUNTAR</h5>
        <?php 
        if($con){      
          $sql="SELECT * FROM tblanexos WHERE usuario='$usuario' ";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){ 
            ?>
            <div class="row mt-2  pt-2 text-center">
          <div class="col-12">
              <label for="formGroupExampleInput" class="form-label required text-dark">¿Desea continuar con el proceso?</label><br>
              <input class="form-check-input" type="radio" id="sip"  name="procesp" value="<?php echo $fila['cProceso'] ?>" checked>
               <label class="form-check-label" for="flexRadioDefault2"><?php echo $fila['cProceso']?></label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

          </div>
        </div>

           <?php
              $sql1="SELECT * FROM tblListaAnexos ORDER BY orden  ";  
                  $consulta1=$con->prepare($sql1);
                  $consulta1->execute();  
                  while ($fila1=$consulta1->fetch(PDO::FETCH_ASSOC)){ 
                      $nombre = $fila1['nombre'];
                      $titulo = $fila1['titulo'];
                      $texto = $fila1['texto'];
                      $variable = $fila[$nombre];
                      include "../../controlador/anexosPermanentesrevision.php" ; 
                  }
                  

                   }  
          }
             ?>   
             <?php

             if($con){      
               $sql3="SELECT * FROM tblSeguridad WHERE usuario='$usuario' ";  
               $consulta2=$con->prepare($sql3);
               $consulta2->execute();  
               if ($fila2=$consulta2->fetch(PDO::FETCH_ASSOC)){ 
     
                 
                    
                  ?>
                 <div class="row pt-2 pb-2">
                   <div class="col-xl-4 col-sm-6">
                     <label for="formGroupExampleInput" class="form-label required text-dark">Nombre EPS</label>
                     <input class="form-control text-secondary" type="" name="nomEps" value="<?php echo $fila2['nomEps'] ?>">
                   </div>
                   <div class="col-xl-4 col-sm-6">
                     <label for="formGroupExampleInput" class="form-label required text-dark">Nombre Pensión</label>
                     <input class="form-control text-secondary" type="" name="nomPension" value="<?php echo $fila2['nomPension'] ?>">
                   </div>
                 </div>
                 <div class="row mt-2  pt-2 text-center">
                 <div class="col-12">
                     <label for="formGroupExampleInput" class="form-label required text-dark">¿Actualmente cuenta con ARL?</label><br>
                     <input class="form-check-input" type="radio" id="si"  name="CARL" value="<?php echo $fila2['tieneArl'] ?>" checked>
                      <label class="form-check-label" for="flexRadioDefault2"><?php echo $fila2['tieneArl']?></label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
      
                 </div>
               </div>
              
       <?php 
        $sqlx="SELECT * FROM tblanexos WHERE usuario='$usuario' ";  
        $consulta=$con->prepare($sqlx);
        $consulta->execute();  
        if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
          if($fila['estadoa'] == 'Completo'){
            ?>
            <div class="row pt-2 pb-2"> 
       <div class="col-xl-4 col-sm-6">
         <label for="formGroupExampleInput" class="form-label text-dark">Nombre ARL</label>
         <input class="form-control text-secondary" id="arl" type="" name="arl" value="<?php echo $fila2['arl'] ?>" >
       </div>
       <div class="col-xl-4 col-sm-6">
         <label for="formGroupExampleInput" class="form-label text-dark">Fecha</label>
         <input class="form-control text-secondary" type="date" id="fechaArl" name="fechaArl" value="<?php echo $fila2['fechaArl'] ?>">
       </div>
     </div> 
    
               <?php
               if($fila['cProceso'] == 'No'){
                 ?> 
      <div class="row pt-2 pb-2"> 
       <div class="col-xl-4 col-sm-6">
         <label for="formGroupExampleInput" class="form-label text-dark">¿Por qué no?</label>
         <input class="form-control text-secondary" id="arl" type="" name="respuesta" value="<?php echo $fila['respuesta'] ?>" > <br>
       </div>
     </div>
     
     <?php
     }
     }
    }
     }  
     }
     ?>           
 <?php 
        if($con){      
          $sql="SELECT * FROM tblAnexos WHERE usuario='$usuario' ";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){ 
                  ?>
                  <hr>
                  <h6 class="mb-3 mt-2 text-center text-dark">Estado actual </h6>
                  <div class="row pt-2 text-center">
                   <div class="col-6">
                     <select class="form-select" id="exampleFormControlSelect1" name="estadoa">
                       <option value="<?php echo $fila['estadoa'] ?>"><?php echo $fila['estadoa'] ?></option>
                       <option  value="Pendiente">Pendiente</option>
                       <option  value="Completo">Completo</option>                  
                       </select>
                   </div>
                  </div>
                  <?php 
                   }  
          }
             ?>   
            <input  name="usuario" type="hidden" value="<?php echo $usuario ?>">


           
            <div class="row pt-2 text-center">
              <div class="col-6">
                  <button class="btn btn-tdea">Guardar</button>
              </div>
            </div> 
            </div>
            </div>
            </form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
        Cálculo IBC
      </button>
    </h2>
    <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form action="../../controlador/ibc.php" method="post"  enctype="multipart/form-data" class="img-form">
          <div class="overlay">
               <div class="container">
        <h5 class="pt-2 pb-2 text-dark text-center">CALCULAR IBC</h5>

        <?php
  if($con){ 
      $sql="SELECT a.honorarios, b.cedulaContratista FROM tblrolcomponente a INNER JOIN tblcontratista b ON a.rolcomponente_id = b.rolcomponente_id WHERE b.cedulaContratista = '$usuario' " ;  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
          ?>
         <div class="row pt-2 pb-2">
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Honorarios</label>
              <input class="form-control text-secondary" type="" id="honorarios" name="honorarios" value="<?php echo $fila['honorarios'] ?>" required>
              <input class="form-control text-secondary" type="hidden" name="usuario" placeholder="Nombre Contratista" value="<?php echo $fila['cedulaContratista'] ?>" required>
            </div>
            <?php
              }  
          }
        ?> 
        
        <?php
  if($con){ 
      $sql="SELECT * FROM tblIBC WHERE usuario = '$usuario' " ;  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
          ?>
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">SMLV</label>
              <input class="form-control text-secondary" type=""  name="smlv" value="<?php echo $fila['smlv'] ?>" required>
            </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">¿Pensionado?</label><br>
                  <select class="form-select" aria-label="Default select example" name="pensionado" required>
                    <option selected>Seleccione...</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                  </select>
            </div>
            <div class="col-xl-3 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Nivel de riesgo</label>
              <select class="form-select" aria-label="Default select example" name="tipoArl" required>
                <option selected value="<?php echo $fila['riesgo'] ?>"><?php echo $fila['riesgo'] ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="5">5</option>
              </select>
            </div>
          </div>
          

          <div class="row pt-2 text-end">
            <div class="col-6">
          <table class="table container table-bordered">
            <tbody>
              <tr>
                <th scope="row">IBC:</th>
                <td id="salud">$ <?php echo $fila['ibc'] ?></td>
              </tr>
              <tr>
                <th scope="row">Salud:</th>
                <td id="salud">$ <?php echo $fila['salud'] ?></td>
              </tr>
              <tr>
                <th scope="row">Pensión:</th>
                <td>$ <?php echo $fila['pension'] ?></td>
              </tr>
              <tr>
                <th scope="row">ARL:</th>
                <td>$ <?php echo $fila['arl'] ?></td>
              </tr>
              <tr class="table-info">
                <th scope="row">Total:</th>
                <td>$ <?php echo $fila['total'] ?></td>
              </tr>
            </tbody>
          </table>
        </div>
         </div>
         <?php
        }  
    }
  ?> 
         <div class="row pt-2 text-center">
              <div class="col-6">
                  <button class="btn btn-tdea">Guardar</button>
              </div>
            </div> 
       
            </div>
            </div>
            </form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
        Proyección del contrato
      </button>
    </h2>
    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form action="../../controlador/proyeccion.php" method="post"  enctype="multipart/form-data" class="img-form">
          <div class="overlay">
               <div class="container">
        <h5 class="pt-2 pb-2 text-dark text-center">PROYECCIÓN DEL CONTRATO</h5>
        <?php
        if($con){ 
            $sql="SELECT a.honorarios, b.cedulaContratista FROM tblrolcomponente a INNER JOIN tblcontratista b ON a.rolcomponente_id = b.rolcomponente_id WHERE b.cedulaContratista = '$usuario' " ;  
                $consulta=$con->prepare($sql);
                $consulta->execute();  
                if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
                ?>
                    <input class="form-control text-secondary" type="hidden" id="honorarios" name="honorarios" value="<?php echo $fila['honorarios'] ?>" required>
                    <input class="form-control text-secondary" type="hidden" name="usuario" placeholder="Nombre Contratista" value="<?php echo $fila['cedulaContratista'] ?>" required>
                  
                  <?php
                    }  
                }
              ?> 
              <?php
  if($con){ 
      $sql="SELECT * FROM tblproyeccion WHERE usuario = '$usuario' " ;  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
          ?>
          <div class="row pt-2 pb-2">
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Año</label>
              <input class="form-control text-secondary" type="" name="periodo" value="<?php echo $fila['periodo'] ?>">
            </div>
            <div class="col-xl-4 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Plazo</label>
                  <input class="form-control text-secondary" type="number" name="plazo" value="<?php echo $fila['plazo'] ?>">
                </div>
          </div> 
              <div class="row pt-2 pb-2">
                <div class="col-xl-4 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Fecha Inicio</label>
                  <input class="form-control text-secondary" type="date" name="inicio" value="<?php echo $fila['inicio'] ?>">
                </div>
                <div class="col-xl-4 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Fecha Finalización</label>
                  <input class="form-control text-secondary" type="date" name="final" value="<?php echo $fila['final'] ?>">
                </div>
              </div> 
              <div class="row pt-2 text-end">
                <div class="col-6">
              <table class="table container table-bordered">
                <tbody>
                  <tr>
                    <th scope="row">Número del contrato:</th>
                    <td><?php echo $fila['numContrato'] ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Honorarios:</th>
                    <td><?php echo $fila['honorarios'] ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Plazo:</th>
                    <td><?php echo $fila['plazo'] ?> días</td>
                  </tr>
                  <tr>
                    <th scope="row">Valor día:</th>
                    <td>$ <?php echo $fila['valorDia'] ?></td>
                  </tr>
                  <tr class="table-success">
                    <th scope="row">Valor Contrato:</th>
                    <td>$ <?php echo $fila['valorContrato'] ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
             </div>
             <?php
            }  
        }
      ?> 
      <div class="row pt-2 text-center">
        <div class="col-6">
            <button class="btn btn-tdea">Guardar</button>
        </div>
      </div> 
 
            </div>
            </div>
            </form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapseOne">
      Creación de contrato
      </button>
    </h2>
    <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form action="../../controlador/contratoFinal.php"  method="post"  enctype="multipart/form-data" class="img-form">
          <div class="overlay">
               <div class="container">
               <h5 class="pt-2 pb-2 text-dark text-center">Registrar datos para la creación de contratos</h5>
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-6">
                <?php
          
          if($con){    
            $sql2="SELECT * FROM tblcontratofinal WHERE usuario= '".$usuario."'";  
            $consulta=$con->prepare($sql2);
            $consulta->execute();  
            if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
            ?>
                  <label for="formGroupExampleInput" class="form-label required text-dark">Seleccionar Contrato</label>
                  <select class="form-select" aria-label="Default select example" name="tipoContrato"  required>
                    <option value="<?php echo $fila['tipoContrato'] ?>" selected><?php echo $fila['tipoContrato'] ?></option>
                    <option value="de apoyo a la gestión">Apoyo a la gestión</option>
                    <option value="profesionales">Profesional</option>
                  </select>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
           
            <label for="formGroupExampleInput" class="form-label required text-dark">Honorarios</label>
            <input class="form-control text-secondary" type="hidden" name="usuario" value="<?php echo $fila['usuario'] ?>" readonly>

                  <input class="form-control text-secondary" type="" name="honorarios" value="$ <?php echo $fila['honorarios'] ?>" readonly>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label text-dark">Honorarios En letras</label>
                  <input class="form-control text-secondary" type="" name="honorariosLetras" value="<?php echo $fila['honorariosLetras'] ?>" placeholder="Ingrese el valor en letras" required>
                </div>
              </div>
              
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Valor Contrato</label>
                  <input class="form-control text-secondary" type="" name="valorContrato" value="$ <?php echo $fila['valorContrato'] ?>" readonly>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label text-dark">Valor Contrato En letras</label>
                  <input class="form-control text-secondary" type="" name="contratoLetras" value="<?php echo $fila['contratoLetras'] ?>" placeholder="Ingrese el valor en letras" placeholder="Ingrese el valor en letras" required>
                </div>
              </div>
              
              
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">N° CDP</label>
                  <input class="form-control text-secondary" type="" name="numCDP" value="<?php echo $fila['numCDP'] ?>" placeholder="Número del CDP" required>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label text-dark">Valor CDP</label>
                  <input class="form-control text-secondary" type="" name="valorCDP" value="<?php echo $fila['valorCDP'] ?>" placeholder="Ingrese el valor sin puntos ni comas" required>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Fecha CDP</label>
                  <input class="form-control text-secondary" type="date" id="fechaCDP" name="fechaCDP"  value="<?php echo $fila['fechaCDP'] ?>" placeholder="Valor total por contratista $" >
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">¿Requiere desplazamiento?</label><br>
                <input class="form-check-input" type="radio" id="yes"  name="desplazamiento" value="Yes" >
                 <label class="form-check-label" for="flexRadioDefault2">Si </label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                 <input class="form-check-input" type="radio" id="not" name="desplazamiento" value="Not"> 
                 <label class="form-check-label" for="flexRadioDefault1"> No</label>
                </div>
              </div>
    <div class="row pt-2 pb-2">
     <center class="pb-2 pt-2">En caso de ser SI, ingrese los siguientes datos</center>  <br>
     
      <div class="col-xl-2 col-sm-6">
        
        <label for="formGroupExampleInput" class="form-label text-dark">N° CDP</label>
        <input class="form-control text-secondary" id="CDPDesplazamiento" type="" placeholder="Número del CDP" value="<?php echo $fila['CDPDesplazamiento'] ?>" name="CDPDesplazamiento" disabled>
      </div>
      <div class="col-xl-3 col-sm-6">
        <label for="formGroupExampleInput" class="form-label text-dark">Valor CDP </label>
        <input class="form-control text-secondary" type="" id="valorCDPDesplazamiento" value="<?php echo $fila['valorCDPDesplazamiento'] ?>" placeholder="Ingrese el valor sin puntos ni comas" name="valorCDPDesplazamiento" disabled>
      </div>
      </div>
      <div class="row pt-2 pb-2">
      <div class="col-xl-3 col-sm-6">
        <label for="formGroupExampleInput" class="form-label text-dark">¿Desde cuándo?</label>
        <input class="form-control text-secondary" type="date" id="fechaCDPDesplazamiento" name="fechaCDPDesplazamiento" value="<?php echo $fila['fechaCDPDesplazamiento'] ?>" disabled>
      </div>
      
      <div class="col-xl-3 col-sm-6">
        <label for="formGroupExampleInput" class="form-label text-dark">¿Hasta cuándo?</label>
        <input class="form-control text-secondary" type="date" id="fechaCDPDesplazamiento2" name="fechaCDPDesplazamiento2" value="<?php echo $fila['fechaCDPDesplazamiento2'] ?>" disabled>
      </div>
      </div>
      <script src="../../public/js/jquery.min.js"></script>
      <script>
    
    var CDPDesplazamiento = document.getElementById('CDPDesplazamiento');
    var valorCDPDesplazamiento = document.getElementById('valorCDPDesplazamiento');
    var fechaCDPDesplazamiento = document.getElementById('fechaCDPDesplazamiento');
    var fechaCDPDesplazamiento2 = document.getElementById('fechaCDPDesplazamiento2');
    
    document.getElementById('yes').addEventListener('click', function(e) {
      CDPDesplazamiento.disabled = false;
      valorCDPDesplazamiento.disabled = false;
      fechaCDPDesplazamiento.disabled = false;
      fechaCDPDesplazamiento2.disabled = false;
    });
    
    document.getElementById('not').addEventListener('click', function(e) {
      CDPDesplazamiento.disabled = true;
      valorCDPDesplazamiento.disabled = true;
      fechaCDPDesplazamiento.disabled = true;
      fechaCDPDesplazamiento2.disabled = true;
    });
      </script>
      <div class="row pt-2 pb-2">
        <div class="col-xl-3 col-sm-6">
          <label for="formGroupExampleInput" class="form-label required text-dark">N° RP</label>
          <input class="form-control text-secondary" type="" name="numRP" value="<?php echo $fila['numRP'] ?>" placeholder="Número del CDP" required>
        </div>
        <div class="col-xl-3 col-sm-6">
          <label for="formGroupExampleInput" class="form-label text-dark">Valor RP</label>
          <input class="form-control text-secondary" type="" name="valorRP" value="<?php echo $fila['valorRP'] ?>" placeholder="Ingrese el valor sin puntos ni comas" required>
        </div>
      </div>
      <div class="row pt-2 pb-2">
        <div class="col-xl-6 col-sm-6">
          <label for="formGroupExampleInput" class="form-label required text-dark">Fecha RP</label>
          <input class="form-control text-secondary" type="date" name="fechaRP" value="<?php echo $fila['fechaRP'] ?>" placeholder="Número del CDP" required>
        </div>
      </div>
      <div class="row pt-2 pb-2">
                  <div class="col-xl-6 col-sm-12">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Identificación de la necesidad</label>
                      <textarea class="form-control" id="objeto"  name="necesidad" rows="3" required><?php echo $fila['identificacionNecesidad'] ?></textarea> 
                  </div>
                </div>
      <?php
              }  
          }
          
        ?>
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Supervisor</label>
          <input class="form-control text-secondary" type="text" name="nombreD"  placeholder="Nombre" required>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Ordenador</label>
          <input class="form-control text-secondary" type="text" name="nomOrdenador"  placeholder="Nombre" required>
                </div>
              </div>
              
        
            <div class="row pt-2 pb-2 text-center">
              <div class="col-6">
                  <button class="btn btn-tdea">Guardar</button>
              </div>
            </div> 
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                    <th>Generar Estudio Previo</th>
                    <th>Generar Evaluación y Aceptación</th>
                    <th>Generar Análisis del sector</th>
                    <th>Generar Contrato</th>
                    <th>Generar Acta de Inicio</th>
                  </tr>
              </thead>
              <tbody>
                <?php
              
            if($con){      
              $sql="SELECT * FROM tblcontratofinal WHERE usuario= '".$usuario."'";  
              $consulta=$con->prepare($sql);
              $consulta->execute();  
              if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
              ?>
                  <tr>
                <td><a class="btn btn-primary" href="../../controlador/estudioPrevio.php?usuario=<?php echo $fila['usuario'] ?>"><i class="far fa-file-word"></i></a></td>
                <td><a class="btn btn-primary" href="../../controlador/evaluacionAceptacion.php?usuario=<?php echo $fila['usuario'] ?>"><i class="far fa-file-word"></i></a></td>
                <td><a class="btn btn-primary" href="../../controlador/analisisSector.php?usuario=<?php echo $fila['usuario'] ?>"><i class="far fa-file-word"></i></a></td>
                <td><a class="btn btn-primary" href="../../controlador/contratoRealizado.php?usuario=<?php echo $fila['usuario'] ?>"><i class="far fa-file-word"></i></a></td>
                <td><a class="btn btn-primary" href="../../controlador/actaInicio.php?usuario=<?php echo $fila['usuario'] ?>"><i class="far fa-file-word"></i></a></td>
              </tr>
              <?php
            }  
        }
      ?>
              </tbody>
              
          </table>
            </div>
            </div>
            </form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourf" aria-expanded="false" aria-controls="collapseThree">
        Documentos a subir
      </button>
    </h2>
    <div id="collapseFourf" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form action="../../controlador/anexosContratoG.php" method="post"  enctype="multipart/form-data" class="img-form">
          <div class="overlay">
               <div class="container">
        <h5 class="pt-2 pb-2 text-dark text-center">LISTA DE DOCUMENTOS A ADJUNTAR</h5>
        <center><p>Los campos marcados con * son obligatorios</p></center>
        <?php 
        if($con){   
          $usuario = $_REQUEST['usuario'];   
          $sql="SELECT * FROM tblanexoscontratos WHERE usuario= '".$usuario."' ";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){ 

              $sql1="SELECT * FROM tbllistaanexoscontratos ORDER BY orden  ";  
                  $consulta1=$con->prepare($sql1);
                  $consulta1->execute();  
                  while ($fila1=$consulta1->fetch(PDO::FETCH_ASSOC)){ 
                      $nombre = $fila1['nombre'];
                      $titulo = $fila1['titulo'];
                      $texto = $fila1['texto'];
                      $variable = $fila[$nombre];
                      include "../../controlador/anexosContrato.php" ; 
                  }
                  ?>
              
                  <input class="form-control text-secondary" type="hidden" name="usuario" value="<?php echo $fila['usuario'] ?>" >
                  
                  <?php    
                }  
          }
             ?>   
              
            <div class="row pt-2 text-center">
              <div class="col-6">
                  <button class="btn btn-tdea">Guardar</button>
              </div>
            </div> 
            </div>
            </div>
            </form>
      </div>
    </div>
  </div>
</div>

<?php  
  include_once "footer.php"
?>
  

