<form action="../Controlador/Csemana.php" method="post">
	<input type="hidden" hidden value="_token" name="_token">
	<input type="number" name="id_semana" id="id_semana" value="0" placeholder="id_semana"><br>
	<input type="number" name="id_agenda" id="id_agenda" value="0" placeholder="id_agenda"><br>
	<input type="number" name="n_semana" id="n_semana" value="0" placeholder="n_semana"><br>
	<input type="number" name="anio_actual" id="anio_actual" value="0" placeholder="anio_actual"><br>
	<input type="date" name="semana_inicio" id="semana_inicio" value=""><br>
	<input type="date" name="semana_termino" id="semana_termino" value=""><br>
	<input type="text" name="dias_disponible" id="dias_disponible" value="" placeholder="dias_disponible" ><br>
	<input type="text" name="code_s" id="code_s" value="" placeholder="code_s" ><br>
	<input type="number" name="activo" id="activo" value="0" placeholder="activo"><br>
	<input type="submit" value="agregar" name="opcion">
	<input type="submit" value="buscar" name="opcion">
	<input type="submit" value="eliminar" name="opcion">
	<input type="submit" value="actualizar" name="opcion">
</form>
	<a href="allviewSemana.php">Ver todos</a>
