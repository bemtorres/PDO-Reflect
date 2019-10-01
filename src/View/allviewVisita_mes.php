<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/Visita_mesDAO.php");
	$datos = Visita_mesDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_visita_mes</th>
			<th>Id_mes</th>
			<th>Num_visita</th>
			<th>Id_agenda</th>
			<th>Hora_inicio</th>
			<th>Hora_final</th>
			<th>N_mes</th>
			<th>Anio_actual</th>
			<th>Id_estado_visita</th>
			<th>Id_tecnico_a</th>
			<th>Hora_visita</th>
			<th>Fecha_visita</th>
			<th>Longitud</th>
			<th>Latitud</th>
			<th>Comentario_visita</th>
			<th>Code_vm</th>
			<th>Id_tipo_labor</th>
			<th>Activo</th>
			<th>Monto_tecnico</th>
			<th>Monto_casa</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_visita_mes()?></td>
			<td><?php echo $d->getId_mes()?></td>
			<td><?php echo $d->getNum_visita()?></td>
			<td><?php echo $d->getId_agenda()?></td>
			<td><?php echo $d->getHora_inicio()?></td>
			<td><?php echo $d->getHora_final()?></td>
			<td><?php echo $d->getN_mes()?></td>
			<td><?php echo $d->getAnio_actual()?></td>
			<td><?php echo $d->getId_estado_visita()?></td>
			<td><?php echo $d->getId_tecnico_a()?></td>
			<td><?php echo $d->getHora_visita()?></td>
			<td><?php echo $d->getFecha_visita()?></td>
			<td><?php echo $d->getLongitud()?></td>
			<td><?php echo $d->getLatitud()?></td>
			<td><?php echo $d->getComentario_visita()?></td>
			<td><?php echo $d->getCode_vm()?></td>
			<td><?php echo $d->getId_tipo_labor()?></td>
			<td><?php echo $d->getActivo()?></td>
			<td><?php echo $d->getMonto_tecnico()?></td>
			<td><?php echo $d->getMonto_casa()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewVisita_mes.php">Volver</a>
