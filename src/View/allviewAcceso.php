<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/AccesoDAO.php");
	$datos = AccesoDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_acceso</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Username</th>
			<th>Password</th>
			<th>Correo</th>
			<th>Id_google</th>
			<th>Telefono</th>
			<th>Fecha_create</th>
			<th>Fecha_update</th>
			<th>Id_tipo_usuario</th>
			<th>Id_comuna</th>
			<th>Direccion</th>
			<th>Activo</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_acceso()?></td>
			<td><?php echo $d->getNombres()?></td>
			<td><?php echo $d->getApellidos()?></td>
			<td><?php echo $d->getUsername()?></td>
			<td><?php echo $d->getPassword()?></td>
			<td><?php echo $d->getCorreo()?></td>
			<td><?php echo $d->getId_google()?></td>
			<td><?php echo $d->getTelefono()?></td>
			<td><?php echo $d->getFecha_create()?></td>
			<td><?php echo $d->getFecha_update()?></td>
			<td><?php echo $d->getId_tipo_usuario()?></td>
			<td><?php echo $d->getId_comuna()?></td>
			<td><?php echo $d->getDireccion()?></td>
			<td><?php echo $d->getActivo()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewAcceso.php">Volver</a>
