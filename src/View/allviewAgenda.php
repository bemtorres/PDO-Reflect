<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/AgendaDAO.php");
	$datos = AgendaDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_agenda</th>
			<th>Id_casa</th>
			<th>Fecha_creacion</th>
			<th>Fecha_inicio</th>
			<th>Fecha_termino</th>
			<th>Semana_inicio</th>
			<th>Anio_inicio</th>
			<th>Semana_termino</th>
			<th>Anio_termino</th>
			<th>Hora_inicio</th>
			<th>Hora_final</th>
			<th>Dias_disponible</th>
			<th>Cant_visita_semana</th>
			<th>Cant_visita_mes</th>
			<th>Id_tipo_evento</th>
			<th>Id_tecnico</th>
			<th>Code</th>
			<th>Comentario</th>
			<th>Id_tipo_labor</th>
			<th>Activo</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_agenda()?></td>
			<td><?php echo $d->getId_casa()?></td>
			<td><?php echo $d->getFecha_creacion()?></td>
			<td><?php echo $d->getFecha_inicio()?></td>
			<td><?php echo $d->getFecha_termino()?></td>
			<td><?php echo $d->getSemana_inicio()?></td>
			<td><?php echo $d->getAnio_inicio()?></td>
			<td><?php echo $d->getSemana_termino()?></td>
			<td><?php echo $d->getAnio_termino()?></td>
			<td><?php echo $d->getHora_inicio()?></td>
			<td><?php echo $d->getHora_final()?></td>
			<td><?php echo $d->getDias_disponible()?></td>
			<td><?php echo $d->getCant_visita_semana()?></td>
			<td><?php echo $d->getCant_visita_mes()?></td>
			<td><?php echo $d->getId_tipo_evento()?></td>
			<td><?php echo $d->getId_tecnico()?></td>
			<td><?php echo $d->getCode()?></td>
			<td><?php echo $d->getComentario()?></td>
			<td><?php echo $d->getId_tipo_labor()?></td>
			<td><?php echo $d->getActivo()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewAgenda.php">Volver</a>
