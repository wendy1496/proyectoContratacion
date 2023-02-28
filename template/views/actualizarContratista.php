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
        Editar datos
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form action="../../controlador/actualizarContratista2.php" method="post" id="frmComponentes" class="img-form">
          <div class="overlay">
            <div class="container">
              
            <h5 class="pt-2 pb-2 text-dark text-center">CREAR CONTRATISTA</h5> 
            <?php
              $cedulaContratista = $_GET['cedulaContratista'];
              if($con){      
              $sql="SELECT * FROM tblcontratista WHERE cedulaContratista= '".$cedulaContratista."'" ;  
              $consulta=$con->prepare($sql);
              $consulta->execute();  
              while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
    ?>
              <div class="row pt-2 pb-2">
              <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Cédula</label>
                  <input class="form-control text-secondary" type="" name="cedula" placeholder="Cédula"value="<?php echo $fila['cedulaContratista'] ?>" readonly>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Contratista</label>
                  <input class="form-control text-secondary" type="" name="contratista" value="<?php echo $fila['contratista'] ?>" required>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Celular</label>
                  <input class="form-control text-secondary" type="" name="telefono" value="<?php echo $fila['telefono'] ?>" required>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Correo Electrónico</label>
                  <input class="form-control text-secondary" type="email" name="correo" value="<?php echo $fila['correo'] ?>" required>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-12">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Obligaciones</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="obligaciones" rows="3" required><?php echo $fila['obligaciones'] ?></textarea> 
                </div>
              </div>    
              <?php
            }  
        }
      ?>       
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
  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="../../public/js/validaciones2.js"></script>
<?php  
  include_once "footer.php"
?>

