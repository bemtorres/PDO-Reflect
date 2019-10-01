<form action="../Controlador/Cdetalle_visita.php" method="post">
	<input type="hidden" hidden value="_token" name="_token">
	<input type="number" name="id_detalle_visita" id="id_detalle_visita" value="0" placeholder="id_detalle_visita"><br>
	<input type="number" name="id_labores" id="id_labores" value="0" placeholder="id_labores"><br>
	<input type="number" name="id_visita" id="id_visita" value="0" placeholder="id_visita"><br>
	<input type="number" name="estado" id="estado" value="0" placeholder="estado"><br>
	<input type="submit" value="agregar" name="opcion">
	<input type="submit" value="buscar" name="opcion">
	<input type="submit" value="eliminar" name="opcion">
	<input type="submit" value="actualizar" name="opcion">
</form>
	<a href="allviewDetalle_visita.php">Ver todos</a>
