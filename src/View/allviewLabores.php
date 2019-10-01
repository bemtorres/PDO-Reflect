<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/LaboresDAO.php");
	$datos = LaboresDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_labores</th>
			<th>Nombre_labor</th>
			<th>Id_tipo_labor</th>
			<th>Activo</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_labores()?></td>
			<td><?php echo $d->getNombre_labor()?></td>
			<td><?php echo $d->getId_tipo_labor()?></td>
			<td><?php echo $d->getActivo()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewLabores.php">Volver</a>
