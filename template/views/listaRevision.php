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
        Lista de chequeo
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <script src="../../public/js/main.js"></script>

        <form action="verContratista.php" method="post">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                <th>N° Cédula</th>
                <th>Nombre</th>
                <th>Componente</th>
                <th>Estado Anexos permanentes</th>
                <th>Estado Anexos periodo</th>
                <th>Revisar</th>
              </tr>
          </thead>
          <tbody>
            <?php
          
        if($con){      
          $sql="SELECT u.cedulaContratista, u.contratista, c.dependencia, a.estado, b.estadoa, r.componente_id from tblrolcomponente r INNER JOIN tblcomponentes c ON r.rolcomponente_id = c.componente_id INNER JOIN tblcontratista u ON u.rolcomponente_id = r.rolcomponente_id INNER JOIN tblanexospermanentes a ON u.cedulaContratista = a.usuario INNER JOIN tblanexos b ON u.cedulaContratista = b.usuario";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
          ?>
              <tr>
                <td><?php echo $fila['cedulaContratista'] ?></td>
                <td><?php echo $fila['contratista'] ?></td>
                <td><?php echo $fila['dependencia'] ?></td>
                <td><?php echo $fila['estado'] ?></td>
                <td><?php echo $fila['estadoa'] ?></td>
                <td><button class="btn btn-success" name="usuario" value="<?php echo $fila['cedulaContratista'] ?>" type="submit" ><i class="fas fa-search"></i></button></td>

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

