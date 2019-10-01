<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/Correo_sistemaDAO.php");
	$datos = Correo_sistemaDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_correo</th>
			<th>Cuenta_usuario</th>
			<th>Clave_usuario</th>
			<th>Protocolo</th>
			<th>Host</th>
			<th>Port</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_correo()?></td>
			<td><?php echo $d->getCuenta_usuario()?></td>
			<td><?php echo $d->getClave_usuario()?></td>
			<td><?php echo $d->getProtocolo()?></td>
			<td><?php echo $d->getHost()?></td>
			<td><?php echo $d->getPort()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewCorreo_sistema.php">Volver</a>
