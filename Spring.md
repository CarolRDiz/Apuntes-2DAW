# Spring

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

-> Crear package security

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

## Dependencias

pom.xml

[Actualizar dependencias](https://www.jetbrains.com/idea/guide/tutorials/migrating-javax-jakarta/update-dependencies/)
