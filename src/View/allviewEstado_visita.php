<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/Estado_visitaDAO.php");
	$datos = Estado_visitaDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_estado_visita</th>
			<th>Nombre_estado_v</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_estado_visita()?></td>
			<td><?php echo $d->getNombre_estado_v()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewEstado_visita.php">Volver</a>
