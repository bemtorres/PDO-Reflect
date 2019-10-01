<form action="../Controlador/Ccambio_tecnico.php" method="post">
	<input type="hidden" hidden value="_token" name="_token">
	<input type="number" name="id_cambio_tecnico" id="id_cambio_tecnico" value="0" placeholder="id_cambio_tecnico"><br>
	<textarea name="motivo" id="motivo" cols="30" rows="10" placeholder="motivo"></textarea><br>
	<input type="date"  name="fecha" id="fecha" value=""><br>
	<input type="number" name="id_visita" id="id_visita" value="0" placeholder="id_visita"><br>
	<input type="number" name="id_tecnico_anterior" id="id_tecnico_anterior" value="0" placeholder="id_tecnico_anterior"><br>
	<input type="number" name="id_tecnico_nuevo" id="id_tecnico_nuevo" value="0" placeholder="id_tecnico_nuevo"><br>
	<input type="number" name="global" id="global" value="0" placeholder="global"><br>
	<input type="submit" value="agregar" name="opcion">
	<input type="submit" value="buscar" name="opcion">
	<input type="submit" value="eliminar" name="opcion">
	<input type="submit" value="actualizar" name="opcion">
</form>
	<a href="allviewCambio_tecnico.php">Ver todos</a>
