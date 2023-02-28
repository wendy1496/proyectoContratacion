  <?php
    if($nombre == 'contrato' && $variable == "Guardado"){
  ?>
  <div class="row pt-4">
  <label for="formGroupExampleInput" class="form-label text-dark text-center"><?php echo $titulo ?></label>
  <div class="col-xl-2 col-sm-4 alert-success text-center" role="alert">
      Descargue y firme el documento
    </div>

  <div class="col-xl-2 col-sm-4">
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#a<?php echo $nombre ?>">
              <i class="far fa-file-pdf"></i>
              </button>
              <div class="modal fade" id="a<?php echo $nombre ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Anexo</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                  <iframe src="<?php ECHO '../../controlador/anexos/'.$texto.$_SESSION['username'].'.pdf' ?>" style="width:100%; height:600px;" frameborder="0"></iframe>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>
                           
            </div>
    </div>
            <?php
    }else if($nombre == 'contrato' && $variable == "Sin subir"){
  ?>
   <div class="row pt-4">
  <label for="formGroupExampleInput" class="form-label required text-dark text-center"><?php echo $titulo ?></label>

  <div class="col-xl-2 col-sm-4 alert-danger text-center" role="alert">
      No se han subido documentos
    </div>
    </div>
    <?php
    }
  ?>
   <?php
    if($nombre == 'contratoFirmado'){
  ?>
  <!-- ESTADO SIN SUBIR -->
  <?php
    if ($variable=='Sin subir') {
  ?> 
  <div class="row pt-4">
  <label for="formGroupExampleInput" class="form-label required text-dark text-center"><?php echo $titulo ?></label>
    <div class="col-xl-6 col-sm-6">
    <input class="form-control text-secondary" type="file" accept=".pdf, .doc, .xls" name="<?php echo $nombre ?>" placeholder="Entidad del Convenio" required> 
  </div>        
    <div class="col-xl-2 col-sm-4 alert-danger text-center" role="alert">
      No se han subido documentos
    </div>
    </div>
    <?php
      }
    ?>
  <!-- ESTADO GUARDADO -->
  <?php
    if ($variable=='Firmado') {
  ?>    
  <div class="row pt-4">
  <label for="formGroupExampleInput" class="form-label required text-dark text-center"><?php echo $titulo ?></label>
  <div class="col-xl-6 col-sm-6">
    <input class="form-control text-secondary" type="file" accept=".pdf, .doc, .xls" name="<?php echo $nombre ?>" placeholder="Entidad del Convenio">
  </div>       
            <div class="col-xl-2 col-sm-4 alert-success text-center" role="alert">
      Firmado
    </div>
    <div class="col-xl-2 col-sm-4">
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#a<?php echo $nombre ?>">
              <i class="far fa-file-pdf"></i>
              </button>
              <div class="modal fade" id="a<?php echo $nombre ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Anexo</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                  <iframe src="<?php ECHO '../../controlador/anexos/'.$texto.$_SESSION['username'].'.pdf' ?>" style="width:100%; height:600px;" frameborder="0"></iframe>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>
                           
            </div>
    </div>
            <?php
                }
            ?>
 <?php
    }else if($nombre != 'contratoFirmado' && $nombre != 'contrato'){
?>
    <input class="form-control text-secondary" type="file" accept=".pdf, .doc, .xls" name="<?php echo $nombre ?>" placeholder="Entidad del Convenio" hidden>

      <?php
    }
  ?>
<?php
    if($nombre == 'actaInicio' && $variable == "Guardado"){
  ?>
  <div class="row pt-4">
  <label for="formGroupExampleInput" class="form-label text-dark text-center"><?php echo $titulo ?></label>
  <div class="col-xl-2 col-sm-4 alert-success text-center" role="alert">
      Descargue y firme el documento
    </div>

  <div class="col-xl-2 col-sm-4">
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#a<?php echo $nombre ?>">
              <i class="far fa-file-pdf"></i>
              </button>
              <div class="modal fade" id="a<?php echo $nombre ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Anexo</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                  <iframe src="<?php ECHO '../../controlador/anexos/'.$texto.$_SESSION['username'].'.pdf' ?>" style="width:100%; height:600px;" frameborder="0"></iframe>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>
                           
            </div>
    </div>
    <div class="row pt-4">
  <label for="formGroupExampleInput" class="form-label required text-dark text-center">Subir acta de inicio firmado</label>
    <div class="col-xl-6 col-sm-6">
    <input class="form-control text-secondary" type="file" accept=".pdf, .doc, .xls" name="<?php echo $nombre ?>" placeholder="Entidad del Convenio" required> 
  </div>        
    <div class="col-xl-2 col-sm-4 alert-danger text-center" role="alert">
      No se han subido documentos
    </div>
    </div>
            <?php
    }else if($nombre == 'actaInicio' && $variable == "Sin subir"){
  ?>
   <div class="row pt-4">
  <label for="formGroupExampleInput" class="form-label required text-dark text-center"><?php echo $titulo ?></label>

  <div class="col-xl-2 col-sm-4 alert-danger text-center" role="alert">
      No se han subido documentos
    </div>
    </div>
    <?php
    }else if($nombre == 'actaInicio' && $variable == "Firmado"){
  ?>
  <div class="row pt-4">
    
  <label for="formGroupExampleInput" class="form-label text-dark text-center"><?php echo $titulo ?></label>
  <div class="col-xl-6 col-sm-6">
    <input class="form-control text-secondary" type="file" accept=".pdf, .doc, .xls" name="<?php echo $nombre ?>" placeholder="Entidad del Convenio">
  </div> 
  <div class="col-xl-2 col-sm-4 alert-success text-center" role="alert">
      Firmado
    </div>

  <div class="col-xl-2 col-sm-4">
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#a<?php echo $nombre ?>">
              <i class="far fa-file-pdf"></i>
              </button>
              <div class="modal fade" id="a<?php echo $nombre ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Anexo</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                  <iframe src="<?php ECHO '../../controlador/anexos/'.$texto.$_SESSION['username'].'.pdf' ?>" style="width:100%; height:600px;" frameborder="0"></iframe>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>
                           
            </div>
    </div>
    <?php
    }
  ?>
