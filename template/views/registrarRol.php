<?php  
  include_once "header.php"
?>
<?php  
  include_once "header2.php"
?>
<div class="accordion container mb-4 mt-4" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Creación de Roles
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <form action="../../controlador/rol.php" method="post"  enctype="multipart/form-data" class="img-form">
 <div class="overlay">
      <div class="container">
      <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'enviado'){
            ?>
              <div class=" mb-2 mt-2 alert alert-success alert-dismissible fade show" role="alert">
                <p>Se registraron los datos correctamente</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                }else if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?> 
            <div class=" mb-2 mt-2 alert alert-warning alert-dismissible fade show" role="alert">
                <p>Se eliminaron los datos correctamente</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
              }  else if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'actualizado'){
        ?>
        <div class=" mb-2 mt-2 alert alert-success alert-dismissible fade show" role="alert">
                <p>Se actualizaron los datos correctamente</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
              } 
        ?>
        <h5 class="text-center pt-3 pb-3">DATOS DE LOS ROLES ENCARGADOS DE FIRMAR LOS MODELOS</h5>
        <center><p>Los campos marcados con * son obligatorios</p></center>

         <div class="row pt-2 pb-2">
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Cédula</label>
              <input class="form-control text-secondary" type="" name="id" placeholder="Cédula director o decano" required>
            </div>
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Nombres y Apellidos</label>
              <input class="form-control text-secondary" type="" name="nombre" placeholder="Nombre director o decano" required>
            </div>

          </div>
          <div class="row pt-2 pb-2">
          <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Cargo</label>
              <input class="form-control text-secondary" type="" name="rol" placeholder="Director o Decano" required>
            </div>
          </div> 
          <div class="row pt-2 text-center">
            <div class="col-6">
                <button class="btn btn-tdea">Guardar</button>
            </div>
          </div> 
          </div>
          </div>
</form>
<table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Cargo</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  include_once '../../controlador/conexion.php';
                  $con=new Conexion();
                  $con=$con->conectar(); 
            if($con){     
              $sql="SELECT * FROM tblrol";  
              $consulta=$con->prepare($sql);
              $consulta->execute();  
              while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
              ?>
                  <tr>
                    <td><?php echo $fila['nombre'] ?></td>
                    <td><?php echo $fila['rolD'] ?></td>
                <td><a class="btn btn-primary" href="actualizarRol.php?id=<?php echo $fila['id'] ?>">
                <i class="far fa-edit"></i>
              </a></td> 
                <td><a class="btn btn-danger" href="../../controlador/eliminarRol.php?id=<?php echo $fila['id'] ?>" id="actualizar"><i class="far fa-trash-alt"></i></a></td>
                
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
  

