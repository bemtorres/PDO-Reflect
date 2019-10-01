<form action="../Controlador/Cvisita_mes.php" method="post">
	<input type="hidden" hidden value="_token" name="_token">
	<input type="number" name="id_visita_mes" id="id_visita_mes" value="0" placeholder="id_visita_mes"><br>
	<input type="number" name="id_mes" id="id_mes" value="0" placeholder="id_mes"><br>
	<input type="number" name="num_visita" id="num_visita" value="0" placeholder="num_visita"><br>
	<input type="number" name="id_agenda" id="id_agenda" value="0" placeholder="id_agenda"><br>
	<input type="time" name="hora_inicio" id="hora_inicio" value=""><br>
	<input type="time" name="hora_final" id="hora_final" value=""><br>
	<input type="number" name="n_mes" id="n_mes" value="0" placeholder="n_mes"><br>
	<input type="number" name="anio_actual" id="anio_actual" value="0" placeholder="anio_actual"><br>
	<input type="number" name="id_estado_visita" id="id_estado_visita" value="0" placeholder="id_estado_visita"><br>
	<input type="number" name="id_tecnico_a" id="id_tecnico_a" value="0" placeholder="id_tecnico_a"><br>
	<input type="time" name="hora_visita" id="hora_visita" value=""><br>
	<input type="date" name="fecha_visita" id="fecha_visita" value=""><br>
	<input type="text" name="longitud" id="longitud" value="" placeholder="longitud" ><br>
	<input type="text" name="latitud" id="latitud" value="" placeholder="latitud" ><br>
	<textarea name="comentario_visita" id="comentario_visita" cols="30" rows="10" placeholder="comentario_visita"></textarea><br>
	<input type="text" name="code_vm" id="code_vm" value="" placeholder="code_vm" ><br>
	<input type="number" name="id_tipo_labor" id="id_tipo_labor" value="0" placeholder="id_tipo_labor"><br>
	<input type="number" name="activo" id="activo" value="0" placeholder="activo"><br>
	<input type="number" name="monto_tecnico" id="monto_tecnico" value="0" placeholder="monto_tecnico"><br>
	<input type="number" name="monto_casa" id="monto_casa" value="0" placeholder="monto_casa"><br>
	<input type="submit" value="agregar" name="opcion">
	<input type="submit" value="buscar" name="opcion">
	<input type="submit" value="eliminar" name="opcion">
	<input type="submit" value="actualizar" name="opcion">
</form>
	<a href="allviewVisita_mes.php">Ver todos</a>
