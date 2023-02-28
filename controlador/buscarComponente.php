<?php
session_start(); 
include_once 'conexion.php';

  $con=new Conexion();
  $con=$con->conectar();
    if($con){  
      $query="SELECT a.entidadConvenio, b.dependencia, c.rolDep, c.cantidadPersonas, c.rolcomponente_id FROM tblcontratos a INNER JOIN tblcomponentes b ON b.numContrato = a.numContrato INNER JOIN tblrolcomponente c ON c.componente_id = b.componente_id";  
      $consulta=$con->prepare($query);
      $consulta->execute();  
      $tabla = "";
      
      if(isset($_POST['datos']))
{
	
	$query="SELECT a.entidadConvenio, b.dependencia, c.rolDep, c.cantidadPersonas, c.rolcomponente_id FROM tblcontratos a INNER JOIN tblcomponentes b ON b.numContrato = a.numContrato INNER JOIN tblrolcomponente c ON c.componente_id = b.componente_id WHERE 
		a.nombreContrato LIKE '%".$_POST['datos']."%' OR
		b.dependencia LIKE '%".$_POST['datos']."%' OR
		c.rolDep LIKE '%".$_POST['datos']."%'";
}

$buscar=$con->query($query);

	$tabla.= 
	'<table id="example2" class="table table-striped table-bordered" style="width:100%">
  <thead>
  <tr>
  	<th>Entidad Contratante</th>
    <th>Componente</th>
    <th>Rol</th>
    <th>Cantidad de personas</th>
    <th>Actualizar</th>
  </tr>
</thead>
<tbody>';

	while($fila=$buscar->fetch(PDO::FETCH_ASSOC))
	{
		$tabla.=
		'<tr>
				<td>'.$fila['entidadConvenio'].'</td>
        <td>'.$fila['dependencia'].'</td>
        <td>'.$fila['rolDep'].'</td>
        <td>'.$fila['cantidadPersonas'].'</td> 
        <td><a class="btn btn-primary" href="actualizarRolComponentes.php?rolcomponente_id='.$fila['rolcomponente_id'].'" id="actualizar"><i class="far fa-edit"></a></i></td>
		 </tr>
     </tbody>
		';
	}

	$tabla.='</table>';



echo $tabla;
} 
     
?> 
	