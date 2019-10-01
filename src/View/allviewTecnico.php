<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/TecnicoDAO.php");
	$datos = TecnicoDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_tecnico</th>
			<th>Id_acceso</th>
			<th>Rut</th>
			<th>Especialidad</th>
			<th>Activo</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_tecnico()?></td>
			<td><?php echo $d->getId_acceso()?></td>
			<td><?php echo $d->getRut()?></td>
			<td><?php echo $d->getEspecialidad()?></td>
			<td><?php echo $d->getActivo()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewTecnico.php">Volver</a>
