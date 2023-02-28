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
      <form  action="../../controlador/actualizarRolComponente.php" method="post" id="frmComponentes" class="img-form">
          <div class="overlay">
            <div class="container">
              <h5 class="pt-2 pb-2 text-dark text-center">ACTUALIZAR ROL</h5>
              <?php
              $rolcomponente_id = $_GET['rolcomponente_id'];
              if($con){      
              $sql="SELECT * FROM tblrolcomponente WHERE rolcomponente_id= '".$rolcomponente_id."'" ;  
              $consulta=$con->prepare($sql);
              $consulta->execute();  
              while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
    ?>      
              
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-12">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Rol</label>
                  <input class="form-control text-secondary" type="" name="rolDep" value="<?php echo $fila['rolDep'] ?>">
                </div>
              </div>
               <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-12">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Perfil</label>
                  <textarea class="form-control" name="perfil" rows="3"><?php echo $fila['perfil'] ?></textarea> 
                </div>
              </div>
               <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-12">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Objeto a Contratar</label>
                  <textarea class="form-control"  name="objetoContratar" rows="3"><?php echo $fila['objetoContratar'] ?></textarea> 
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-2 col-sm-4">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Honorarios (Mes)</label>
                  <input class="form-control text-secondary" type="number" name="honorarios" id="honorarios" value="<?php echo $fila['honorarios'] ?>" required>
                </div>
                <div class="col-xl-2 col-sm-4">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Cantidad Personas</label>
                  <input class="form-control text-secondary" type="number" id="cantidadPersonas" name="cantidadPersonas" value="<?php echo $fila['cantidadPersonas'] ?>">
                </div>
                <div class="col-xl-2 col-sm-4">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Tiempo (días)</label>
                  <input class="form-control text-secondary" type="number" id="tiempoDias" name="tiempoDias" value="<?php echo $fila['tiempoDias'] ?>">
                </div>
              </div>
              <script>
                window.onchange = function calculo() 
{
	var honorarios = document.getElementById('honorarios').value;
	var valorDia = honorarios/30;
	document.getElementById('valorDia').value = valorDia;
	var cantidadPersonas = document.getElementById('cantidadPersonas').value;
	var tiempoDias = document.getElementById('tiempoDias').value;
  var valorTotalContra = valorDia * tiempoDias;
	var valorTotalPresup = valorDia * tiempoDias * cantidadPersonas;
	document.getElementById('valorTotalPresup').value = valorTotalPresup;
  document.getElementById('valorTotalContra').value = valorTotalContra;
  console.log(valorDia);
  console.log(tiempoDias);
  console.log(cantidadPersonas);
  console.log(valorDia * tiempoDias * cantidadPersonas);
	var presupuesto = document.getElementById('presupuesto').value;
  if(valorTotalPresup > presupuesto){
    alert("Supera el tope del presupuesto asignado para este componente", 'danger')
  }else if(valorTotalPresup >= presupuesto){
    alert("A punto de Superar el tope del presupuesto asignado para este componente", 'warning ')
  }

};
var alertPlaceholder = document.getElementById('mensaje');
function alert(message, type) {
  var wrapper = document.createElement('div')
  wrapper.innerHTML = '<div class=" alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

  alertPlaceholder.append(wrapper)
}
              </script>
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Valor día</label>
                  <input class="form-control text-secondary" type="" id="valorDia" name="valorDia" value="<?php echo $fila['valorDia'] ?>" readonly>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Valor total del presupuesto</label>
                  <input class="form-control text-secondary" type="" id="valorTotalPresup" name="valorTotalPresup"  value="<?php echo $fila['valorTotalPresup'] ?>" readonly>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Valor total por contratista</label>
                  <input class="form-control text-secondary" type="" id="valorTotalContra" name="valorTotalContra"  value="<?php echo $fila['valorTotalContra'] ?>" readonly >
                </div>
                
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Fecha de Apertura</label>
                  <input class="form-control text-secondary" type="date" name="fechaApertura" value="<?php echo $fila['fechaApertura'] ?>">
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Fecha de cierre</label>
                  <input class="form-control" type="date" name="fechaCierre" value="<?php echo $fila['fechaCierre'] ?>">
                </div>
              </div>
              <div class="row pt-2 pb-2">
                 <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Hora de cierre</label>
                  <input class="form-control" type="time" name="horaCierre" value="<?php echo $fila['horaCierre'] ?>">
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Fecha de Publicación</label>
                  <input class="form-control" type="date" name="fechaPublicacion" value="<?php echo $fila['fechaPublicacion'] ?>" >
                </div>
              </div>
               <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Medio de publicación</label>
                  <input class="form-control text-secondary" type="" name="medioPublicacion" value="<?php echo $fila['medioPublicacion'] ?>">
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-12">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Observaciones</label>
                    <textarea class="form-control"  name="adiciones" rows="3"><?php echo $fila['adiciones'] ?></textarea> 
                </div>
              </div>  
              <input type="hidden" id="rolcomponente_id" name="componente_id" value="<?php echo $fila['rolcomponente_id'] ?>"/>

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
