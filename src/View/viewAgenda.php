<form action="../Controlador/Cagenda.php" method="post">
	<input type="hidden" hidden value="_token" name="_token">
	<input type="number" name="id_agenda" id="id_agenda" value="0" placeholder="id_agenda"><br>
	<input type="number" name="id_casa" id="id_casa" value="0" placeholder="id_casa"><br>
	<input type="date"  name="fecha_creacion" id="fecha_creacion" value=""><br>
	<input type="date" name="fecha_inicio" id="fecha_inicio" value=""><br>
	<input type="date" name="fecha_termino" id="fecha_termino" value=""><br>
	<input type="number" name="semana_inicio" id="semana_inicio" value="0" placeholder="semana_inicio"><br>
	<input type="number" name="anio_inicio" id="anio_inicio" value="0" placeholder="anio_inicio"><br>
	<input type="number" name="semana_termino" id="semana_termino" value="0" placeholder="semana_termino"><br>
	<input type="number" name="anio_termino" id="anio_termino" value="0" placeholder="anio_termino"><br>
	<input type="time" name="hora_inicio" id="hora_inicio" value=""><br>
	<input type="time" name="hora_final" id="hora_final" value=""><br>
	<input type="text" name="dias_disponible" id="dias_disponible" value="" placeholder="dias_disponible" ><br>
	<input type="number" name="cant_visita_semana" id="cant_visita_semana" value="0" placeholder="cant_visita_semana"><br>
	<input type="number" name="cant_visita_mes" id="cant_visita_mes" value="0" placeholder="cant_visita_mes"><br>
	<input type="number" name="id_tipo_evento" id="id_tipo_evento" value="0" placeholder="id_tipo_evento"><br>
	<input type="number" name="id_tecnico" id="id_tecnico" value="0" placeholder="id_tecnico"><br>
	<input type="text" name="code" id="code" value="" placeholder="code" ><br>
	<textarea name="comentario" id="comentario" cols="30" rows="10" placeholder="comentario"></textarea><br>
	<input type="number" name="id_tipo_labor" id="id_tipo_labor" value="0" placeholder="id_tipo_labor"><br>
	<input type="number" name="activo" id="activo" value="0" placeholder="activo"><br>
	<input type="submit" value="agregar" name="opcion">
	<input type="submit" value="buscar" name="opcion">
	<input type="submit" value="eliminar" name="opcion">
	<input type="submit" value="actualizar" name="opcion">
</form>
	<a href="allviewAgenda.php">Ver todos</a>
