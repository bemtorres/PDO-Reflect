<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/Monto_agendaDAO.php");
	$datos = Monto_agendaDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_monto_agenda</th>
			<th>Id_agenda</th>
			<th>Fecha</th>
			<th>Monto_tecnico</th>
			<th>Monto_casa</th>
			<th>Activo</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_monto_agenda()?></td>
			<td><?php echo $d->getId_agenda()?></td>
			<td><?php echo $d->getFecha()?></td>
			<td><?php echo $d->getMonto_tecnico()?></td>
			<td><?php echo $d->getMonto_casa()?></td>
			<td><?php echo $d->getActivo()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewMonto_agenda.php">Volver</a>
