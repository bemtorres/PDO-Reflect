<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/CasaDAO.php");
	$datos = CasaDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_casa</th>
			<th>Id_cliente</th>
			<th>Id_comuna</th>
			<th>Direccion</th>
			<th>Descripcion</th>
			<th>Comentario</th>
			<th>Telefono</th>
			<th>Activo</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_casa()?></td>
			<td><?php echo $d->getId_cliente()?></td>
			<td><?php echo $d->getId_comuna()?></td>
			<td><?php echo $d->getDireccion()?></td>
			<td><?php echo $d->getDescripcion()?></td>
			<td><?php echo $d->getComentario()?></td>
			<td><?php echo $d->getTelefono()?></td>
			<td><?php echo $d->getActivo()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewCasa.php">Volver</a>
