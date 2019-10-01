<form action="../Controlador/Csupervisor.php" method="post">
	<input type="hidden" hidden value="_token" name="_token">
	<input type="number" name="id_supervisor" id="id_supervisor" value="0" placeholder="id_supervisor"><br>
	<input type="number" name="id_acceso" id="id_acceso" value="0" placeholder="id_acceso"><br>
	<input type="text" name="rut" id="rut" value="" placeholder="rut" ><br>
	<input type="number" name="activo" id="activo" value="0" placeholder="activo"><br>
	<input type="submit" value="agregar" name="opcion">
	<input type="submit" value="buscar" name="opcion">
	<input type="submit" value="eliminar" name="opcion">
	<input type="submit" value="actualizar" name="opcion">
</form>
	<a href="allviewSupervisor.php">Ver todos</a>
