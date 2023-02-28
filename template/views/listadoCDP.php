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
        Lista Solicitud CDP
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <table id="example" class="table table-striped table-bordered container" style="width:100%">
          <thead>
              <tr>
                <th>Nombre Convenio</th>
                <th>Centro de costos</th>
                <th>Código Plan de acción</th>
                <th>Nombre</th>
                <th>Cedula</th>
                <th>Fecha Nacimiento</th>
                <th>Teléfono</th>
                <th>Celular</th>
                <th>Dirección</th>
                <th>Ciudad</th>
                <th>Correo</th>
                <th>Nombre Contrato</th>
                <th>N° contrato</th>
                <th>Componente</th>
                <th>Subcomponente</th>
                <th>Rol</th>
                <th>Honorarios</th>
                <th>Plazo contrato</th>
                <th>Valor contrato</th>
                <th>Fecha Inicio</th>
                <th>Fecha Final</th>
                <th>CDP</th>
                <th>RP</th>
                <th>Valor CDP</th>
                <th>Valor RP</th>
                <th>CDP GASTOS</th>
                <th>N° contrato</th>
                <th>Riesgo ARL</th>
                <th>IBC</th>
                <th>Salud</th>
                <th>Pensión</th>
                <th>Total a Pagar</th>
                <th>Operador salud</th>
                <th>Operador pensión</th>
                <th>Operador ARL</th>
                <th>Trazabilidad</th>
                <th>Estado</th>
              </tr>
          </thead>
          <tbody>
            <?php
          
        if($con){      
          $sql="SELECT a.nombre, a.fechaNacimiento, a.fijo, a.telefono, a.direccion, a.ciudad, a.correo, b.cedulaContratista, c.dependencia, j.rolDep, c.subcomponente, j.honorarios, d.plazo, d.valorContrato, d.inicio, d.final, e.numContrato, e.nombreContrato, e.entidadConvenio, e.centroCostos , e.planAccion, f.riesgo, f.ibc, f.salud, f.pension, f.total, g.nomEps, g.nomPension, g.arl FROM tblusuarios a INNER JOIN tblcontratista b ON a.usuario = b.cedulaContratista INNER JOIN tblrolcomponente j ON j.rolcomponente_id = b.rolcomponente_id INNER JOIN tblcomponentes c ON j.componente_id = c.componente_id INNER JOIN tblproyeccion d ON a.usuario = d.usuario INNER JOIN tblcontratos e ON c.numContrato = e.numContrato INNER JOIN tblibc f ON a.usuario = f.usuario INNER JOIN tblseguridad g ON a.usuario = g.usuario INNER JOIN tblanexospermanentes h ON a.usuario= h.usuario INNER JOIN tblanexos i ON a.usuario = i.usuario WHERE h.estado = 'Completo' and i.estadoa = 'Completo'";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
          ?>
              <tr>
                <td><?php echo $fila['entidadConvenio'] ?></td>
                <td><?php echo $fila['centroCostos'] ?></td>
                <td><?php echo $fila['planAccion'] ?></td>
                <td><?php echo $fila['nombre'] ?></td>
                <td><?php echo $fila['cedulaContratista'] ?></td>
                <td><?php echo $fila['fechaNacimiento'] ?></td>
                <td><?php echo $fila['fijo'] ?></td>
                <td><?php echo $fila['telefono'] ?></td>
                <td><?php echo $fila['direccion'] ?></td>
                <td><?php echo $fila['ciudad'] ?></td>
                <td><?php echo $fila['correo'] ?></td>
                <td><?php echo $fila['nombreContrato'] ?></td>
                <td><?php echo $fila['numContrato'] ?></td>
                <td><?php echo $fila['dependencia'] ?></td>
                <td><?php echo $fila['subcomponente'] ?>
                <td><?php echo $fila['rolDep'] ?></td>
                <td>$ <?php echo $fila['honorarios'] ?></td>
                <td><?php echo $fila['plazo'] ?></td>
                <td>$ <?php echo $fila['valorContrato'] ?></td>
                <td><?php echo $fila['inicio'] ?></td>
                <td><?php echo $fila['final'] ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><?php echo $fila['riesgo'] ?></td>
                <td>$ <?php echo $fila['ibc'] ?></td>
                <td>$ <?php echo $fila['salud'] ?></td>
                <td>$ <?php echo $fila['pension'] ?></td>
                <td>$ <?php echo $fila['total'] ?></td>
                <td><?php echo $fila['nomEps'] ?></td>
                <td><?php echo $fila['nomPension'] ?></td>
                <td><?php echo $fila['arl'] ?></td>
                <td></td>
                <td></td>
              </tr>
              <?php
              }  
          }
        ?>
          </tbody>
          <tfoot>
              <tr>
              <th>Nombre</th>
                <th>Cedula</th>
                <th>Fecha Nacimiento</th>
                <th>Teléfono</th>
                <th>Celular</th>
                <th>Dirección</th>
                <th>Ciudad</th>
                <th>Correo</th>
                <th>Nombre Contrato</th>
                <th>N° contrato</th>
                <th>Componente</th>
                <th>Subcomponente</th>
                <th>Rol</th>
                <th>Honorarios</th>
                <th>Plazo contrato</th>
                <th>Valor contrato</th>
                <th>Fecha Inicio</th>
                <th>Fecha Final</th>
                <th>CDP</th>
                <th>RP</th>
                <th>Valor CDP</th>
                <th>Valor RP</th>
                <th>CDP GASTOS</th>
                <th>N° contrato</th>
                <th>Riesgo ARL</th>
                <th>IBC</th>
                <th>Salud</th>
                <th>Pensión</th>
                <th>Total a Pagar</th>
                <th>Operador salud</th>
                <th>Operador pensión</th>
                <th>Operador ARL</th>
                <th>Trazabilidad</th>
                <th>Estado</th>
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

