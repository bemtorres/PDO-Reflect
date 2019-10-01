<form action="../Controlador/Cmonto_agenda.php" method="post">
	<input type="hidden" hidden value="_token" name="_token">
	<input type="number" name="id_monto_agenda" id="id_monto_agenda" value="0" placeholder="id_monto_agenda"><br>
	<input type="number" name="id_agenda" id="id_agenda" value="0" placeholder="id_agenda"><br>
	<input type="date"  name="fecha" id="fecha" value=""><br>
	<input type="number" name="monto_tecnico" id="monto_tecnico" value="0" placeholder="monto_tecnico"><br>
	<input type="number" name="monto_casa" id="monto_casa" value="0" placeholder="monto_casa"><br>
	<input type="number" name="activo" id="activo" value="0" placeholder="activo"><br>
	<input type="submit" value="agregar" name="opcion">
	<input type="submit" value="buscar" name="opcion">
	<input type="submit" value="eliminar" name="opcion">
	<input type="submit" value="actualizar" name="opcion">
</form>
	<a href="allviewMonto_agenda.php">Ver todos</a>
