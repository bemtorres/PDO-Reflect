<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/ComunaDAO.php");
	$datos = ComunaDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_comuna</th>
			<th>Nombre_comuna</th>
			<th>Id_region</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_comuna()?></td>
			<td><?php echo $d->getNombre_comuna()?></td>
			<td><?php echo $d->getId_region()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewComuna.php">Volver</a>
