<form action="../Controlador/Cbloquear_cliente.php" method="post">
	<input type="hidden" hidden value="_token" name="_token">
	<input type="number" name="id_bloquear_cliente" id="id_bloquear_cliente" value="0" placeholder="id_bloquear_cliente"><br>
	<input type="number" name="id_cliente" id="id_cliente" value="0" placeholder="id_cliente"><br>
	<input type="date"  name="fecha" id="fecha" value=""><br>
	<input type="text" name="motivo" id="motivo" value="" placeholder="motivo" ><br>
	<input type="number" name="activo" id="activo" value="0" placeholder="activo"><br>
	<input type="submit" value="agregar" name="opcion">
	<input type="submit" value="buscar" name="opcion">
	<input type="submit" value="eliminar" name="opcion">
	<input type="submit" value="actualizar" name="opcion">
</form>
	<a href="allviewBloquear_cliente.php">Ver todos</a>
