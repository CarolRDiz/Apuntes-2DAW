# Spring Boot

## Crear proyecto

`Spring Initializr` para crear un proyecto de Spring si la IDE no te da la opción de hacerlo.

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

-> Crear package security

Clase SecurityConfiguration: buscar Configuring WebSecurity (para ignorar la seguridad)

    return (web) -> web.ignoring().anyRequest()

-> Crear package models
-> Crear package reposities

3. Crear archivos Java Class.
4. Crear tests con Insomnia mientras se desarrolla el proyecto.

## Bean

[Explicación](https://www.arquitecturajava.com/spring-bean-y-su-uso/)

## JPA

Las bases de datos utilizan relaciones (también llamadas a veces "Tablas") y las claves externas que las relacionan. En cambio, a la hora de desarrollar, los programas modernos modelan su información utilizando objetos (Programación Orientada a Objetos). Esta diferencia entre la forma de programar y la forma de almacenar da lugar a lo que se llama "**desfase de impedancia**" y complica la persistencia de los objetos.

JPA es una especificación que indica cómo se debe realizar la **persistencia** (almacenamiento) de los objetos en programas Java. Fíjate en que destaco la palabra "Especificación" porque JPA no tiene una implementación concreta, sino que, como veremos enseguida, existen diversas tecnologías que implementan JPA para darle concreción.

[¿Qué es JPA?](https://www.campusmvp.es/recursos/post/la-api-de-persistencia-de-java-que-es-jpa-jpa-vs-hibernate-vs-eclipselink-vs-spring-jpa.aspx)

## Hibernate

Hibernate es una herramienta de **mapeo objeto-relacional** (ORM) bajo licencia GNU LGPL para Java, que facilita el mapeo de atributos en una base de datos tradicional, y el modelo de objetos de un aplicación mediante archivos declarativos o **anotaciones en los beans** de las entidades que permiten establecer estas relaciones. Agiliza la relación entre la aplicación y nuestra base de datos SQL, de un modo que optimiza nuestro flujo de trabajo evitando caer en código repetitivo.

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

### Update

```java
@PutMapping("/{id}")
    public ResponseEntity<?> update (@PathVariable("id") Long userId, @RequestBody Users userDetails){
        Optional<Users> user = usersService.findById(userId);
        if(!user.isPresent()){
            return ResponseEntity.notFound().build();
        }
        user.get().setName(userDetails.getName());
        user.get().setSurname(userDetails.getSurname());
        user.get().setEmail(userDetails.getEmail());
        user.get().setPassword(userDetails.getPassword());
        return ResponseEntity.status(HttpStatus.CREATED).body(usersService.save(user.get()));
    }
```

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
@Table(name="users")

@Column(length=50)

@Column(name= "email", nullable = false, unique = true)

## Repositorio

Interfaz

Puede heredar de CrudRepository o de JpaRepository. JpaRepository tiene las funciones de CrudRepository y métodos de JPA.
Con Contrl y click sobre cada uno pueden verse sus métodos.

## Relaciones

### Many to many

[Documentación](https://www.baeldung.com/jpa-many-to-many)

## MongoDB

[Tutorial](https://www.mongodb.com/compatibility/spring-boot)
Es necesario:
- crear un nuevo usuario
- Añadir la IP

## DTO

Clase DTO intermediaria entre el modelo y los servicios

MODELO - DTO - SERVICIO - CONTROLADOR

## Aplication properties

- Reiniciar las tablas, útil para las pruebas: spring.jpa.hibernate.ddl-auto=create-drop
- Mostrar sql generado: spring.jpa.show-sql=true
- Mostrar la consulta sql en log: logging.level.org.hibernate.SQL=debug

## Dependencias

pom.xml

[Actualizar dependencias](https://www.jetbrains.com/idea/guide/tutorials/migrating-javax-jakarta/update-dependencies/)

## @Transactional

Una transacción es una unidad de trabajo compuesta por diversas tareas, cuyo resultado final debe ser que se ejecuten todas o ninguna de ellas.

## Problemas

En intellij -> File -> Invalidate Caches -> Restart

## Multimódulos

**pom.xml padre**: 

    <packaging>pom</packaging>
    <modules>
        <module>nombre-del-modulo</module>
        <module>nombre-del-modulo</module>
    </modelues>

**pom.xml hijo**:

    <parent>
        <groupId>..</groupId>
        <artifactId>..</..>
        <version>..</..>
        <relativePath>...</..>
    </parent>

## JWT Authentication and Authorisation

[Tutorial: Autentificación con JWT y Spring Security](https://www.youtube.com/watch?v=_p-Odh3MZJc)

Dependecias:

        <!-- https://mvnrepository.com/artifact/org.springframework.boot/spring-boot-starter-security -->
		<dependency>
			<groupId>org.springframework.boot</groupId>
			<artifactId>spring-boot-starter-security</artifactId>
			<version>3.0.5</version>
		</dependency>
        
        <!-- Para generar un JSON Web Token-->
		<!-- https://mvnrepository.com/artifact/io.jsonwebtoken/jjwt -->
		<dependency>
			<groupId>io.jsonwebtoken</groupId>
			<artifactId>jjwt-api</artifactId>
			<version>0.11.5</version>
		</dependency>
		<dependency>
			<groupId>io.jsonwebtoken</groupId>
			<artifactId>jjwt-impl</artifactId>
			<version>0.11.5</version>
			<scope>runtime</scope>
		</dependency>
		<dependency>
			<groupId>io.jsonwebtoken</groupId>
			<artifactId>jjwt-jackson</artifactId>
			<version>0.11.5</version>
			<scope>runtime</scope>
		</dependency>

[Tutorial 2023](https://youtu.be/KxqlJblhzfI)

- El cliente envía una solicitud HTTP a nuestro sistema back-end que se ejecuta utilizando un contenedor de arranque de Spring Boot en un servidor integrado de Apache Tomcat.
- Lo primero que se ejecuta en nuestra aplicación Spring es el filtro. En este caso, el filtro de autenticación JWT. Se ejecuta una vez por solicitud. Tiene la función de validar y verificar todo lo relacionado con el token JWT.

Proceso que sigue el filtro de autenticación JWT:
1. Verificación interna:
	- Verifica si tenemos el token JWT. 
	- Si no lo tiene, envía una respuesta 403 al cliente (Missing JWT, user does not exist). 
	- Extrae el nombre del usuario o el correo electrónico y realiza una llamada con esta información utilizando el servicio de detalles del usuario para intentar obtener información del usuario de la base de datos. 
	- La respuesta de la base de datos puede tener un usuario existente o uno inexistente. 
	- Si el usuario no existe, el filtro de autenticación JWT enviará una respuesta 403 al cliente.
	- Si el usuario existe comienza el proceso de validación.
3. Proceso de validación:
	-  El token JWT recibido se generó para este usuario en concreto, por lo que se tiene que validar el token en función del usuario. 
	-  En el proceso de validación se llama un servicio JWT que tomará como parámetros al token y al usuario.
	-   Si el token no es válido porque esté caducado o porque no sea para ese usuario se enviará una respuesta 403 al cliente. 
	-   Si el token es válido, llamaremos o actualizaremos el SecurityContextHolder y estableceremos el usuario conectado, diciendole al resto de la cadena de filtro que el usuario está ahora autentificado. 
	-   Actualizaremos el SecurityContextHolder, así que cada vez que comprobemos si el usuario está autentificado en esta petición la respuesta será sí hasta que vuelva a ser actualizado. 
	-   Cuando sea actualizado enviará la petición al DispatcherServlet, desde donde será enviada automáticamente al controlador donde se ejecutará lo que se necesite, como llamar a un servicio o ir a la base de datos. Entonces se enviará una respuesta al cliente.

Si todo va bien:
- Obtenemos un token JWT.
- Obtenemos un usuario existente.
- Valida el token.

## ModelMapper

Dependencia:
[Buscar la version más actualizada](https://central.sonatype.com/artifact/org.modelmapper/modelmapper/3.1.1)

	<dependency>
	    <groupId>org.modelmapper</groupId>
	    <artifactId>modelmapper</artifactId>
	    <version>3.1.0</version>
	</dependency>
En la carpeta config añadir el archivo ModelMapperConfig que contendrá:

	@Bean
	public ModelMapper modelMapper() {
	    return new ModelMapper();
	}
	
[Guia](https://www.baeldung.com/java-modelmapper)

	GameDTO gameDTO = this.mapper.map(game, GameDTO.class);

 # Spring Security
