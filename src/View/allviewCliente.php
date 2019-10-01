<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/ClienteDAO.php");
	$datos = ClienteDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_cliente</th>
			<th>Id_acceso</th>
			<th>Id_ranking_cliente</th>
			<th>Notificaciones</th>
			<th>Activo</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_cliente()?></td>
			<td><?php echo $d->getId_acceso()?></td>
			<td><?php echo $d->getId_ranking_cliente()?></td>
			<td><?php echo $d->getNotificaciones()?></td>
			<td><?php echo $d->getActivo()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewCliente.php">Volver</a>
