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
      <form  action="../../controlador/actualizarComponente.php" method="post" id="frmComponentes" class="img-form">
          <div class="overlay">
            <div class="container">
              <h5 class="pt-2 pb-2 text-dark text-center">ACTUALIZAR COMPONENTES</h5>
              <?php
              $componente_id = $_GET['componente_id'];
              if($con){      
              $sql="SELECT * FROM tblComponentes WHERE componente_id= '".$componente_id."'" ;  
              $consulta=$con->prepare($sql);
              $consulta->execute();  
              while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
    ?>
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">N° de Contrato relacionado</label>
                  <input class="form-control text-secondary" type="" name="numContrato" placeholder="Dependencia" value="<?php echo $fila['numContrato'] ?>" required>
                </div>
              </div>
             
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Componentes</label>
                  <input class="form-control text-secondary" type="" name="dependencia" placeholder="Dependencia" value="<?php echo $fila['dependencia'] ?>" required>
                </div>
                  <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label text-dark">Subcomponente</label>
                  <input class="form-control text-secondary" type="" name="subcomponente" value="<?php echo $fila['subcomponente'] ?>"  required>
                </div>
                
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-12">
                   <label for="formGroupExampleInput" class="form-label required text-dark">Presupuesto del componente</label>
                  <input class="form-control text-secondary" type="" id="presupuesto" name="presupuesto" value="<?php echo $fila['presupuesto'] ?>">
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">¿Requiere desplazamiento?</label><br>
                  <input class="form-check-input" type="radio" name="desplazamiento"  name="desplazamiento" value="Si" checked>
                   <label class="form-check-label" for="flexRadioDefault2">Si </label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                   <input class="form-check-input" type="radio" name="desplazamiento" name="desplazamiento" value="No"> 
                   <label class="form-check-label" for="flexRadioDefault1"> No</label>
                </div>
              </div>              
              <input type="hidden" id="componente_id" name="componente_id" value="<?php echo $fila['componente_id'] ?>"/>

              <?php
            }  
        }
      ?>       
                <div class="row pt-2 text-center">
                  <div class="col-6">
                      <button class="btn btn-tdea" id="guardarDep">Guardar</button>
                  </div>
                </div> 
                <div class="mb-4" id="mensaje"></div>          
            </div>
              </div>
        </form >
      </div>
    </div>
  </div>
</div>

        <?php  include_once "footer.php" ?>
