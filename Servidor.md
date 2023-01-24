# INDICE

[TOCM]

[TOC]

- [Laravel](#laravel)
- [PHP](#php)
- [Java](#java)
- [Spring Boot](#spring-boot)

# linux: Matar proceso en un puerto específico

    sudo netstat -tupln
    sudo kill -15 PID

# Parar todos los contenedores

    docker stop $(docker ps -a -q)
    
Database Testing
sqlite
Available Assertions: assertDatabaseCount..
Spring..

# Spring Boot

Spring Initializr si no tienes Intellij Ultimate:

[Guía](https://spring.io/quickstart)

models || repository (guarda en bd) ||service (entre repo y controlador)

dto -> transforma el json del modelo

Cada modelo tiene un controlador y un repositorio

1. Crear proyecto

[Tutorial](https://www.baeldung.com/building-a-restful-web-service-with-spring-and-java-based-configuration)

- SpringBoot:3.0.1
- Language: Java
- Type: Maven
- Grupo: xxx.rdc.es -> es.rdc.xxx  (es.iesrafaelalberti)
- Packaging: Jar
- Dependences: Lombok, Spring Web, Spring Security, Spring Data JPA, H2 Database 

SpringFirstImpressionsApplication.java

REST with Spring Boot

2. Crear paquetes: new Package

-> Crear package controllers

-> Crear package segurity

Clase SecurityConfiguration: buscar Configuring WebSecurity (para ignorar la seguridad)

    return (web) -> web.ignoring().anyRequest()

-> Crear package models
-> Crear package reposities

3. Crear archivos Java Class.
4. Crear tests con Insomnia mientras se desarrolla el proyecto.
        
## Controlador

Un controlador por entidad

PrisonerController.java:
```java
package ...
import org.springframework.web.bind.annotation.* //Importar todas las anotaciones

@RestController // Indicar que es un controlador // Anotación // @Controller
public class PrisonerController {

    @Autowired
    PrisonerRepository prisonerRepository;

    @GetMapping("/")
    ResponseEntity<Object> index(){ //ResponseEntity da una respuesta HTTP
        prisonerRepository.save(myPrisoner);
        return new ResponseEntity<>(myPrisoner, HttpStatus.OK); 
    }
```      
            
- [ResponseEntity](https://www.baeldung.com/spring-response-entity)

## Modelo

Clase Prisoner:
```java
@Entity //Indicar que es una entidad
@Setter //Crea los setters automaticamente de los atributos privados
@Getter
public class Prisoner{

//Atributos
@Id
@GeneratedValue
privete Long id;

private String name;
private Integer age;
@NotNull
private Integer yearsLeft;

// Constructor por defecto
// Constructor sin id
public Prisoner(String name, Integer age, Integer yearsLeft){
    this.name= name;
    this.age...
}
//Alt+nsertar Constructor  con los atributos
```
## Repositorio
```java
public interface PrisonerRepository 
```

# Java

# Laravel

[Crear proyecto](https://www.youtube.com/watch?v=8vODYn4xFOw)

Para abrir el servidor desde el navegador con localhost:
    
    php artisan serve
    
Al abrir el servidor podemos ir al archivo que queramos:

    http://localhost:8000/login

Comando necesario para los demás:

    ./vendor/bin/sail up
    
    ./vendor/bin/sail artisan migrate
    
    ./vendor/bin/sail 
    
    ./vendor/bin/sail artisan migrate:fresh --seed
    
    artisan route:list
    
    artisan storage:link

## Rutas

    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });

`'/'` -> el archivo indicado en la URL. Ejemplos: '/inicio' , '/listado'
`view('welcome')` -> view muestra el archivo 'welcome', cuya ruta es resources/views/welcome.blade.php
`.blade.php` -> tipo de archivo

### use

    use App\Http\Controllers\Auth\AuthenticatedSessionController;
    use App\Http\Controllers\Auth\ConfirmablePasswordController;

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

### Middleware

Mecanismo para inspeccionar y filtrar peticiones HTTP
Por ejemplo, puede verificar que el usuario esté autentificado. Si no lo está, middleware lo redirijirá a la página de login.

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');


## Vistas

El nombre del archivo termina en `.blade.php`. Las vistas son archivos Blade template, que contienen tanto html como Blade directives.

Variables php:

`{{$variable}}`

`resources/views`

<!-- View stored in resources/views/greeting.blade.php -->
 
    //perfil.blade.php
    
    <html>
        <body>
            <h1>Hello, {{ $name }}</h1>
        </body>
    </html>

La vista puede devolverse así en una ruta. También pueden devolverse en controladores.

    Route::get('/', function () {
    return view('greeting', ['name' => 'James']);
    });
    
Primer argumento de view(): `nombre del archivo`

Segundo argumento de view(): array válido para la vista, contiene las variables y valores asignados.

Si el archivo está en una carpeta dentro de views:

return view('nombreCarpeta.archivo', ... );

## Controladores

Controlador básico:

    <?php

    namespace App\Http\Controllers;

    use App\Models\User;

    class UserController extends Controller
    {
        /**
         * Show the profile for a given user.
         *
         * @param  int  $id
         * @return \Illuminate\View\View
         */
        public function show($id)
        {
            return view('user.profile', [
                'user' => User::findOrFail($id)
            ]);
        }
    }

`show($id)` es un método `userController`

Se puede definir la siguiente **ruta** al método del controlador:

    use App\Http\Controllers\UserController;

    Route::get('/user/{id}', [UserController::class, 'show']);

## File Storage

[Documentación](https://laravel.com/docs/9.x/filesystem#main-content)

### El disco público

Para archivos de accesibilidad pública.

    Storage::disk('public')->put(...);
    
## Cliente HTTP

### Hacer peticiones

    head, get, post, put, patch, and delete
    
#### get

Se realiza una petición get a una URL:

    use Illuminate\Support\Facades\Http;

    $response = Http::get('http://example.com');
   
El método get devuelve una instancia de Illuminate\Http\Client\Response, que provee una variedad de métodos para inspeccionar la rspuesta:

    $response->body() : string;
    $response->json($key = null) : array|mixed;
    $response->object() : object;
    $response->collect($key = null) : Illuminate\Support\Collection;
    $response->status() : int;
    $response->ok() : bool;
    $response->successful() : bool;
    $response->redirect(): bool;
    $response->failed() : bool;
    $response->serverError() : bool;
    $response->clientError() : bool;
    $response->header($header) : string;
    $response->headers() : array;

Se puede acceder directamente a los datos de la respuesta JSON de este modo:

    return Http::get('http://example.com/users/1')['name'];
    

## Factorias

    use App\Models\User;

    $user = User::factory()->make();

    factory()->make();
    factory()->create();
    factory()->count();
    factory()->suspended();
    factory()->state();
    factory()->for()->create();
    AlgunModelo::factory()->has(OtroModelo::factory()->count(3),'nombre_relacion')->create();

### Fake

Las factorías tienen acceso a la librería PHP Faker, que permite generar varios tipos de datos aleatorios para testear y generar semillas.

[Documentación Faker](https://fakerphp.github.io/)

### Relaciones de hasMany

Primero, supongamos que nuestra aplicación tiene un modelo App\Models\User y un modelo App\Models\Post. Además, supongamos que el modelo User define 
una relación hasMany con Post. Podemos crear un usuario que tenga tres instancias utilizando el método `has` proporcionado por las factorias de Laravel. 
El método `has` acepta una instancia de fábrica:

    use App\Models\Post;
    use App\Models\User;

    $user = User::$user = User::factory()
            ->has(Post::factory()->count(3))
            ->create();

Al pasar un modelo Post al método has, Laravel asumirá que el modelo User debe tener un método posts que defina la relación. Si es necesario, puede especificar explícitamente el nombre de la relación que le gustaría manipular:

    $user = User::factory()
                ->has(Post::factory()->count(3), 'posts')
                ->create();

### Relaciones de pertenencia

    factory()->for()->create();
    
El método for se puede utilizar para definir el modelo principal al que pertenecen los modelos creados con factory.

Por ejemplo, podemos crear tres instancias del modelo App\Models\Post que pertenezcan a un solo usuario:

    use App\Models\Post;
    use App\Models\User;

    $posts = Post::factory()
                ->count(3)
                ->for(User::factory()->state([
                    'name' => 'Jessica Archer',
                ]))
                ->create();
                
Si ya tiene una instancia de modelo principal que debe asociarse con los modelos que está creando, puede pasar la instancia de modelo al método for:

    $user = User::factory()->create();

    $posts = Post::factory()
                ->count(3)
                ->for($user)
                ->create();

### Create

El método de creación crea instancias de modelos y las persiste en la base de datos utilizando el método de guardado de Eloquent:

    use App\Models\User;

    // Create a single App\Models\User instance...
    $user = User::factory()->create();

    // Create three App\Models\User instances...
    $users = User::factory()->count(3)->create();

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

Algo importante a tener en cuenta sobre este formulario, es que este se mostrará solo si el usuario ha iniciado sesión. Eso se debe a este código php que aparece antes del formulario:

```php
if(!isset($_GET["id"])) {
    print("Sin id no hay nada que hacer");
    exit(0);
}
```
    if(!isset($_GET["id"]))
Significa que esta condición se cumple si la variable el valor de la clave `"id"` está vacío en el array asociativo de  `$_GET`. NO hay id.

    exit(0)
exit(0) finaliza el programa

`Así que si no hay id el programa finaliza.`


El método de petición HTTP utilizado es POST:

\<form action="" `method="post"` enctype="multipart/form-data">

2. Recuperar datos del formulario. $_POST:

Cuando un usuario pulsa el botón enviar de un formulario, la información que contenían sus campos es enviada a una dirección URL desde donde tendremos que recuperarla para tratarla de alguna manera. Por ejemplo, si realiza una compra, tendremos que recuperar los datos para completar el proceso de pago. La información del formulario “viaja” almacenada en variables que podremos recuperar y utilizar mediante PHP. Con el método POST, la forma de recuperación consiste en usar $_POST. $_POST es un array asociativo de variables pasadas al script actual a través del método POST de HTTP.

La dirección URL a la que se envían los datos es al propio https://modificarusuario.php, porque `action=""` no tiene ningún valor:

\<form `action=""` method="post" enctype="multipart/form-data"> 

3. Qué contendrá $_POST

$_POST = [
    "id" => <valor_introducido>,
    "nombre" => <valor_introducido>,
    "edad" => <valor_introducido>
];

Las claves de este array asociativo (`"id"`, `"nombre"` y `"edad"`) corresponden al valor de cada `name` de los `input` del formulario:

<input type="text" `name="id"` ...>
<input type="text" `name="nombre"` ...>
<input type="text" `name="edad"`...>

En el formulario, existe un valor predeterminado para cada input:

<input type="text" name="id" `hidden value="<?php echo $_GET["id"]; ?>"`>
<input type="text" name="nombre" id="nombre" `value="<?php echo $usuario["nombre"]; ?>"`>
<input type="text" name="edad" id="edad" `value="<?php echo $usuario["edad"]; ?>"`>

`<?php echo ___ ?>` Sirve para insertar lo que queremos en el código html desde php.

**Input id**
`hidden value` implica que el id no pueda ser cambiado, porque este campo no será visible para el usuario, de este modo no podrá cambiar su valor predeterminado.

`$_GET["id"]` Este formulario solo se muestra si el usuario ha iniciado sesión, por lo tanto, al haber iniciado sesión,
el array asociativo de $_GET contiene el valor de la ID. Teniendo en cuenta que el método GET envía los datos a través de la URL, la URL de esta página en la que se encuentra el usuario será `https://modificarusuario?id=<valor>`. El valor de la id está en la URL, y para obtenerlo usamos `$_GET["id"]`. La clave se pone entre corchetes `["id"]`, precedida del array asociativo en el que se encuentra, `$_GET`.

**Input nombre (lo mismo para el input edad)**

`$usuario["nombre"]` Ya tenemos guardado el nombre del usuario que queremos modificar en la variable `$usuario`. Esto se debe al código php anterior: 

```php
$sql = "SELECT * FROM usuario WHERE id=:id";
$datos = array("id" => $_GET['id']);
$stmt = $conn->prepare($sql);
$stmt->execute($datos);
$usuario = $stmt->fetch();
if(!$usuario) {
    print("Lo siento, pero no hay usuario con ese id");
    exit(0);
}
?>
```
    
    $sql = "SELECT * FROM usuario WHERE id=:id";
Guarda en la variable $sql el string que será la consulta SQL que se realizará posteriormente.
Esta consulta devolverá todos los datos (SELECT *) del usuario que tenga en la columna `id` el mismo valor que `:id`.

    `:id`
Aún no es ningún valor, es como un hueco que será rellenado posteriormente con un dato.

    $datos = array("id" => $_GET['id']);
    
Creamos un array que guardará el valor de la id del usuario con la clave `"id"`(tanto esta clave como `:id` podrían tener cualquier otro nombre). 

    $stmt = $conn->prepare($sql);
    
En `$stmt` (de "statement") preparamos la consulta con `prepare` para su ejecución. `$stmt` contiene ahora lo que se llama "un objeto sentencia". La consulta todavía no tiene el dato necesario.

    $stmt->execute($datos);

Finalmente, ejecutamos la consulta con el valor de id que nos da `$datos`.
    
`$stmt` ahora guarda los resultados de la consulta SQL realizada.

    `$usuario = $stmt->fetch();`

`fetch()`  Obtiene fila a fila los resultados de la consulta, por cada fila crea un array indexado tanto por nombre de columna, como numéricamente con índice de base 0 tal como fue obtenido en la consulta SQL anterior. 

El array de una fila:
    Array
    (
        [id] => 1,
        [0] => 1,
        [nombre] => María,
        [1] => María,
        [edad] => 0,
        [2] => 0,
        [foto] => '',
        [3] => ''
    )

$usuario contiene cada los arrays de estas filas devueltas en la consulta. Como buscamos los datos de un usuario por su id, y como esta debería ser única, solo se devolverá la fila de un usuario. Solo habrá un array.

    if(!$usuario) {
        print("Lo siento, pero no hay usuario con ese id");
        exit(0);
    }

Si `$usuario` está vacío (`!$usuario`), será porque la consulta no ha obtenido ninguna fila de la tabla de usuarios, por lo que el usuario no existe. Si no existe, la sesión debe cerrarse pues es la sesión de un usuario inexistente. `exit(0)` cerrará el programa.


De este modo, estos dos campos poseen los valores actuales del usuario, si este solo modificase uno de ellos, el otro se mantendría igual gracias al valor predeterminado.

4. Actualización de los datos del usuario.

En cuanto el formulario es enviado, los datos se guardan en $_POST y se refresca la página.
Al inicio del archivo, nos encontramos con el código que modifica los datos del usuario en la base de datos:

```php
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

    // prepara la sentencia SQL. Le doy un nombre a cada dato del formulario 
    $sql = "UPDATE usuario set nombre=:nombre, edad=:edad WHERE id=:id";

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
```
Solo se ejecuta si `isset($_POST['nombre'])`, es decir, si la variable $_POST no está vacía, variable que solo contendrá algo si se envía el formulario para la modificación.

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    
Guardamos los datos del formulario en estas nuevas variables.

    // prepara la sentencia SQL. Le doy un nombre a cada dato del formulario 
    $sql = "UPDATE usuario set nombre=:nombre, edad=:edad WHERE id=:id";
    // comprueba que la sentencia SQL preparada está bien 
    $stmt = $conn->prepare($sql);
    // ejecuta la sentencia usando los valores
    
Modifica en la tabla de datos los valores del usuario por los introducidos en el formulario.

     if($stmt->execute($datos) != 1) {
            print("No se pudo actualizar usuario");
            exit(0);
        }
Finalmente, en el caso de que no haya podido ejecutarse el UPDATE (`$stmt->execute($datos) != 1`), se mostrará un mensaje para el usuario y se cerrará el programa (`exit(0)`).

5. ¿Qué sucede con las fotos?

En la explicación anterior no se ha tenido en cuenta las fotos en el formulario ni en la modificación.

El input de foto en el formualrio es:

    <input type="file" name="foto" id="foto">
No es de `type="text"` como en los casos anteriores, sino de `type="file"`.

    <img width="50" src="fotos/<?php echo $usuario["foto"];?>">
    
Muestra la foto actual del usuario, que ha sido guardada en la variable $usuario junto a los demás datos actuales del usuario con el siguiente código visto anteriormente:

    // prepara la sentencia SQL. Le doy un nombre a cada dato del formulario 
    $sql = "SELECT * FROM usuario WHERE id=:id";
    // asocia valores a esos nombres
    $datos = array("id" => $_GET['id']);
    // comprueba que la sentencia SQL preparada está bien 
    $stmt = $conn->prepare($sql);
    $stmt->execute($datos);
    $usuario = $stmt->fetch();

 Cuando el usuario introduce una nueva foto, esta es procesada junto al resto de la información del formulario para modificar la base de datos:
 
```php
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
```

    $foto = $_FILES["foto"]["name"];
La foto introducida por el usuario no se encuentra en la variable $_POST como el resto de la información, sino en $_FILES, debido al `type`.

`$_FILES`, como `$_POST`, es un array asociativo de elementos subidos al script en curso a través del método POST. 

    // Comprueba que se ha subido una foto
    if($foto != "") {
        // copia el archivo temporal en fotos con su nombre original
        file_put_contents("fotos/$foto", file_get_contents($_FILES["foto"]["tmp_name"]));
Se comprueba si se ha subido una foto, en el caso de que no,

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

