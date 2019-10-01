<form action="../Controlador/Cmes.php" method="post">
	<input type="hidden" hidden value="_token" name="_token">
	<input type="number" name="id_mes" id="id_mes" value="0" placeholder="id_mes"><br>
	<input type="number" name="id_agenda" id="id_agenda" value="0" placeholder="id_agenda"><br>
	<input type="number" name="cant_visitas" id="cant_visitas" value="0" placeholder="cant_visitas"><br>
	<input type="number" name="n_mes" id="n_mes" value="0" placeholder="n_mes"><br>
	<input type="number" name="anio_actual" id="anio_actual" value="0" placeholder="anio_actual"><br>
	<input type="text" name="dias_disponible" id="dias_disponible" value="" placeholder="dias_disponible" ><br>
	<input type="text" name="code_m" id="code_m" value="" placeholder="code_m" ><br>
	<input type="number" name="activo" id="activo" value="0" placeholder="activo"><br>
	<input type="submit" value="agregar" name="opcion">
	<input type="submit" value="buscar" name="opcion">
	<input type="submit" value="eliminar" name="opcion">
	<input type="submit" value="actualizar" name="opcion">
</form>
	<a href="allviewMes.php">Ver todos</a>
