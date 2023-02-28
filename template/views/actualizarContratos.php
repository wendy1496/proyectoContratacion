<?php  
  include_once "header.php"
?>

<?php
include_once '../../controlador/conexion.php';
  $con=new Conexion();
  $con=$con->conectar();                            
          ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light container mb-4">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
    <div>
      <a class="btn" href="contratos.php"><i class="fas fa-undo-alt"></i> VOLVER </a>
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
<div class="accordion container mb-4" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Actualizar datos
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form  action="../../controlador/actualizarContrato.php" method="post" id="frmContrato" class="img-form">
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
            <?php
                    $numContrato = $_GET['numContrato'];
                    if($con){      
                    $sql="SELECT * FROM tblContratos WHERE numContrato= '".$numContrato."'" ;  
                    $consulta=$con->prepare($sql);
                    $consulta->execute();  
                    while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
          ?>
              <h5 class="pt-2 pb-2 text-dark text-center">INFORMACIÓN GENERAL DEL RECURSO HUMANO DEL CONTRATO INTERADMINISTRATIVO</h5>
            <div class="row pt-2 pb-2">
                  <div class="col-xl-3 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Estado del contrato: Activo/Finalizado</label>
                    <input class="form-control text-secondary" type="" id="nombreContrato" name="estado" placeholder="Nombre del contrato"  value="<?php echo $fila['estado'] ?>">
                  </div>
                  <div class="col-xl-3 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">N° del Contrato</label>
                    <input class="form-control text-secondary" type="" id="numContrato" name="numContrato"  value="<?php echo $fila['numContrato'] ?>">
                  </div>
                </div>

                <div class="row pt-2 pb-2">
                  <div class="col-xl-3 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Fecha de Inicio</label>
                    <input class="form-control text-secondary" type="date" id="fechaInicio" name="fechaInicio" placeholder="Fecha de Inicio" value="<?php echo $fila['fechaInicio'] ?>">
                  </div>
                  <div class="col-xl-3 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Fecha de Finalización</label>
                    <input class="form-control" type="date" id="fechaFinal" placeholder="Fecha de Finalización" value="<?php echo $fila['fechaFinal'] ?>">
                  </div>
                </div>

                <div class="row pt-2 pb-2">
                  <div class="col-xl-6 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Entidad contratante</label>
                    <input class="form-control text-secondary" type="" id="entidadConvenio" name="entidadConvenio" placeholder="Entidad del Convenio" value="<?php echo $fila['entidadConvenio'] ?>">
                  </div>
                </div>

                <div class="row pt-2 pb-2">
                  <div class="col-xl-6 col-sm-12">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Objeto</label>
                      <textarea class="form-control" id="objeto"  name="objeto" rows="3"  ><?php echo $fila['objeto'] ?></textarea> 
                  </div>
                </div>

                <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Valor Actual</label>
                    <input class="form-control text-secondary" type="number" id="valorActual" name="valorActual" placeholder="Valor $ (INGRESE EL VALOR SIN PUNTOS NI COMAS)" value="<?php echo $fila['valor'] ?>"> 
                  </div>
                </div>

                <div class="row pt-2 pb-2">
                  <div class="col-xl-3 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Centro de Costos</label>
                    <input class="form-control text-secondary" type="" name="centroCostos" value="<?php echo $fila['centroCostos'] ?>" required>
                  </div>
                  <div class="col-xl-3 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Plan de acción</label>
                    <input class="form-control text-secondary" type="" id="planAccion" name="planAccion" value="<?php echo $fila['planAccion'] ?>" required>
                  </div>
                </div>
                 
                <div class="row pt-2 pb-2">
                  <div class="col-xl-3 col-sm-4">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Supervisor TdeA</label>
                    <input class="form-control text-secondary" type="" id="supervisor" name="supervisor" placeholder="Nombre del Supervisor" value="<?php echo $fila['supervisor'] ?>">
                  </div>
                  <div class="col-xl-3 col-sm-4">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Identificación</label>
                    <input class="form-control text-secondary" type="" id="identificacion" name="identificacion" placeholder="Identificación" value="<?php echo $fila['identificacion'] ?>">
                  </div>
                </div> 

                <!--<div class="row pt-2 pb-2">
                  <div class="col-xl-6 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Nombre del Contrato</label>
                    <input class="form-control text-secondary" type="" id="nombreContrato" name="nombreContrato" placeholder="Nombre del contrato"  value="<?php echo $fila['nombreContrato'] ?>">
                  </div>
                </div>
                <div class="row pt-2 pb-2">
                
                  <div class="col-xl-3 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Periodo</label>
                    <input class="form-control text-secondary" type="" id="entidadConvenio" name="periodo"  value="<?php echo $fila['periodo'] ?>" required>
                  </div>
                  <div class="col-xl-2 col-sm-4">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Rol</label>
                    <input class="form-control text-secondary" type="" id="rol" name="rol" placeholder="Rol" value="<?php echo $fila['rol'] ?>">
                  </div>
                </div>-->
                <hr>
              <h5 class="pt-2 pb-2 text-dark text-center">PRÓRROGA</h5>     
                
                <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Aumento de presupuesto</label>
                    <input class="form-control text-secondary" type="number" id="aumento" name="aumento" placeholder="Valor $ (INGRESE EL VALOR SIN PUNTOS NI COMAS)"> 
                </div>
                <div class="col-xl-3 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Aumento Plazo</label>
                    <input class="form-control" type="date" id="fechaFinal" name="fechaFinal" placeholder="Fecha de Finalización" value="<?php echo $fila['fechaFinal'] ?>">
                  </div>
                    </div>
                <script>
                window.onchange = function sumaPresup() 
{
	var aumento = document.getElementById('aumento').value;
	var valorActual = document.getElementById('valorActual').value;
  var suma = parseInt(aumento) + parseInt(valorActual);  
  document.getElementById('valor').value = suma;
  
};
              </script>
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Total Presupuesto</label>
                    <input class="form-control text-secondary" type="number" id="valor" name="valor" placeholder="Valor total presupuesto" readonly> 
                  </div>
                </div>
                 
                <?php
              }  
          }
        ?>
                  
                <div class="row pt-2 text-center">
                  <div class="col-6">
                    <input type="hidden" id="opcion" name="opcion" value=""/>
                      <button class="btn btn-tdea" id="actualizar">Guardar</button>
                  </div>
                </div> 
                <div class="mb-4 mt-4" id="mensaje"></div>          
            </div>
              </div>
              
        </form >
      </div>
    </div>
  </div>
</div>

        <?php  include_once "footer.php" ?>
