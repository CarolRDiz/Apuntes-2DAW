# PHP
## Acceso a base de datos

Desde una página con código escrito en PHP nos podemos conectar a una base de datos y
ejecutar comandos en lenguaje SQL - para hacer consultas, insertar o modificar registros, crear
tablas, dar permisos, etc.

### PDO 
Las principales APIs que PHP ofrece para utilizar MySQL son:
- Mysql (anticuada)
- Mysqli (mejora de MySql)
- PDO

PDO proporciona una capa de abstracción de tal forma que los métodos utilizados para acceder a los datos son independientes del sistema gestor de bases de datos utilizado. En la práctica, permite cambiar de SGBD sin cambiar el código PHP.

#### Código para conectarse a la BD con PDO (ejemplo de clase)
    `<?php

    $servidor="db"; // nombre del contenedor 

    $usuario="user";

    $clave= "pestillo";

    $bd="protectora";

    try {

      // mysql es el gestor de Base de datos

      $conn = new PDO("mysql:host=$servidor;dbname=$bd", $usuario, $clave);

      // Establece los atributos de los reportes de errores

      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      echo "Conexión satisfactoria";

    }

    catch(PDOException $e)

    {

      echo ( "Error de conexión: " . $e->getMessage());

    }

    ?>`

Este es un código para copiar y pegar. Reutilizable.
En este código modificamos los valores de:
- `$servidor`
- `$usuario`
- `$clave`
- `$bd`

. . .

