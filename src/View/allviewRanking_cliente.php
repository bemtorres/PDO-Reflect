<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
	require_once ($rootDir . "/DAO/Ranking_clienteDAO.php");
	$datos = Ranking_clienteDAO::buscarAll();
?>
<form action="" method="post">
<table BORDER='1'>
	<thead>
		<tr>
			<th>Id_ranking_cliente</th>
			<th>Nombre_ranking</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $d){?>
		<tr>
			<td><?php echo $d->getId_ranking_cliente()?></td>
			<td><?php echo $d->getNombre_ranking()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
	<a href="viewRanking_cliente.php">Volver</a>
