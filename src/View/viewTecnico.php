<form action="../Controlador/Ctecnico.php" method="post">
	<input type="hidden" hidden value="_token" name="_token">
	<input type="number" name="id_tecnico" id="id_tecnico" value="0" placeholder="id_tecnico"><br>
	<input type="number" name="id_acceso" id="id_acceso" value="0" placeholder="id_acceso"><br>
	<input type="text" name="rut" id="rut" value="" placeholder="rut" ><br>
	<input type="text" name="especialidad" id="especialidad" value="" placeholder="especialidad" ><br>
	<input type="number" name="activo" id="activo" value="0" placeholder="activo"><br>
	<input type="submit" value="agregar" name="opcion">
	<input type="submit" value="buscar" name="opcion">
	<input type="submit" value="eliminar" name="opcion">
	<input type="submit" value="actualizar" name="opcion">
</form>
	<a href="allviewTecnico.php">Ver todos</a>
