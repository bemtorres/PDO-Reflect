<form action="../Controlador/Cadministrador.php" method="post">
	<input type="hidden" hidden value="_token" name="_token">
	<input type="number" name="id_administrador" id="id_administrador" value="0" placeholder="id_administrador"><br>
	<input type="number" name="id_acceso" id="id_acceso" value="0" placeholder="id_acceso"><br>
	<input type="text" name="rut" id="rut" value="" placeholder="rut" ><br>
	<input type="number" name="activo" id="activo" value="0" placeholder="activo"><br>
	<input type="submit" value="agregar" name="opcion">
	<input type="submit" value="buscar" name="opcion">
	<input type="submit" value="eliminar" name="opcion">
	<input type="submit" value="actualizar" name="opcion">
</form>
	<a href="allviewAdministrador.php">Ver todos</a>
