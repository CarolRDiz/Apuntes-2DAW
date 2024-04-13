Index:
- [Quick Start](#quick-start)

## Quick Start

[Quick Start](https://angular.io/quick-start)

`npm init @angular myApp`

`npm start`

default URL is `http://localhost:4200`

`ng new my-first-project`
`cd my-first-project`
`ng serve`

`ng generate component x`
`ng generate interface x`

## Componente

Comando para generar un componente: 
`ng generate component <nombre>`

**Estructura**:

- HTML
- CSS
- TypeScript -> lógica

## NgModule

## RxJS

- RxJS is una librería de programación reactiva
- Simplifica la composición de código asíncrono y basado en eventos a través de secuencias observables.
- Observable
  - Observer
  - Scheduler
  - Subject
- Provee operadores para manipular las anteriores estructuras
- RxJS combina patrones de diseño de software como el Patrón del Observador, el Patrón del Iterador y conceptos de programación funcional utilizando colecciones para modelar una forma ideal de manejar secuencias de eventos.

### Dificultades

1. La librería acuña muchos conceptos con los que no estamos tan familiarizados al hacer programación proactiva.
2. La programación reactiva se ocupa de modelar relaciones entre eventos a través del tiempo. Cada vez que involucramos la variable tiempo en nuestro código implica incremento en complejidad.
3. RxJS cuenta con una gran cantidad de operadores y funciones, por lo que puede parecer abrumadora.

### UnSubscribe

    subscription: Subscription;
    
    ngOnDestroy() {
      this.subscription.unsubscribe()
    }


