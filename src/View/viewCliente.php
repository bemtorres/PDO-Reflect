<form action="../Controlador/Ccliente.php" method="post">
	<input type="hidden" hidden value="_token" name="_token">
	<input type="number" name="id_cliente" id="id_cliente" value="0" placeholder="id_cliente"><br>
	<input type="number" name="id_acceso" id="id_acceso" value="0" placeholder="id_acceso"><br>
	<input type="number" name="id_ranking_cliente" id="id_ranking_cliente" value="0" placeholder="id_ranking_cliente"><br>
	<input type="number" name="notificaciones" id="notificaciones" value="0" placeholder="notificaciones"><br>
	<input type="number" name="activo" id="activo" value="0" placeholder="activo"><br>
	<input type="submit" value="agregar" name="opcion">
	<input type="submit" value="buscar" name="opcion">
	<input type="submit" value="eliminar" name="opcion">
	<input type="submit" value="actualizar" name="opcion">
</form>
	<a href="allviewCliente.php">Ver todos</a>
