# JSON

json_decode()

# API
Advanced Programming Interface, Interfaz de programación de aplicaciones.

    Conjunto de definiciones y protocolos que se utiliza para desarrollar e integrar el software de las aplicaciones, 
    permitiendo la comunicación entre dos aplicaciones de software a través de un conjunto de reglas.


## Librería curl

curl_init()
curl_setopt()
curl_exec()

# PHP

## modificarusuario.php

```php
<?php
require("conecta.php");

if(isset($_POST['nombre'])) {
    // recupera los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $foto = $_FILES["foto"]["name"];

    // asocia valores a esos nombres
    $datos = array("id" => $id,
                   "nombre" => $nombre,
                   "edad" => $edad,
                   "foto" => $foto
                  );

    // Comprueba que se ha subido una foto
    if($foto != "") {
        // copia el archivo temporal en fotos con su nombre original
        file_put_contents("fotos/$foto", file_get_contents($_FILES["foto"]["tmp_name"]));

        // prepara la sentencia SQL. Le doy un nombre a cada dato del formulario 
        $sql = "UPDATE usuario set nombre=:nombre, edad=:edad, foto=:foto WHERE id=:id";
    } else {
        // prepara la sentencia SQL. Le doy un nombre a cada dato del formulario 
        $sql = "UPDATE usuario set nombre=:nombre, edad=:edad WHERE id=:id";
        unset($datos["foto"]);
    }

    // comprueba que la sentencia SQL preparada está bien 
    $stmt = $conn->prepare($sql);
    // ejecuta la sentencia usando los valores
    if($stmt->execute($datos) != 1) {
        print("No se pudo actualizar usuario");
        exit(0);
    }
    
    header("Location: index.php");
    exit(0);
}

if(!isset($_GET["id"])) {
    print("Sin id no hay nada que hacer");
    exit(0);
}

// prepara la sentencia SQL. Le doy un nombre a cada dato del formulario 
$sql = "SELECT * FROM usuario WHERE id=:id";
// asocia valores a esos nombres
$datos = array("id" => $_GET['id']);
// comprueba que la sentencia SQL preparada está bien 
$stmt = $conn->prepare($sql);
$stmt->execute($datos);
$usuario = $stmt->fetch();
if(!$usuario) {
    print("Lo siento, pero no hay usuario con ese id");
    exit(0);
}
?>
```
```html

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="id" hidden value="<?php echo $_GET["id"]; ?>">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre" value="<?php echo $usuario["nombre"]; ?>">
    <label for="edad">Edad: </label>
    <input type="text" name="edad" id="edad" value="<?php echo $usuario["edad"]; ?>">
    <label for="foto">Foto: </label>
    <!-- Subida múltiple de archivos
    <input type="file" name="fotos[]" id="foto" multiple>
    -->
    <img width="50" src="fotos/<?php echo $usuario["foto"];?>">
    <input type="file" name="foto" id="foto">
    <input type="submit" value="Enviar">
</form>    
</body>
</html>

```

1. El formulario.

El código html contiene el formulario.

El método de petición HTTP utilizado es POST:

\<form action="" `method="post"` enctype="multipart/form-data">

2. Recuperar datos del formulario. $_POST:

Cuando un usuario pulsa el botón enviar de un formulario, la información que contenían sus campos es enviada a una dirección URL desde donde tendremos que recuperarla para tratarla de alguna manera. Por ejemplo, si realiza una compra, tendremos que recuperar los datos para completar el proceso de pago. La información del formulario “viaja” almacenada en variables que podremos recuperar y utilizar mediante PHP. Con el método POST, la forma de recuperación consiste en usar $_POST. $_POST es un array asociativo de variables pasadas al script actual a través del método POST de HTTP.

La dirección URL a la que se envían los datos es al propio https://modificarusuario.php, porque `action=""` no tiene ningún valor:

\<form `action=""` method="post" enctype="multipart/form-data"> 

3. Qué contendrá $_POST

$_POST = [
    "id" => <valor_obtenido_de_$_GET>,
    "nombre" => <valor_introducido_por_el_usuario>,
    "edad" => <valor_introducido_por_el_usuario>
];

Las claves de este array asociativo (`"id"`, `"nombre"` y `"edad"`) corresponden al valor de cada `name` de los `input` del formulario:

<input type="text" `name="id"` hidden value="<?php echo $_GET["id"]; ?>">


## DEBUG


## GET

### Enlaces:
![GET y la diferencia de GET y POST](https://www.ionos.es/digitalguide/paginas-web/desarrollo-web/get-vs-post/)

### $_GET

Un array asociativo de variables pasado al script actual vía parámetros URL (también conocida como cadena de consulta). 

#### Ejemplos:

1º Ejemplo.

En index.php:

    $user["id"] = 3;
    <a href='modificausuario.php?id=".$user["id"]."'><i class='fa-solid fa-pen-to-square'></i></a>");

Si accedemos a ese enlace, en la página modificarusuario.php, la variable $_GET contendrá:

    $_GET = [
        id => 3
    ]
Para acceder a esta id guardada, usamos:

    $_GET["id"];
    
    
    
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

