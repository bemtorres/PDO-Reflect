<form action="../Controlador/Cmovimiento_cliente_historico.php" method="post">
	<input type="hidden" hidden value="_token" name="_token">
	<input type="number" name="id_movimiento_cliente" id="id_movimiento_cliente" value="0" placeholder="id_movimiento_cliente"><br>
	<input type="number" name="id_visita" id="id_visita" value="0" placeholder="id_visita"><br>
	<input type="number" name="id_cliente" id="id_cliente" value="0" placeholder="id_cliente"><br>
	<input type="date"  name="fecha" id="fecha" value=""><br>
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
	<a href="allviewMovimiento_cliente_historico.php">Ver todos</a>
