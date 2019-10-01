<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/Bloquear_clienteDAO.php");
	$datos = Bloquear_clienteDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_bloquear_cliente</th>
			<th>Id_cliente</th>
			<th>Fecha</th>
			<th>Motivo</th>
			<th>Activo</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_bloquear_cliente()?></td>
			<td><?php echo $d->getId_cliente()?></td>
			<td><?php echo $d->getFecha()?></td>
			<td><?php echo $d->getMotivo()?></td>
			<td><?php echo $d->getActivo()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewBloquear_cliente.php">Volver</a>
