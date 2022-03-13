# Crea una estructura MVC con solo agregar la base de datos MYSQL

*PDO-Reflect*

## Instrucciones

En el archivo .env agregar las credenciales

```
APP_NAME=

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

## Estructura

Correr en el navegador el index.php, se creará un reflejo de la base de datos y Listo


| Estructura | Descripción |
| -- | -- |
| Modelo | Crea modelos en php a partir de la base de datos |
| DAO | Crea el CRUD de cada tabla |
| DB | Conexion interna a la base de datos |
| View | Crea una pequeña estructura en HTML y una tabla para ver los datos |
