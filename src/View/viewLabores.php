<form action="../Controlador/Clabores.php" method="post">
	<input type="hidden" hidden value="_token" name="_token">
	<input type="number" name="id_labores" id="id_labores" value="0" placeholder="id_labores"><br>
	<input type="text" name="nombre_labor" id="nombre_labor" value="" placeholder="nombre_labor" ><br>
	<input type="number" name="id_tipo_labor" id="id_tipo_labor" value="0" placeholder="id_tipo_labor"><br>
	<input type="number" name="activo" id="activo" value="0" placeholder="activo"><br>
	<input type="submit" value="agregar" name="opcion">
	<input type="submit" value="buscar" name="opcion">
	<input type="submit" value="eliminar" name="opcion">
	<input type="submit" value="actualizar" name="opcion">
</form>
	<a href="allviewLabores.php">Ver todos</a>