<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/Cambio_tecnicoDAO.php");
	$datos = Cambio_tecnicoDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_cambio_tecnico</th>
			<th>Motivo</th>
			<th>Fecha</th>
			<th>Id_visita</th>
			<th>Id_tecnico_anterior</th>
			<th>Id_tecnico_nuevo</th>
			<th>Global</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_cambio_tecnico()?></td>
			<td><?php echo $d->getMotivo()?></td>
			<td><?php echo $d->getFecha()?></td>
			<td><?php echo $d->getId_visita()?></td>
			<td><?php echo $d->getId_tecnico_anterior()?></td>
			<td><?php echo $d->getId_tecnico_nuevo()?></td>
			<td><?php echo $d->getGlobal()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewCambio_tecnico.php">Volver</a>
