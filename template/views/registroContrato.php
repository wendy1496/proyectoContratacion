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
        <form  action="../../controlador/contratoFinal.php" method="post" id="frmComponentes" class="img-form">
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
                }
            ?> 
              <h5 class="pt-2 pb-2 text-dark text-center">Registrar datos para la creación de contratos</h5>
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Seleccionar Contrato</label>
                  <select class="form-select" aria-label="Default select example" name="tipoContrato"  required>
                    <option selected>Seleccione...</option>
                    <option value="apoyo">Apoyo a la gestión</option>
                    <option value="profesional">Profesional</option>
                  </select>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                <?php
          
          if($con){    
            $usuario = $_GET['usuario'];  
            $sql2="SELECT * FROM tblproyeccion WHERE usuario= '".$usuario."'";  
            $consulta=$con->prepare($sql2);
            $consulta->execute();  
            if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
            ?>
            <input class="form-control text-secondary" type="hidden" name="contrato" value="<?php echo $fila['numContrato'] ?>">
            <input class="form-control text-secondary" type="hidden" name="usuario" value="<?php echo $fila['usuario'] ?>">
            <input class="form-control text-secondary" type="hidden" name="vhonorarios" value="<?php echo $fila['honorarios'] ?>" readonly>
            <input class="form-control text-secondary" type="hidden" name="vContrato" value="<?php echo $fila['valorContrato'] ?>" readonly>
            <?php
              }  
          }
          $honorarios = number_format($fila['honorarios']);
          $contrato = number_format($fila['valorContrato']);
        ?>
            <label for="formGroupExampleInput" class="form-label required text-dark">Honorarios</label>
                  <input class="form-control text-secondary" type="" name="honorarios" value="$ <?php echo $honorarios?>" readonly>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label text-dark">Honorarios En letras</label>
                  <input class="form-control text-secondary" type="" name="honorariosLetras" placeholder="Ingrese el valor en letras" required>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Valor Contrato</label>
                  <input class="form-control text-secondary" type="" name="valorContrato" value="$ <?php echo $contrato?>" readonly>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label text-dark">Valor Contrato En letras</label>
                  <input class="form-control text-secondary" type="" name="contratoLetras" placeholder="Ingrese el valor en letras" required>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">N° CDP</label>
                  <input class="form-control text-secondary" type="" name="numCDP" placeholder="Número del CDP" required>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label text-dark">Valor CDP</label>
                  <input class="form-control text-secondary" type="" name="valorCDP" placeholder="Ingrese el valor sin puntos ni comas" required>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Valor total por contratista</label>
                  <input class="form-control text-secondary" type="date" id="fechaCDP" name="fechaCDP"  placeholder="Valor total por contratista $" >
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">¿Requiere desplazamiento?</label><br>
                <input class="form-check-input" type="radio" id="si"  name="desplazamiento" value="Si" >
                 <label class="form-check-label" for="flexRadioDefault2">Si </label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                 <input class="form-check-input" type="radio" id="no" name="desplazamiento" value="No"> 
                 <label class="form-check-label" for="flexRadioDefault1"> No</label>
                </div>
              </div>
    <div class="row pt-2 pb-2">
     <center class="pb-2 pt-2">En caso de ser SI, ingrese los siguientes datos</center>  <br>
     
      <div class="col-xl-2 col-sm-6">
        
        <label for="formGroupExampleInput" class="form-label text-dark">N° CDP</label>
        <input class="form-control text-secondary" id="CDPDesplazamiento" type="" placeholder="Número del CDP" name="CDPDesplazamiento" disabled>
      </div>
      <div class="col-xl-2 col-sm-6">
        <label for="formGroupExampleInput" class="form-label text-dark">Valor CDP </label>
        <input class="form-control text-secondary" type="" id="valorCDPDesplazamiento" placeholder="Ingrese el valor sin puntos ni comas" name="valorCDPDesplazamiento" disabled>
      </div>
      <div class="col-xl-2 col-sm-6">
        <label for="formGroupExampleInput" class="form-label text-dark">¿Hasta cuándo?</label>
        <input class="form-control text-secondary" type="date" id="fechaCDPDesplazamiento" name="fechaCDPDesplazamiento" disabled>
      </div>
      </div>
      <script src="../../public/js/jquery.min.js"></script>
      <script>
    
    var CDPDesplazamiento = document.getElementById('CDPDesplazamiento');
    var valorCDPDesplazamiento = document.getElementById('valorCDPDesplazamiento');
    var fechaCDPDesplazamiento = document.getElementById('fechaCDPDesplazamiento');
    
    document.getElementById('si').addEventListener('click', function(e) {
      CDPDesplazamiento.disabled = false;
      valorCDPDesplazamiento.disabled = false;
      fechaCDPDesplazamiento.disabled = false;
    });
    
    document.getElementById('no').addEventListener('click', function(e) {
      CDPDesplazamiento.disabled = true;
      valorCDPDesplazamiento.disabled = true;
      fechaCDPDesplazamiento.disabled = true;
    });
      </script>
      <div class="row pt-2 pb-2">
        <div class="col-xl-3 col-sm-6">
          <label for="formGroupExampleInput" class="form-label required text-dark">N° RP</label>
          <input class="form-control text-secondary" type="" name="numRP" placeholder="Número del CDP" required>
        </div>
        <div class="col-xl-3 col-sm-6">
          <label for="formGroupExampleInput" class="form-label text-dark">Valor RP</label>
          <input class="form-control text-secondary" type="" name="valorRP" placeholder="Ingrese el valor sin puntos ni comas" required>
        </div>
      </div>
      <div class="row pt-2 pb-2">
        <div class="col-xl-3 col-sm-6">
          <label for="formGroupExampleInput" class="form-label required text-dark">Fecha RP</label>
          <input class="form-control text-secondary" type="date" name="fechaRP" placeholder="Número del CDP" required>
        </div>
        <div class="col-xl-3 col-sm-6">
          <label for="formGroupExampleInput" class="form-label text-dark">Adjuntar CDP</label>
          <input class="form-control text-secondary" type="file" accept=".pdf, .doc, .xls" name="cdp">            
        </div>
      </div>
      
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Seleccione director o decano</label>
                  <select class="form-select" aria-label="Default select example" name="nombreD"  required>
                    <option selected>Seleccione...</option>
                    <?php
          
        if($con){      
          $sql2="SELECT * FROM tblrol";  
          $consulta=$con->prepare($sql2);
          $consulta->execute();  
          while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
          ?>
                   
                    <option value="<?php echo $fila['nombre'] ?>"><?php echo $fila['nombre'] ?></option>
                    <?php
                  }  
              }
            ?>
                  </select>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Seleccione el ordenador</label>
                  <select class="form-select" aria-label="Default select example" name="nomOrdenador"  required>
                    <option selected>Seleccione...</option>
                    <?php
          
          if($con){      
            $sql2="SELECT * FROM tblrol WHERE rol= 'Director(a) de Extensión Académica'";  
            $consulta=$con->prepare($sql2);
            $consulta->execute();  
            while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
            ?>
                    <option value="<?php echo $fila['nombre'] ?>"><?php echo $fila['nombre'] ?></option>
                    
                    <?php
                  }  
              }
            ?>
                  </select>
                </div>
              </div>
              
         
              <div class="row pt-2 text-center">
                <div class="col-6">
                    <button class="btn btn-tdea">Guardar</button>
                </div>
              </div>
              
      </div>
    </div>
  </div>
  </div>
</div>
</div>

<?php  
  include_once "footer.php"
?>

