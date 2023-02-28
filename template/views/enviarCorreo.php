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
  <!--<div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Insertar datos
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <div class="container">
          <div class="row border bg-light">
            <div class="col">
              <h6 class="text-center">INFORMACIÓN GENERAL</h6>
            </div>
          </div>
            <div class="row">
                <div class="col border">
                  Tipo de Contrato
                </div>
                <div class="col border">
                  Prestación de Servicios
                </div>
            </div>
            <div class="row">
                <div class="col border">
                  Honorarios
                </div>
                <div class="col border">
                  Larry the Bird
                </div>
            </div>
            <div class="row">
                <div class="col border">
                  Convenio o contrato que lo respalda
                </div>
                <div class="col border">
                  Jacob
                </div>
            </div>
            <div class="row">
                <div class="col border">
                  Número de personas requeridas
                </div>
                <div class="col border">
                  3
                </div>
            </div>
            <div class="row">
                <div class="col-12 border bg-light">
              <h6 class="text-center">PERFIL REQUERIDO</h6>
                </div>
                <div class="col-12 border">
                    fdggdg
                </div>
          </div>
            <div class="row">
                <div class="col-12 border bg-light">
              <h6 class="text-center">OBJETO A CONTRATAR</h6>
                </div>
                <div class="col-12 border">
                    fdggdg
                </div>
          </div>
            <div class="row">
            <div class="col-12 border">
              <h6 class="text-center">CRITERIOS DE CALIFICACIÓN</h6>
            </div>
              <div class="col-12 border">
                <ul>
                <li>Formación Académica</li>
                <li>Experiencia Requerida</li>
                    <br>
                    <b>Nota:</b> Y los demás requisitos establecidos por la dependencia.
              </ul>
              </div>
            </div>
            <div class="row">
                <div class="col-12 border bg-light">
                 <h6 class="text-center">CRONOGRAMA</h6>
                </div>
                <div class="col-6 border">
                Fecha de Apertura y publicación
                </div>
                <div class="col-6 border">
                    26/12/2021
                </div>
                <div class="col-6 border">
                Medio de publicacón
                </div>
                <div class="col-6 border">
                    El Portal Universitario del Tecnológico de Antioquia -I.U (<a href="www.tdea.edu.co" target="_blank">www.tdea.edu.co</a>).  
                </div>
                <div class="col-6 border">
                Fecha y hora de Cierre de la Invitación Pública
                </div>
                <div class="col-6 border">
                    26/12/2021 - 23:00h
                </div>
                <div class="col-6 border">
                Publicación de resultados 
                </div>
                <div class="col-6 border">
                    26/12/2021
                </div>
            </div>
            <div class="row">
            <div class="col-12 border bg-light">
              <h6 class="text-center">REQUISITOS DE PARTICIPACIÓN</h6>
            </div>
              <div class="col-12 border">
                <ul>
                <li>En la presente invitación podrán participar las personas naturales que no tengan inhabilidades, incompatibilidades ni conflicto de intereses para contratar de acuerdo con Constitución Política, la Ley, el Acuerdo Superior 395 de 2011 y el Acuerdo Superior 419 de 2014.</li>
                <li>Las hojas de vida recibidas en el término previsto, serán revisadas para verificar el cumplimiento de los requisitos exigidos en el perfil. Sólo serán calificadas las hojas de vida que cumplan con dichos requisitos, las demás serán rechazadas.</li>
                    <li>Para efectos de la contratación de prestación de servicios de ejecución personal tener en cuenta la Resolución Rectoral 42899 de 2017, en especial las excepciones establecidas en el artículo 15 y las precisiones del parágrafo 2° del artículo 16.</li>
              </ul>
              </div>
            </div>
            <div class="row">
            <div class="col-12 border bg-light">
              <h6 class="text-center">REQUISITOS DE PARTICIPACIÓN</h6>
            </div>
              <div class="col-12 border">
                <ul>
                <li>Copia de solo títulos obtenidos de educación formal: bachiller, pregrado y posgrados (diploma o actas de grado). Coherentes con lo registrado en la Hoja de Vida de la Función Pública.</li>
                <li>Soportes de otros estudios realizados y experiencia laboral </li>
                    <li>Una fotocopia ampliada al 150% de la Cédula de Ciudadanía legible.</li>
                    <li>Certificado de situación militar cuando aplique</li>
                    <li>Copia de la matrícula, tarjeta o registro profesional cuando aplique.</li>
                    <li>Copia del Registro Único Tributario –RUT actualizado o del año anterior.</li>
                    <li>Certificado de antecedentes judiciales en <a href="www.policia.gov.co" target="_blank">www.policia.gov.co</a></li>
                    <li>Certificado de antecedentes disciplinarios en <a href="www.procuraduria.gov.co" target="_blank">www.procuraduria.gov.co</a></li>
                    <li>Certificado de responsabilidad fiscal en <a href="www.contraloria.gov.co" target="_blank">www.contraloria.gov.co</a></li>
                    <li>Certificado	de Sistema Registro Nacional de Medidas	Correctivas	RNMC en <a href="https://srvpsi.policia.gov.co/PSC/frm_cnp_consulta.aspx" target="_blank">https://srvpsi.policia.gov.co/PSC/frm_cnp_consulta.aspx</a>.</li>
              </ul>
              </div>
            </div>
             <div class="row">
            <div class="col-12 border bg-light">
              <h6 class="text-center">CONTRATACIÓN</h6>
            </div>
              <div class="col-12 border">
                Luego de publicar los resultados, la(s) persona(s) seleccionada(s) mediante esta invitación deberá(n) anexar los documentos al siguiente link <a href="" target="_blank">www.tdea.edu.co/documentacion</a> y posteriormente entregar en la oficina respectiva la documentación exigida por la Universidad en los (3) días posteriores a la misma, con la finalidad de celebrar el contrato. 
            <br>
            <br>
            <ins>Quien no se presente en el tiempo estipulado se entenderá no interesado en celebrar el contrato</ins>
        
        
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>-->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Enviar correos
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <?php 
                if(isset($_GET['mensajeCorreo']) and $_GET['mensajeCorreo'] == 'enviado'){
            ?>
              <div class=" mb-2 mt-2 alert alert-success alert-dismissible fade show" role="alert">
                <p id="enviado">Correo Enviado</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                }
            ?> 
        <table id="example container" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                <th>Nombre Contrato</th>
                <th>Honorarios</th>
                <th>Cant Personas</th>
                <th>Perfil</th>
                <th>Objeto Contratar</th>
                <th>Fecha Apertura</th>
                <th>Fecha Cierre</th>
                <th>Fecha Publicación</th>
                <th>Correo</th>
                <th></th>
                <th>Estado</th>
              </tr>
          </thead>
          <tbody>
            <?php
          
        if($con){      
          $sql="SELECT * FROM tblInfoContratos";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
          ?>
              <tr>
                <inpunt type="hidden" name="infoContratos_id" ></input>
                <td name="nombreContrato"><?php echo $fila['nombreContrato'] ?></td>
                <td name="honorarios"><?php echo $fila['honorarios'] ?></td>
                <td name="cantidadPersonas"><?php echo $fila['cantidadPersonas'] ?></td>
                <td name="perfil"><?php echo $fila['perfil'] ?></td>
                <td name="objetoContratar"><?php echo $fila['objetoContratar'] ?></td>
                <td name="fechaApertura"><?php echo $fila['fechaApertura'] ?></td>
                <td name="fechaCierre"><?php echo $fila['fechaCierre'] ?> - <?php echo $fila['horaCierre'] ?>H</td>
                <td name="fechaPublicacion"><?php echo $fila['fechaPublicacion'] ?></td>
                <td name="correo"><?php echo $fila['correo'] ?></td>
                <td><a class="btn btn-primary" href="../../controlador/correos.php?infoContratos_id=<?php echo $fila['infoContratos_id'] ?>" id="enviar" name="enviar"><i class="far fa-paper-plane"></i></a></td>
                <td name="estado"><?php echo $fila['estado'] ?></td>
                <?php
              }  
          }
        ?>
              </tr>
              
          </tbody>
          <tfoot>
              <tr>
              <th>Nombre Contrato</th>
                <th>Honorarios</th>
                <th>Cant Personas</th>
                <th>Perfil</th>
                <th>Objeto Contratar</th>
                <th>Fecha Apertura</th>
                <th>Medio de publicación</th>
                <th>Fecha Cierre</th>
                <th>Fecha Publicación</th>
                <th>Correo</th>
                <th></th>
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