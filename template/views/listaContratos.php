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
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Lista de contratos
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <script src="../../public/js/main.js"></script>

        <form action="verContratista.php" method="post">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                <th>N° Contrato</th>
                <th>Año</th>
                <th>Objeto a Contratar</th>
                <th>Valor Contrato</th>
                <th>Fecha Inicial</th>
                <th>Fecha Final</th>
              </tr>
          </thead>
          <tbody>
            <?php
          
        if($con){      
          $sql="SELECT b.contratista, b.obligaciones, c.objetoContratar, c.perfil, f.numContrato, f.periodo, f.inicio, f.final, f.valorContrato FROM tblcontratista b INNER JOIN tblcomponentes c ON c.componente_id = b.componente_id INNER JOIN tblproyeccion f ON f.usuario = b.cedulaContratista";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
          ?>
              <tr>
                <td><?php echo $fila['numContrato'] ?></td>
                <td><?php echo $fila['periodo'] ?></td>
                <td><?php echo $fila['objetoContratar'] ?></td>
                <td><?php echo $fila['valorContrato'] ?></td>
                <td><?php echo $fila['inicio'] ?></td>
                <td><?php echo $fila['final'] ?></td>

              </tr>
              <?php
              }  
          }
        ?>
          </tbody>
          <tfoot>
              <tr>
              <th>N° Cédula</th>
                <th>Nombre</th>
                <th>Componente</th>
                <th>Estado Anexos permanentes</th>
                <th>Estado Anexos periodo</th>
                <th>Revisar</th>
              </tr>
          </tfoot>
      </table>
        </form>

      </div>
    </div>
  </div>
</div>
<?php  
  include_once "footer.php"
?>

