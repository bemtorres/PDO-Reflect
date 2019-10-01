<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/RegionDAO.php");
	$datos = RegionDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_region</th>
			<th>Nombre_region</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_region()?></td>
			<td><?php echo $d->getNombre_region()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewRegion.php">Volver</a>
