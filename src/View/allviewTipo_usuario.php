<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/Tipo_usuarioDAO.php");
	$datos = Tipo_usuarioDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_tipo_usuario</th>
			<th>Nombre_tipo_u</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_tipo_usuario()?></td>
			<td><?php echo $d->getNombre_tipo_u()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewTipo_usuario.php">Volver</a>
