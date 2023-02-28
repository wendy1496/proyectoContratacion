<?php  
  include_once "header.php"
  ?>
  <?php  
  include_once "header4.php"
?>
<div class="accordion container" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Crear Usuarios
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <h4 class="text-center">Creación de usuarios</h4>

<form action="../../controlador/registroUsuarios.php" method="post" id="frmComponentes" class="img-form">
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
                <p><strong>¡El Usuario ya existía!</strong> Se actualizaron los datos correctamente</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
              }  
        ?>

              <div class="row pt-2 pb-2">
              <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Cédula</label>
                  <input class="form-control text-secondary" type="" name="cedula" placeholder="Cédula" required>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Nombre</label>
                  <input class="form-control text-secondary" type="" name="contratista" placeholder="Nombre Completo" required>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Rol</label>
                <select class="form-select" aria-label="Default select example" name="rol">
                  <option selected>Seleccione...</option>
                  <option value="contratacion">Área de contratación</option>
                  <option value="abogada">Abogada</option>
                </select>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Correo Electrónico</label>
                  <input class="form-control text-secondary" type="email" name="correo" placeholder="Correo Electrónico" required>
                </div>
              </div>   
                <div class="row pt-2 text-center">
                  <div class="col-6">
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
        Listar Usuarios
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        
<h4 class="text-center">Listado de Usuarios creados</h4>
        <table id="example" class="table table-striped table-bordered container" style="width:100%">
          <thead>
              <tr>
                <th>Nombre </th>
                <th>Cédula</th>
                <th>Rol</th>
                <th>Usuario</th>
                <th>Contraseña</th>
              </tr>
          </thead>
          <tbody>
            <?php
            include_once '../../controlador/conexion.php';
            $con=new Conexion();
            $con=$con->conectar(); 
        if($con){      
          $sql="SELECT * FROM tblUsuarios";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
          ?>
              <tr>
                <td><?php echo $fila['nombre'] ?></td>
                <td><?php echo $fila['cedula'] ?></td>
                <td><?php echo $fila['rol'] ?></td>
                <td><?php echo $fila['usuario'] ?></td>
                <td><?php echo $fila['contrasena'] ?></td>
          
          </tr>
          <?php
        }  
    }
  ?>
</tbody>
</table>
      </div>
    </div>
  </div>

</div>

<?php  
  include_once "footer.php"
  ?>
