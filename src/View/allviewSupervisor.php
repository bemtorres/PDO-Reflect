<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/SupervisorDAO.php");
	$datos = SupervisorDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_supervisor</th>
			<th>Id_acceso</th>
			<th>Rut</th>
			<th>Activo</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_supervisor()?></td>
			<td><?php echo $d->getId_acceso()?></td>
			<td><?php echo $d->getRut()?></td>
			<td><?php echo $d->getActivo()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewSupervisor.php">Volver</a>
