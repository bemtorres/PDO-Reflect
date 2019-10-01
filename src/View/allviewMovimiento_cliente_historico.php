<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/Movimiento_cliente_historicoDAO.php");
	$datos = Movimiento_cliente_historicoDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_movimiento_cliente</th>
			<th>Id_visita</th>
			<th>Id_cliente</th>
			<th>Fecha</th>
			<th>Motivo</th>
			<th>Monto</th>
			<th>Monto_expresion</th>
			<th>Tipo_movimiento</th>
			<th>Activo</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_movimiento_cliente()?></td>
			<td><?php echo $d->getId_visita()?></td>
			<td><?php echo $d->getId_cliente()?></td>
			<td><?php echo $d->getFecha()?></td>
			<td><?php echo $d->getMotivo()?></td>
			<td><?php echo $d->getMonto()?></td>
			<td><?php echo $d->getMonto_expresion()?></td>
			<td><?php echo $d->getTipo_movimiento()?></td>
			<td><?php echo $d->getActivo()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewMovimiento_cliente_historico.php">Volver</a>
