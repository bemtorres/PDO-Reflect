<form action="../Controlador/Ccorreo_sistema.php" method="post">
	<input type="hidden" hidden value="_token" name="_token">
	<input type="number" name="id_correo" id="id_correo" value="0" placeholder="id_correo"><br>
	<input type="text" name="cuenta_usuario" id="cuenta_usuario" value="" placeholder="cuenta_usuario" ><br>
	<input type="text" name="clave_usuario" id="clave_usuario" value="" placeholder="clave_usuario" ><br>
	<input type="text" name="protocolo" id="protocolo" value="" placeholder="protocolo" ><br>
	<input type="text" name="host" id="host" value="" placeholder="host" ><br>
	<input type="number" name="port" id="port" value="0" placeholder="port"><br>
	<input type="submit" value="agregar" name="opcion">
	<input type="submit" value="buscar" name="opcion">
	<input type="submit" value="eliminar" name="opcion">
	<input type="submit" value="actualizar" name="opcion">
</form>
	<a href="allviewCorreo_sistema.php">Ver todos</a>
