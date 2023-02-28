<?php
    include_once('tbs_class.php'); 
    include_once('plugins/tbs_plugin_opentbs.php'); 
    include_once 'conexion.php';
    session_start(); 
$con=new Conexion();
  $con=$con->conectar();
  $usuario = $_REQUEST['usuario'];
  if($con){    
    $sql="SELECT a.contrato, a.usuario, a.honorarios, a.honorariosLetras, a.tipoContrato, a.valorContrato, a.contratoLetras, a.numCDP, a.valorCDP, a.fechaCDP, a.desplazamiento, a.CDPDesplazamiento, a.valorCDPDesplazamiento, a.fechaCDPDesplazamiento, a.numRP, a.valorRP, a.fechaRP, a.identificacionNecesidad, a.nombreD, a.nomOrdenador, b.contratista, b.obligaciones, c.objetoContratar, c.perfil, d.supervisor, d.rol, f.numContrato, f.usuario, f.plazo, f.final, g.rolD FROM tblcontratofinal a INNER JOIN tblcontratista b ON a.usuario = b.cedulaContratista INNER JOIN tblrolcomponente c ON c.rolcomponente_id = b.rolcomponente_id INNER JOIN tblcomponentes z ON z.componente_id = c.componente_id INNER JOIN tblcontratos d ON d.numContrato = z.numContrato INNER JOIN tblproyeccion f ON f.usuario = a.usuario INNER JOIN tblrol g ON g.nombre = a.nombreD WHERE a.usuario= '".$usuario."'";  
    $consulta=$con->prepare($sql);
    $consulta->execute(); 
    if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){ 
        
       
        $contratista = $fila['contratista'];
        $ordenador = $fila['nomOrdenador'];
        $supervisor = $fila['supervisor'];
        $nombreD = $fila['nombreD'];
        
      
          
    $TBS = new clsTinyButStrong; 
    $TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); 
    //Parametros
    if($fila['desplazamiento'] == "Yes"){
    $nombreContratista = mb_strtoupper($contratista,'utf-8');
    $nomOrdenador = mb_strtoupper($ordenador,'utf-8');
    $nomD = mb_strtoupper($nombreD,'utf-8');
    $rolD = $fila['rolD'];
    $contrato = $fila['contrato'];
}else{
    $nombreContratista = mb_strtoupper($contratista,'utf-8');
    $nomOrdenador = mb_strtoupper($ordenador,'utf-8');
    $nomD = mb_strtoupper($nombreD,'utf-8');
    $rolD = $fila['rolD'];
    $contrato = $fila['contrato'];
}
    //Cargando template
    $template = 'Evaluación y Aceptación.docx';
    $TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);
    //Escribir Nuevos campos
    $TBS->MergeField('pro.usuario', $usuario);
    $TBS->MergeField('pro.contrato', $contrato);
    $TBS->MergeField('pro.nombreContratista', $nombreContratista);
    $TBS->MergeField('pro.nomOrdenador', $nomOrdenador);
    $TBS->MergeField('pro.rolD', $rolD);
    $TBS->MergeField('pro.nomD', $nomD);
    $TBS->PlugIn(OPENTBS_DELETE_COMMENTS);

    $save_as = (isset($_POST['save_as']) && (trim($_POST['save_as'])!=='') && ($_SERVER['SERVER_NAME']=='localhost')) ? trim($_POST['save_as']) : '';
    $output_file_name = str_replace('.', '_'.$contrato.$save_as.'.', $template);
    if ($save_as==='') {
        $TBS->Show(OPENTBS_DOWNLOAD, $output_file_name); 
        exit();
    } else {
        $TBS->Show(OPENTBS_FILE, $output_file_name);
        exit("File [$output_file_name] has been created.");
    }

}
}

    
?>