# Spring

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
