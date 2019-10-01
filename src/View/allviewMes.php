<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/MesDAO.php");
	$datos = MesDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_mes</th>
			<th>Id_agenda</th>
			<th>Cant_visitas</th>
			<th>N_mes</th>
			<th>Anio_actual</th>
			<th>Dias_disponible</th>
			<th>Code_m</th>
			<th>Activo</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_mes()?></td>
			<td><?php echo $d->getId_agenda()?></td>
			<td><?php echo $d->getCant_visitas()?></td>
			<td><?php echo $d->getN_mes()?></td>
			<td><?php echo $d->getAnio_actual()?></td>
			<td><?php echo $d->getDias_disponible()?></td>
			<td><?php echo $d->getCode_m()?></td>
			<td><?php echo $d->getActivo()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewMes.php">Volver</a>
