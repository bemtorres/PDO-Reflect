<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/Tipo_eventoDAO.php");
	$datos = Tipo_eventoDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_tipo_evento</th>
			<th>Nombre_evento</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_tipo_evento()?></td>
			<td><?php echo $d->getNombre_evento()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewTipo_evento.php">Volver</a>
