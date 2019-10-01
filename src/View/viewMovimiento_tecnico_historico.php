<form action="../Controlador/Cmovimiento_tecnico_historico.php" method="post">
	<input type="hidden" hidden value="_token" name="_token">
	<input type="number" name="id_movimiento_hist" id="id_movimiento_hist" value="0" placeholder="id_movimiento_hist"><br>
	<input type="number" name="id_tecnico" id="id_tecnico" value="0" placeholder="id_tecnico"><br>
	<input type="date" name="fecha" id="fecha" value=""><br>
	<input type="text" name="motivo" id="motivo" value="" placeholder="motivo" ><br>
	<input type="number" name="monto" id="monto" value="0" placeholder="monto"><br>
	<input type="text" name="monto_expresion" id="monto_expresion" value="" placeholder="monto_expresion" ><br>
	<input type="text" name="tipo_movimiento" id="tipo_movimiento" value="" placeholder="tipo_movimiento" ><br>
	<input type="number" name="activo" id="activo" value="0" placeholder="activo"><br>
	<input type="submit" value="agregar" name="opcion">
	<input type="submit" value="buscar" name="opcion">
	<input type="submit" value="eliminar" name="opcion">
	<input type="submit" value="actualizar" name="opcion">
</form>
	<a href="allviewMovimiento_tecnico_historico.php">Ver todos</a>
