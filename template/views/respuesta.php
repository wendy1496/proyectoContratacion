<?php  
  include_once "header.php"
?>
<?php  
  include_once "header3.php"
?>
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
      <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'actualizado'){
            ?>
              <div class=" mb-2 mt-2 alert alert-success alert-dismissible fade show" role="alert">
                <p>Se actualizaron los datos correctamente</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                }
            ?> 
        <h5 class="text-center pt-3 pb-3">DATOS PERSONALES</h5>
        <center><p>Los campos marcados con * son obligatorios</p></center>

        <?php
include_once '../../controlador/conexion.php';
  $con=new Conexion();
  $con=$con->conectar();    
  if($con){      
      $sql="SELECT * FROM tblUsuarios WHERE usuario='$_SESSION[username]' ";  
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
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        Títulos Profesionales
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form action="../../controlador/titulos.php"  method="post"  enctype="multipart/form-data" class="img-form">
          <div class="overlay">
               <div class="container">
        <h5 class="pt-2 pb-2 text-dark text-center">Títulos Profesionales</h5>
        <center><p>A continuación puede ingresar la información de cada uno de sus títulos. Darle prioridad al título de mayor grado y a la formación base de pregrado según el área de enseñanza</p></center>
        <?php
        include_once '../../controlador/conexion.php';
          $con=new Conexion();
          $con=$con->conectar();    
          if($con){      
              $sql="SELECT * FROM tblUsuarios WHERE usuario='$_SESSION[username]' ";  
                  $consulta=$con->prepare($sql);
                  $consulta->execute();  
                  if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
                  ?>
                      <input class="form-control text-secondary" type="hidden" id="ced" name="cedulaDiploma" value="<?php echo $fila['cedula'] ?>" required>
                      <?php
                    }  
                }
              ?>
        <div class="row pt-2 pb-2">
          <div class="col-xl-7 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Nombre del título</label>
            <input class="form-control text-secondary" type="" name="tituloNombre" placeholder="Ingrese el nombre del título">
          </div>
        </div> 
        <div class="row pt-2 pb-2">
          <div class="col-xl-7 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Institución</label>
            <input class="form-control text-secondary" type="" name="institucion" placeholder="Ingrese la institución donde se graduó">
          </div>
        </div> 
        <div class="row pt-2 pb-2">
          <div class="col-xl-7 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Anexo - Acta de grado o diploma</label>
            <input class="form-control text-secondary" type="file" accept=".pdf, .doc, .xls" name="anexo" placeholder="Entidad del Convenio">            
          </div>
        </div> 
        <div class="row pt-2 pb-2">
          <div class="col-xl-7 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Nivel de formación</label>
            <select  class="form-select" aria-label="Default select example" name="nivel" id="exampleFormControlSelect2">
              <option selected>Seleccione...</option>
              <option value="bachillerato">Bachillerato</option>
              <option value="tecnico">Técnico</option>
              <option value="tecnologo">Tecnólogo</option>
              <option value="Pregrado">Pregrado</option>
              <option value="Posgrado">Posgrado</option>
            </select>
          </div>
        </div> 
            <div class="row pt-2 text-center">
              <div class="col-6">
                  <button class="btn btn-tdea">Ingresar</button>
              </div>
            </div> 
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                    <th>Nombre Título</th>
                    <th>Institución</th>
                    <th>Nivel</th>
                    <th>Visualizar</th>
                    <th></th>
                    <th>Observaciones</th>
                  </tr>
              </thead>
              <tbody>
                <?php
              
            if($con){      
              $sql="SELECT * FROM tblTitulos where cedula ='$_SESSION[username]' ";  
              $consulta=$con->prepare($sql);
              $consulta->execute();  
              while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
              ?>
                  <tr>
                    <td><?php echo $fila['nombreTitulo'] ?></td>
                    <td><?php echo $fila['institucion'] ?></td>
                    <td><?php echo $fila['nivel'] ?></td>
                <!--<td><a class="btn btn-primary" href="verTitulo.php?titulos_id=<?php echo $fila['titulos_id'] ?>" id="actualizar"><i class="far fa-eye"></i> Visualizar</a></td>-->
                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#a<?php echo $fila['titulos_id'] ?>">
                <i class="far fa-file-pdf"></i>
                </button></td> 
                <td><a class="btn btn-danger" href="../../controlador/eliminarTitulos.php?titulos_id=<?php echo $fila['titulos_id'] ?>" id="actualizar"><i class="far fa-trash-alt"></i> Eliminar</a></td>
                <td><?php echo $fila['estado'] ?></td>
              </tr>
              <div class="modal fade" id="a<?php echo $fila['titulos_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Anexo</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                  <iframe src="<?php ECHO '../../controlador/anexos/diploma'.$_SESSION['username'].$fila['nombreTitulo'].'.pdf' ?>" style="width:100%; height:600px;" frameborder="0"></iframe>
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
        <form action="../../controlador/anexos.php" method="post"  enctype="multipart/form-data" class="img-form">
          <div class="overlay">
               <div class="container">
        <h5 class="pt-2 pb-2 text-dark text-center">LISTA DE DOCUMENTOS A ADJUNTAR</h5>
        <center><p>Los campos marcados con * son obligatorios</p></center>
        <?php 
        if($con){      
          $sql="SELECT * FROM tblAnexosPermanentes WHERE usuario='$_SESSION[username]' ";  
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
                      include "../../controlador/anexosPermanentes.php" ; 
                  }

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
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Anexo Periodo a contratar
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form action="../../controlador/anexosPeriodo.php" method="post"  enctype="multipart/form-data" class="img-form">
          <div class="overlay">
               <div class="container">
        <h5 class="pt-2 pb-2 text-dark text-center">LISTA DE DOCUMENTOS A ADJUNTAR</h5>
        <center><p>Los campos marcados con * son obligatorios</p></center>
        <?php

        if($con){      
          $sql2="SELECT * FROM tblAnexos WHERE usuario='$_SESSION[username]' ";  
          $consulta2=$con->prepare($sql2);
          $consulta2->execute();  
          if ($fila2=$consulta2->fetch(PDO::FETCH_ASSOC)){ 

              $sql1="SELECT * FROM tblListaAnexos ORDER BY orden  ";  
                  $consulta1=$con->prepare($sql1);
                  $consulta1->execute();  
                  while ($fila3=$consulta1->fetch(PDO::FETCH_ASSOC)){ 
                      $nombre = $fila3['nombre'];
                      $titulo = $fila3['titulo'];
                      $texto = $fila3['texto'];
                      $variable = $fila2[$nombre];             
                      include "../../controlador/anexosPermanentes.php" ; 
                  }
                }
              }
             ?>
             <?php

        if($con){      
          $sql3="SELECT * FROM tblSeguridad WHERE usuario='$_SESSION[username]' ";  
          $consulta2=$con->prepare($sql3);
          $consulta2->execute();  
          if ($fila2=$consulta2->fetch(PDO::FETCH_ASSOC)){ 

            
               
             ?>
            <div class="row pt-2 pb-2">
              <div class="col-xl-4 col-sm-6">
                <label for="formGroupExampleInput" class="form-label required text-dark">Nombre EPS</label>
                <select class="form-select" name="nomEps" aria-label="Default select example">
                  <option value="<?php echo $fila2['nomEps'] ?>" selected><?php echo $fila2['nomEps'] ?></option>
                  <option value="ALIANSALUD">ALIANSALUD</option>
                  <option value="AMBUQ">AMBUQ</option>
                  <option value="ANASWAYUU">ANASWAYUU</option>
                  <option value="ASMET SALUD">ASMET SALUD</option>
                  <option value="ASOCIACIÓN INDÍGENA DEL CAUCA">ASOCIACIÓN INDÍGENA DEL CAUCA</option>
                  <option value="CAJACOPI">CAJACOPI</option>
                  <option value="CAPITAL SALUD">CAPITAL SALUD</option>
                  <option value="CAPRESOCA EPS">CAPRESOCA</option>
                  <option value="CCF DE LA GUAJIRA">CCF DE LA GUAJIRA</option>
                  <option value="CCF DE SUCRE">CCF DE SUCRE</option>
                  <option value="COMFACHOCO">COMFACHOCO</option>
                  <option value="COMFACUNDI">COMFACUNDI</option>
                  <option value="COMFAMILIAR CARTAGENA">COMFAMILIAR CARTAGENA</option>
                  <option value="COMFAMILIAR HUILA">COMFAMILIAR HUILA</option>
                  <option value="COMFAMILIAR NARIÑO">COMFAMILIAR NARIÑO</option>
                  <option value="COMFAORIENTE">COMFAORIENTE</option>
                  <option value="COMFENALCO VALLE">COMFENALCO VALLE</option>
                  <option value="COMPARTA">COMPARTA</option>
                  <option value="COMPENSAR">COMPENSAR</option>
                  <option value="CONVIDA">CONVIDA</option>
                  <option value="COOMEVA">COOMEVA</option>
                  <option value="COOSALUD">COOSALUD</option>
                  <option value="CRUZ BLANCA">CRUZ BLANCA</option>
                  <option value="DUSAKAWI">DUSAKAWI</option>
                  <option value="ECOOPSOS">ECOOPSOS</option>
                  <option value="EMSSANAR">EMSSANAR</option>
                  <option value="FAMISANAR">FAMISANAR</option>
                  <option value="MALLAMAS">MALLAMAS</option>
                  <option value="MEDIMAS">MEDIMAS</option>
                  <option value="MUTUAL SER">MUTUAL SER </option>
                  <option value="NUEVA EPS">NUEVA EPS</option>
                  <option value="PIJAOS SALUD">PIJAOS SALUD</option>
                  <option value="S.O.S.">S.O.S.</option>
                  <option value="SALUD TOTAL">SALUD TOTAL</option>
                  <option value="SANITAS">SANITAS</option>
                  <option value="SAVIA SALUD EPS">SAVIA SALUD EPS</option>
                  <option value="SURA">SURA</option>

</select>
              </div>
              <div class="col-xl-4 col-sm-6">
                <label for="formGroupExampleInput" class="form-label required text-dark">Nombre Pensión</label>
                <select class="form-select" name="nomPension"  aria-label="Default select example">
                  <option value="<?php echo $fila2['nomPension'] ?>" selected><?php echo $fila2['nomPension'] ?></option>
                  <option value="COLFONDOS">COLFONDOS</option>
                  <option value="COLPENSIONES">COLPENSIONES</option>
                  <option value="SKANDIA">SKANDIA</option>
                  <option value="PORVENIR">PORVENIR</option>
                  <option value="PROTECCIÓN">PROTECCIÓN</option>
</select>
              </div>
            </div>
            <div class="row mt-2  pt-2 text-center">
            <div class="col-12">
                <label for="formGroupExampleInput" class="form-label required text-dark">¿Actualmente cuenta con ARL?</label><br>
                <input class="form-check-input" type="radio" id="si"  name="CARL" value="Si">
                 <label class="form-check-label" for="flexRadioDefault2">Si </label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                 <input class="form-check-input" type="radio" id="no" name="CARL" value="No"> 
                 <label class="form-check-label" for="flexRadioDefault1"> No</label>
            </div>
          </div>
<div class="row pt-2 pb-2">
 <center>En caso de ser Si, ingrese los siguientes datos</center>  
 
  <div class="col-xl-4 col-sm-6">
    
    <label for="formGroupExampleInput" class="form-label text-dark">Nombre ARL</label>
    <input class="form-control text-secondary" id="arl" type="" name="arl" value="<?php echo $fila2['arl'] ?>" disabled>
  </div>
  <div class="col-xl-4 col-sm-6">
    <label for="formGroupExampleInput" class="form-label text-dark">¿Hasta cuándo?</label>
    <input class="form-control text-secondary" type="date" id="fechaArl" name="fechaArl" value="<?php echo $fila2['fechaArl'] ?>" disabled>
  </div>
  <input type="hidden" class="form-control text-secondary" id="noarl" type="" name="" value="no">
  <script src="../../public/js/jquery.min.js"></script>
  <script>

var arl = document.getElementById('arl');
var fechaArl = document.getElementById('fechaArl');
var noarl = document.getElementById('noarl');

document.getElementById('si').addEventListener('click', function(e) {
arl.disabled = false;
fechaArl.disabled = false;
});

document.getElementById('no').addEventListener('click', function(e) {
arl.disabled = true;
fechaArl.disabled = true;
});
  </script>
  
</div> 
<?php
}  
}
?>           <div class="row mt-2  pt-2 text-center">
            <div class="col-12">
                <label for="formGroupExampleInput" class="form-label required text-dark">¿Desea continuar con el proceso?</label><br>
                <input class="form-check-input" type="radio" id="s"  name="cProceso" value="Si">
                 <label class="form-check-label" for="flexRadioDefault2">Si </label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                 <input class="form-check-input" type="radio" id="n" name="cProceso" value="No">
                 <label class="form-check-label" for="flexRadioDefault1"> No</label>
            </div>
          </div>
          <div class="row pt-2 pb-2">
 <center>En caso de ser No</center>  
 
  <div class="col-xl-6 col-sm-6">
    
    <label for="formGroupExampleInput" class="form-label text-dark">¿Por qué?</label>
    <input class="form-control text-secondary" id="porque" type="" name="respuesta" value="<?php echo $fila2['arl'] ?>" disabled>
  </div>
  </div> 
<script>

var porque = document.getElementById('porque');
var fechaArl = document.getElementById('fechaArl');
var noarl = document.getElementById('noarl');

document.getElementById('n').addEventListener('click', function(e) {
porque.disabled = false;
});

document.getElementById('s').addEventListener('click', function(e) {
porque.disabled = true;
});
  </script>
           
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
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
        Contrato
      </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form action="../../controlador/contratoFirmado.php" method="post"  enctype="multipart/form-data" class="img-form">
          <div class="overlay">
               <div class="container">
        <h5 class="pt-2 pb-2 text-dark text-center">LISTA DE DOCUMENTOS A ADJUNTAR</h5>
        <center><p>Los campos marcados con * son obligatorios</p></center>
        <?php 
        if($con){      
          $sql="SELECT * FROM tblanexoscontratos WHERE usuario='$_SESSION[username]' ";  
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
                      include "../../controlador/anexoContratoFirmado.php" ; 
                  }

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
  

