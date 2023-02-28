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
        <form action="../../controlador/registroContratista.php" method="post" id="frmComponentes" class="img-form">
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
                }else if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'actualizado'){
            ?> 
            <div class=" mb-2 mt-2 alert alert-warning alert-dismissible fade show" role="alert">
                <p><strong>¡El Contratista ya existía!</strong> Se actualizaron los datos correctamente</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
              }  
        ?>
            <h5 class="pt-2 pb-2 text-dark text-center">CREAR CONTRATISTA</h5> 
            
            <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Seleccionar componente</label>
                  <select id="dependencia"  name="dependencia" class="form-select" aria-label="Default select example">
                  </select>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Seleccionar Rol</label>
                  <select id="rolcomponente_id"  name="rolcomponente_id" class="form-select" aria-label="Default select example" required>
                  </select>
                </div>
              </div>
            
              <div class="row pt-2 pb-2">
              <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Cédula</label>
                  <input class="form-control text-secondary" type="" name="cedula" placeholder="Cédula" required>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Contratista</label>
                  <input class="form-control text-secondary" type="" name="contratista" placeholder="Nombre Contratista" required>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Celular</label>
                  <input class="form-control text-secondary" type="" name="telefono" placeholder="Teléfono" required>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Correo Electrónico</label>
                  <input class="form-control text-secondary" type="email" name="correo" placeholder="Correo Electrónico" required>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-12">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Obligaciones</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="obligaciones" rows="3" required></textarea> 
                </div>
              </div>    
                <div class="row pt-2 text-center">
                  <div class="col-6">
                    <input type="hidden" id="rol" name="rol" value="contratista"/>
                      <button class="btn btn-tdea" id="guardarCont">Guardar</button>
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
                <th>Contrato</th>
                <th>Componente</th>
                <th>Rol</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Editar</th>
              </tr>
          </thead>
          <tbody>
            <?php
          
        if($con){      
          $sql="SELECT d.nombreContrato, a.dependencia, b.rolDep, c.cedulaContratista, c.contratista, c.correo FROM tblcomponentes a INNER JOIN tblrolcomponente b ON b.componente_id = a.componente_id INNER JOIN tblcontratista c ON c.rolcomponente_id = b.rolcomponente_id INNER JOIN tblcontratos d ON d.numContrato = a.numContrato";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
          ?>
              <tr>
                <td><?php echo $fila['nombreContrato'] ?></td>
              <td><?php echo $fila['dependencia'] ?></td>
              <td><?php echo $fila['rolDep'] ?></td>
                <td><?php echo $fila['cedulaContratista'] ?></td>
                <td><?php echo $fila['contratista'] ?></td>
                <td><?php echo $fila['correo'] ?></td>
                <td><a class="btn btn-primary" href="actualizarContratista.php?cedulaContratista=<?php echo $fila['cedulaContratista'] ?>" id="actualizar"><i class="far fa-edit"></a></i></td>
              </tr>
              <?php
              }  
          }
        ?>
          </tbody>
          <tfoot>
              <tr>
                <th>Contrato</th>
              <th>Componente</th>
                <th>Rol</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Editar</th>
              </tr>
          </tfoot>
      </table>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="../../public/js/validaciones2.js"></script>
<?php  
  include_once "footer.php"
?>

