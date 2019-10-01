<form action="../Controlador/Ccasa.php" method="post">
	<input type="hidden" hidden value="_token" name="_token">
	<input type="number" name="id_casa" id="id_casa" value="0" placeholder="id_casa"><br>
	<input type="number" name="id_cliente" id="id_cliente" value="0" placeholder="id_cliente"><br>
	<input type="number" name="id_comuna" id="id_comuna" value="0" placeholder="id_comuna"><br>
	<textarea name="direccion" id="direccion" cols="30" rows="10" placeholder="direccion"></textarea><br>
	<textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="descripcion"></textarea><br>
	<textarea name="comentario" id="comentario" cols="30" rows="10" placeholder="comentario"></textarea><br>
	<input type="text" name="telefono" id="telefono" value="" placeholder="telefono" ><br>
	<input type="number" name="activo" id="activo" value="0" placeholder="activo"><br>
	<input type="submit" value="agregar" name="opcion">
	<input type="submit" value="buscar" name="opcion">
	<input type="submit" value="eliminar" name="opcion">
	<input type="submit" value="actualizar" name="opcion">
</form>
	<a href="allviewCasa.php">Ver todos</a>
