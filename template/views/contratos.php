<?php  
  include_once "header.php"
?>
<?php  
  include_once "header2.php"
?>
<?php
include_once '../../controlador/conexion.php';
  $con=new Conexion();
  $con=$con->conectar();                            
          ?>

<div class="accordion container mb-4" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Insertar datos
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form  action="../../controlador/registroContrato.php" method="post" id="frmContrato" class="img-form">
          <div class="overlay">
            <div class="container">
              <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
              <div class=" mb-2 mt-2 alert alert-success alert-dismissible fade show" role="alert">
                <p>Se registraron los datos correctamente</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                }
            ?> 
              <h5 class="pt-2 pb-2 text-dark text-center">INFORMACIÓN GENERAL DEL RECURSO HUMANO DEL CONTRATO INTERADMINISTRATIVO</h5>
                <div class="row pt-2 pb-2">
                  <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">N° del Contrato</label>
                    <input class="form-control text-secondary" type="" id="numContrato" name="numContrato" value="" required>
                  </div>
                </div>

                <div class="row pt-2 pb-2">
                  <div class="col-xl-3 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Fecha de Inicio</label>
                    <input class="form-control text-secondary" type="date" id="fechaInicio" name="fechaInicio" placeholder="Fecha de Inicio" required>
                  </div>
                  <div class="col-xl-3 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Fecha de Finalización</label>
                    <input class="form-control" type="date" id="fechaFinal" name="fechaFinal" placeholder="Fecha de Finalización" required>
                  </div>
                </div>

                <div class="row pt-2 pb-2">
                  <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Entidad Contratante</label>
                    <input class="form-control text-secondary" type="" name="entidadConvenio" placeholder="Entidad Convenio" required>
                </div>
                </div>

                <div class="row pt-2 pb-2">
                  <div class="col-xl-6 col-sm-12">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Objeto</label>
                      <textarea class="form-control" id="objeto"  name="objeto" rows="3" required></textarea> 
                  </div>
                </div>

                <div class="row pt-2 pb-2">
                  <div class="col-xl-6 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Valor</label>
                    <input class="form-control text-secondary" type="number" id="valor" name="valor" placeholder="Valor $ (INGRESE EL VALOR SIN PUNTOS NI COMAS)" required>
                  </div>
                </div>

                <div class="row pt-2 pb-2">
                  <div class="col-xl-6 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Código Plan de acción</label>
                    <input class="form-control text-secondary" type="" id="planAccion" name="planAccion" placeholder="Plan de acción" required>
                  </div>
                </div>

                                
                <div class="row pt-2 pb-2">
                  <div class="col-xl-6 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Centro de Costos</label>
                    <input class="form-control text-secondary" type="" name="centroCostos" placeholder="Centro de Costos" required>
                  </div>
                </div>

                <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                <label for="formGroupExampleInput" class="form-label required text-dark">Supervisor TdeA</label>
                    <input class="form-control text-secondary" type="" id="supervisor" name="supervisor" placeholder="Nombre del Supervisor" required>
                </div>
                  <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Identificación</label>
                    <input class="form-control text-secondary" type="" id="identificacion" name="identificacion" placeholder="Identificación" required> 
                   </div>
                </div>

               <!-- <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                <label for="formGroupExampleInput" class="form-label required text-dark">Nombre del Contrato</label>
                    <input class="form-control text-secondary" type="" id="nombreContrato" name="nombreContrato" placeholder="Nombre del contrato" required>
                  </div>
                  <div class="col-xl-3 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Periodo</label>
                    <input class="form-control text-secondary" type="" id="entidadConvenio" name="periodo" placeholder="Año del contrato" required>
                  </div>
                </div>
                <div class="row pt-2 pb-2">
                  <div class="col-xl-2 col-sm-4">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Rol</label>
                    <input class="form-control text-secondary" type="" id="rol" name="rol" placeholder="Rol" required>
                  </div>
                </div>     --> 
                <div class="row pt-2 text-center">
                  <div class="col-6">
                    <input type="hidden" id="estado" name="estado" value="Activo"/>
                      <button class="btn btn-tdea" id="guardar">Guardar</button>
                  </div>
                </div>         
            </div>
              </div>
              
        </form >
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Listar
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>

                <th>Número Contrato</th>
                <th>Entidad Convenio</th>
                <th>Fecha Inicio</th>
                <th>Fecha Finalización</th>
                <th>Valor</th>
                <th>Estado</th>
                <th>Actualizar</th>
              </tr>
          </thead>
          <tbody>
            <?php
          
        if($con){      
          $sql="SELECT * FROM tblContratos";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
          ?>
              <tr>
              
                <td><?php echo $fila['numContrato'] ?></td>
                <td><?php echo $fila['entidadConvenio'] ?></td>
                <td><?php echo $fila['fechaInicio'] ?></td>
                <td><?php echo $fila['fechaFinal'] ?></td>
                <td><?php echo $fila['valor'] ?></td>
                <td><?php echo $fila['estado'] ?></td>
                <td><a class="btn btn-primary" href="actualizarContratos.php?numContrato=<?php echo $fila['numContrato'] ?>" id="actualizar"><i class="far fa-edit"></a></i></td>
              </tr>
              <?php
              }  
          }
        ?>
          </tbody>
          <tfoot>
              <tr>
              
                <th>Número Contrato</th>
                <th>Entidad Convenio</th>
                <th>Fecha Inicio</th>
                <th>Fecha Finalización</th>
                <th>Valor</th>
                <th>Estado</th>
                <th>Actualizar</th>
              </tr>
          </tfoot>
      </table>
      </div>
    </div>
  </div>
</div>

<?php  
  include_once "footer.php"
?>

