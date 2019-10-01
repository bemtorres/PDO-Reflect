<form action="../Controlador/Cacceso.php" method="post">
	<input type="hidden" hidden value="_token" name="_token">
	<input type="number" name="id_acceso" id="id_acceso" value="0" placeholder="id_acceso"><br>
	<input type="text" name="nombres" id="nombres" value="" placeholder="nombres" ><br>
	<input type="text" name="apellidos" id="apellidos" value="" placeholder="apellidos" ><br>
	<input type="text" name="username" id="username" value="" placeholder="username" ><br>
	<input type="text" name="password" id="password" value="" placeholder="password" ><br>
	<input type="text" name="correo" id="correo" value="" placeholder="correo" ><br>
	<textarea name="id_google" id="id_google" cols="30" rows="10" placeholder="id_google"></textarea><br>
	<input type="text" name="telefono" id="telefono" value="" placeholder="telefono" ><br>
	<input type="date"  name="fecha_create" id="fecha_create" value=""><br>
	<input type="date"  name="fecha_update" id="fecha_update" value=""><br>
	<input type="number" name="id_tipo_usuario" id="id_tipo_usuario" value="0" placeholder="id_tipo_usuario"><br>
	<input type="number" name="id_comuna" id="id_comuna" value="0" placeholder="id_comuna"><br>
	<input type="text" name="direccion" id="direccion" value="" placeholder="direccion" ><br>
	<input type="number" name="activo" id="activo" value="0" placeholder="activo"><br>
	<input type="submit" value="agregar" name="opcion">
	<input type="submit" value="buscar" name="opcion">
	<input type="submit" value="eliminar" name="opcion">
	<input type="submit" value="actualizar" name="opcion">
</form>
	<a href="allviewAcceso.php">Ver todos</a>
