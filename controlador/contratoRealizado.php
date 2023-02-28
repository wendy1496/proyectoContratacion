<?php
    include_once('tbs_class.php'); 
    include_once('plugins/tbs_plugin_opentbs.php'); 
    include_once 'conexion.php';
    session_start(); 
$con=new Conexion();
  $con=$con->conectar();
  $usuario = $_REQUEST['usuario'];
  $elaboro = $_SESSION['nombre'];
  if($con){    
    $sql="SELECT a.contrato, a.usuario, a.honorarios, a.honorariosLetras, a.tipoContrato, a.valorContrato, a.contratoLetras, a.numCDP, a.valorCDP, a.fechaCDP, a.desplazamiento, a.CDPDesplazamiento, a.valorCDPDesplazamiento, a.fechaCDPDesplazamiento, a.numRP, a.valorRP, a.fechaRP, a.identificacionNecesidad, a.nombreD, a.nomOrdenador, b.contratista, b.obligaciones, c.objetoContratar, c.perfil, d.supervisor, d.rol, f.numContrato, f.usuario, f.plazo, f.final, f.periodo, g.rolD FROM tblcontratofinal a INNER JOIN tblcontratista b ON a.usuario = b.cedulaContratista INNER JOIN tblrolcomponente c ON c.rolcomponente_id = b.rolcomponente_id INNER JOIN tblcomponentes z ON z.componente_id = c.componente_id INNER JOIN tblcontratos d ON d.numContrato = z.numContrato INNER JOIN tblproyeccion f ON f.usuario = a.usuario INNER JOIN tblrol g ON g.nombre = a.nombreD WHERE a.usuario= '".$usuario."'";  
    $consulta=$con->prepare($sql);
    $consulta->execute(); 
    if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){ 
        
        $final =  $fila['final'];
        $final = strtotime($final);
        $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
        $mes = $meses[date('n', $final)-1];
        $dia = date('d', $final);
        $ao = date('Y', $final);
        $contratista = $fila['contratista'];
        $ordenador = $fila['nomOrdenador'];
        $fechaRP = $fila['fechaRP'];
        $fechaRP = strtotime($fechaRP);
        $mesRP = $meses[date('n', $fechaRP)-1];
        $diaRP = date('d', $fechaRP);
        $aoRP = date('Y', $fechaRP);
        $fechaCDPDesplazamiento = $fila['fechaCDPDesplazamiento'];
        $fechaCDP = strtotime($fechaCDPDesplazamiento);
        $mesCDP = $meses[date('n', $fechaCDP)-1];
        $diaCDP = date('d', $fechaCDP);
        $aoCDP = date('Y', $fechaCDP);
        $fechafinalCDP = $diaCDP." de ".$mesCDP." de ".$aoCDP;
        $CDPDesplazamiento = $fila['CDPDesplazamiento'];
        $textoCDP = " y el Certificado de Disponibilidad Presupuestal No.".$CDPDesplazamiento." del ".$fechafinalCDP. ", que soporta los gastos administrativos, expedidos por la Oficina de Presupuesto de la Institución.";
      
          
    $TBS = new clsTinyButStrong; 
    $TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); 
    //Parametros
    if($fila['desplazamiento'] == "Yes"){
    $desplazamiento = "Además, contará con gastos de desplazamiento para el cumplimiento de sus obligaciones contractuales en caso de requerirlos y deberá legalizarlos de acuerdo al procedimiento institucional.";
    $tipoContratoM = $fila['tipoContrato'];
    $tipoContrato = mb_strtoupper($tipoContratoM,'utf-8');
    $contrato = $fila['contrato'];
    $honorarios = $fila['honorarios'];
    $nombreContratista = mb_strtoupper($contratista,'utf-8');
    $nomOrdenador = mb_strtoupper($ordenador,'utf-8');
    $objetoContratar = $fila['objetoContratar'];
    $honorariosLetras = $fila['honorariosLetras'];
    $valorContrato = $fila['valorContrato'];
    $contratoLetras = $fila['contratoLetras'];
    $obligaciones = $fila['obligaciones'];
    $plazo = $fila['plazo'];
    $rol = $fila['rol'];
    $numRP = $fila['numRP'];
    $periodo = $fila['periodo'];
    $textofinalCDP = $textoCDP;
    $fechafinal = $dia." de ".$mes." de ".$ao;
    $fechafinalRP = $diaRP." de ".$mesRP." de ".$aoRP;
}else{
    $desplazamiento = "";
    $tipoContratoM = $fila['tipoContrato'];
    $tipoContrato = mb_strtoupper($tipoContratoM,'utf-8');
    $contrato = $fila['contrato'];
    $honorarios = $fila['honorarios'];
    $nombreContratista = mb_strtoupper($contratista,'utf-8');
    $nomOrdenador = mb_strtoupper($ordenador,'utf-8');
    $objetoContratar = $fila['objetoContratar'];
    $honorariosLetras = $fila['honorariosLetras'];
    $valorContrato = $fila['valorContrato'];
    $contratoLetras = $fila['contratoLetras'];
    $obligaciones = $fila['obligaciones'];
    $plazo = $fila['plazo'];
    $rol = $fila['rol'];
    $numRP = $fila['numRP'];
    $periodo = $fila['periodo'];
    $textofinalCDP = ".";
    $fechafinal = $dia." de ".$mes." de ".$ao;
    $fechafinalRP = $diaRP." de ".$mesRP." de ".$aoRP;
}
    //Cargando template
    $template = 'Contrato.docx';
    $TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);
    //Escribir Nuevos campos
    $TBS->MergeField('pro.usuario', $usuario);
    $TBS->MergeField('pro.contrato', $contrato);
    $TBS->MergeField('pro.tipoContrato', $tipoContrato);
    $TBS->MergeField('pro.nombreContratista', $nombreContratista);
    $TBS->MergeField('pro.nomOrdenador', $nomOrdenador);
    $TBS->MergeField('pro.honorarios', $honorarios);
    $TBS->MergeField('pro.objetoContratar', $objetoContratar);
    $TBS->MergeField('pro.honorariosLetras', $honorariosLetras);
    $TBS->MergeField('pro.desplazamiento', $desplazamiento);
    $TBS->MergeField('pro.valorContrato', $valorContrato);
    $TBS->MergeField('pro.contratoLetras', $contratoLetras);
    $TBS->MergeField('pro.obligaciones', $obligaciones);
    $TBS->MergeField('pro.plazo', $plazo);
    $TBS->MergeField('pro.fechafinal', $fechafinal);
    $TBS->MergeField('pro.rol', $rol);
    $TBS->MergeField('pro.numRP', $numRP);
    $TBS->MergeField('pro.fechafinalRP', $fechafinalRP);
    $TBS->MergeField('pro.textofinalCDP', $textofinalCDP);
    $TBS->MergeField('pro.elaboro', $elaboro);
    $TBS->MergeField('pro.periodo', $periodo);
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