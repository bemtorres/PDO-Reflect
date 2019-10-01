<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/Detalle_visitaDAO.php");
	$datos = Detalle_visitaDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_detalle_visita</th>
			<th>Id_labores</th>
			<th>Id_visita</th>
			<th>Estado</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_detalle_visita()?></td>
			<td><?php echo $d->getId_labores()?></td>
			<td><?php echo $d->getId_visita()?></td>
			<td><?php echo $d->getEstado()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewDetalle_visita.php">Volver</a>
