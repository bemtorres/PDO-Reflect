<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/SemanaDAO.php");
	$datos = SemanaDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_semana</th>
			<th>Id_agenda</th>
			<th>N_semana</th>
			<th>Anio_actual</th>
			<th>Semana_inicio</th>
			<th>Semana_termino</th>
			<th>Dias_disponible</th>
			<th>Code_s</th>
			<th>Activo</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_semana()?></td>
			<td><?php echo $d->getId_agenda()?></td>
			<td><?php echo $d->getN_semana()?></td>
			<td><?php echo $d->getAnio_actual()?></td>
			<td><?php echo $d->getSemana_inicio()?></td>
			<td><?php echo $d->getSemana_termino()?></td>
			<td><?php echo $d->getDias_disponible()?></td>
			<td><?php echo $d->getCode_s()?></td>
			<td><?php echo $d->getActivo()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewSemana.php">Volver</a>
