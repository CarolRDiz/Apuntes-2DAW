# Contenidos

- [Resumen](#resumen)
- [Eventos](#eventos)
- [Clases](#clases)
- [Objetos](#objetos)
- [Desestructuración](#desestructuración)
- [DOM](#dom)
	- [Transversing de DOM](#transversing-de-dom)
	- [Modificar CSS](#modificar-css)
- [React](#react)

---
# Comandos 

`code .` -> para abrir visual estudio en la carpeta

# Funciones flecha

```javascript
// Función tradicional
function (a){
  return a + 100;
}

// Desglose de la función flecha

// 1. Elimina la palabra "function" y coloca la flecha entre el argumento y el corchete de apertura.
(a) => {
  return a + 100;
}

// 2. Quita los corchetes del cuerpo y la palabra "return" — el return está implícito.
(a) => a + 100;

// 3. Suprime los paréntesis de los argumentos
a => a + 100;
```

# Node

OS, FS, Path

```javascript
//importar
require()
```

# MVC

# React

Crear proyecto:

	npm create vite@latest
	
	npm install

Ejecutar en localhost:

	npm run dev

Extensión ES7+ React/Redux/React-Native snippets:

	Atajo rafce

Crear un elemento JSX simple:

```javascript
	const JSX = <h1>Hello JSX!</h1>;
```
	
Escribir código Javascript:

```javascript
{ 'this is treated as JavaScript code' }
```

Elemento JSX complejo:

```javascript
//Valid JSX:

<div>
  <p>Paragraph One</p>
  <p>Paragraph Two</p>
  <p>Paragraph Three</p>
</div>

//Invalid JSX:

<p>Paragraph One</p>
<p>Paragraph Two</p>
<p>Paragraph Three</p>
```

No es posible escribir elementos hermanos sin un padre contenedor.

Escribir comentarios:

```javascript
{/* Esto es un comentario */}
```

Renderizar elementos html al DOM:

```javascript
ReactDOM.render(componentToRender, targetNode)

//componentToRender -> const JSX = \<h1>Hello JSX!\</h1>;

//targetNode -> DOM node al que se renderiza el componente (document.getElementById()...)
```

Definir una clase html:

```javascript
	<div className="...">
```
	
Las etiquetas pueden escibirse:

```javascript
	<div/> o <div></div>
```

## Exportar componentes

### named

Exportaciones `named` pueden utilizar para exportar tantos enlaces como desee, o ninguno en absoluto.

```javascript
export {Greet as Greeting} function Greet() {
  return (
    <div className="App">
      <h1>Hello</h1>
    </div>
  );
}
export function Talk() {
  return (
    <div className="App">
      <h1>How are you?</h1>
    </div>
  );
}
```

Para importarlo:

```javascript
import {Talk, Greet} from "./components/source.jsx"
```

### default

Solo puede haber un tipo de exportación por archivo. Un componente por archivo.

```javascript
export default function App() {
  return (
    <div className="App">
      <h2>Hello world!</h2>
    </div>
  );
}

//tambien puede exportarse por separado.
export default App
```

Para importarlo:

```javascript
import Application from "./components/App.jsx"
```

## Componente funcional sin estado

`Un componente funcional sin estado es cualquier función que acepta propiedades y devuelve JSX.`

Crear componente con funciòn Javascript (Componente funcional sin estado):

```javascript
const DemoComponent = function() {
  return (
    <div className='customClass' />
  );
};
```
- El componente empieza en mayúsculas
- Recibe datos y los renderiza, pero no los modifica.

### Propiedades

Pasarle propiedades al componente funcional sin estado:

```javascript
const DemoComponent = (props) => <h1>Hello, {props.user}!</h1>

<DemoComponent user='Mark' />
```

Pasar array como propiedad:

	<ParentComponent>
	  <ChildComponent colors={["green", "blue", "red"]} />
	</ParentComponent>
	
Pueden usarse métodos de array al acceder a él:

	const ChildComponent = (props) => <p>{props.colors.join(', ')}</p>
	
Propiedades por defecto:

	MyComponent.defaultProps = { location: 'San Francisco' }
	
PropTypes para definir las propiedades esperadas:

	MyComponent.propTypes = { handleClick: PropTypes.func.isRequired }
	
`PropTypes.func` comprueba que `handleClick` es una función. 
Añadiendo `isRequired` se establece que `handleClick`es una propiedad requerida para el componente. 

[Validadores de PropTypes](https://reactjs.org/docs/typechecking-with-proptypes.html#proptypes)

### Hooks

[Hooks](https://reactjs.org/docs/hooks-state.html)

`useState`: añade un estado al componente de función

```javascript
const [variable, funcionSet] = useState(valor)

// useState devuelve el valor introducido y una función para actualizarlo.
// el valor se guarda en variable y la funcion en funcionSet

const [count, setCount] = useState(0);
```
Ejemplo con contador:

```javascript
import React, { useState } from 'react';

function Example() {
  // Declare a new state variable, which we'll call "count"  const [count, setCount] = useState(0);
  return (
    <div>
      <p>You clicked {count} times</p>
      <button onClick={() => setCount(count + 1)}>
        Click me
      </button>
    </div>
  );
}
```

## Componente React con sintáxis de clase

Se trata de componentes sin estado.

Crear un componente React con sintáxis de clase:

	class MyComponent extends React.Component {
	  constructor(props) {
	    super(props);
	  }

	  render() {
	    return (
	      <h1>Hi</h1>
	    );
	  }
	}

Crear un componente con Composition:

	const ChildComponent = () => {
	  return (
	    <div>
	      <p>I am the child</p>
	    </div>
	  );
	};

	class ParentComponent extends React.Component {
	  constructor(props) {
	    super(props);
	  }
	  render() {
	    return (
	      <div>
		<h1>I am the parent</h1>
		<ChildComponent />
	      </div>
	    );
	  }
	};

Renderizar nested components:

	const TypesOfFruit = () => {
	  return (
	    <div>
	      <h2>Fruits:</h2>
	      <ul>
		<li>Apples</li>
		<li>Blueberries</li>
		<li>Strawberries</li>
		<li>Bananas</li>
	      </ul>
	    </div>
	  );
	};

	const Fruits = () => {
	  return (
	    <div>
	      { /* Change code below this line */ }
	      <TypesOfFruit/>
	      { /* Change code above this line */ }
	    </div>
	  );
	};

	class TypesOfFood extends React.Component {
	  constructor(props) {
	    super(props);
	  }

	  render() {
	    return (
	      <div>
		<h1>Types of Food:</h1>
		{ /* Change code below this line */ }
		<Fruits/>
		{ /* Change code above this line */ }
	      </div>
	    );
	  }
	};

	//O con clases
	
	class Fruits extends React.Component {
	  constructor(props) {
	    super(props);
	  }
	  render() {
	    return (
	      <div>
		<h2>Fruits:</h2>
		{ /* Change code below this line */ }
		<NonCitrus/>
		<Citrus/>
		{ /* Change code above this line */ }
	      </div>
	    );
	  }
	};

	class TypesOfFood extends React.Component {
	  constructor(props) {
	     super(props);
	  }
	  render() {
	    return (
	      <div>
		<h1>Types of Food:</h1>
		{ /* Change code below this line */ }
		<Fruits/>
		{ /* Change code above this line */ }
		<Vegetables />
	      </div>
	    );
	  }
	};
	
Renderizar componentes al DOM:

	ReactDOM.render(<ComponentToRender />, targetNode)
	
### Propiedades

Acceder a propiedades usando `this.props`:

	{this.props.nombrePropiedad}

## Componente con estado

El `estado` consiste en cualquier dato sobre la que tu aplicación necesita saber, que puede cambiar a lo largo del tiempo. Se quiere que las aplicaciones respondan a los cambios de estado y presenten una UI actualizada cuando sea necesario.
React ofrece una buena solución para el manejo de estado de aplicaciones web modernas.

Crear estado en componente React:

	//Se crea una propiedad `state` en el constructor de la clase del componente.
	//Se le asigna a esta propiedad `state` un objeto Javascript.

	this.state = {
		propiedad:valor,..
	}

Renderizar estado in la Interfaz de Usuario:

Se puede acceder a los datos del estado en el método render() con:

	const propiedad = this.state.nombrePropiedad

Y luego en el return:

```javascript
{propiedad}
```

Si se quiere acceder a ellos en el return () se debe de cerrar entre llaves: 

```javascript
{this.state.nombrePropiedad}
```

Establecer estado con this.setState:

```javascript
//Dentro de la clase

this.setState({
  propiedad: valor
});
```

Unir `this` a un método de clase:

```javascript
	class MyClass {
	  constructor() {
	    this.myMethod = this.myMethod.bind(this);
	  }

	  myMethod() {
	    // whatever myMethod does
	  }
	}
```

Llamar al método:

```javascript
this.myMethod

//Ejemplo
<button onClick = {this.handleClick}>Click Me</button>
```

Usar estado para alternar un elemento:

```javascript
this.setState((state, props) => ({
  counter: state.counter + props.increment
}));

// ó..

this.setState(state => ({
  counter: state.counter + 1
}));

//PERO NO!!!!:
//this.setState({
//  counter: this.state.counter + this.props.increment
//});
```

Ejemplo con métodos y setState:

```javascript
class Counter extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      count: 0
    }
    this.increment = this.increment.bind(this);
    this.decrement = this.decrement.bind(this);
    this.reset = this.reset.bind(this);
  }
    // Change code below this line
    increment(){
      this.setState(state => ({
        count: state.count+1
      }))
    }
    // Change code above this line
    decrement(){
      this.setState(state => ({
        count: state.count-1
      }))
    }
  // Change code below this line
  reset(){
    this.setState({
      count:0
    })
  }
  // Change code above this line
  render() {
    return (
      <div>
        <button className='inc' onClick={this.increment}>Increment!</button>
        <button className='dec' onClick={this.decrement}>Decrement!</button>
        <button className='reset' onClick={this.reset}>Reset</button>
        <h1>Current Count: {this.state.count}</h1>
      </div>
    );
  }
};
```

## Estado

### Fusionar cambios de estado

Si el estado contiene varias variables:

```javascript
 constructor(props) {
    super(props);
    this.state = {
      posts: [],      comments: []    };
  }
```

Se pueden actualizar por separado:

```javascript
  componentDidMount() {
    fetchPosts().then(response => {
      this.setState({
        posts: response.posts      });
    });

    fetchComments().then(response => {
      this.setState({
        comments: response.comments      });
    });
  }
```
Puede simplificarse con:

```javascript
this.setState({
  [name]: value});
```

Que equivale a:

```javascript
var partialState = {};
partialState[name] = value;this.setState(partialState);
```

## Formularios

[Documentacion Formularios](https://reactjs.org/docs/forms.html#controlled-components)


```javascript
class NameForm extends React.Component {
  constructor(props) {
    super(props);
    this.state = {value: ''};
    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleChange(event) {    this.setState({value: event.target.value});  }
  handleSubmit(event) {
    alert('A name was submitted: ' + this.state.value);
    event.preventDefault();
  }

  render() {
    return (
      <form onSubmit={this.handleSubmit}>        <label>
          Name:
          <input type="text" value={this.state.value} onChange={this.handleChange} />        </label>
        <input type="submit" value="Submit" />
      </form>
    );
  }
}
```
La etiqueta `textarea`:

En html el texto de textarea es definido por sus hijos:

```javascript
<textarea>
  Hello there, this is some text in a text area
</textarea>
```
En react se definide por el atributo `value`:

```javascript
class EssayForm extends React.Component {
  constructor(props) {
    super(props);
    this.state = {      value: 'Please write an essay about your favorite DOM element.'    };
    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleChange(event) {    this.setState({value: event.target.value});  }
  handleSubmit(event) {
    alert('An essay was submitted: ' + this.state.value);
    event.preventDefault();
  }

  render() {
    return (
      <form onSubmit={this.handleSubmit}>
        <label>
          Essay:
          <textarea value={this.state.value} onChange={this.handleChange} />        </label>
        <input type="submit" value="Submit" />
      </form>
    );
  }
}
```
La etiqueta `select`:

En html: 

```javascript
<select>
  <option value="grapefruit">Grapefruit</option>
  <option value="lime">Lime</option>
  <option selected value="coconut">Coconut</option>
  <option value="mango">Mango</option>
</select>
```
En React el atributo `selected` se convierte en el atributo `value` en la etiqueta `select`:

```javascript
class FlavorForm extends React.Component {
  constructor(props) {
    super(props);
    this.state = {value: 'coconut'};
    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleChange(event) {    this.setState({value: event.target.value});  }
  handleSubmit(event) {
    alert('Your favorite flavor is: ' + this.state.value);
    event.preventDefault();
  }

  render() {
    return (
      <form onSubmit={this.handleSubmit}>
        <label>
          Pick your favorite flavor:
          <select value={this.state.value} onChange={this.handleChange}>            <option value="grapefruit">Grapefruit</option>
            <option value="lime">Lime</option>
            <option value="coconut">Coconut</option>
            <option value="mango">Mango</option>
          </select>
        </label>
        <input type="submit" value="Submit" />
      </form>
    );
  }
}
```
El atributo value puede aceptar un array:

```javascript
<select multiple={true} value={['B', 'C']}>
```

La etiqueta `file input`:

Es un componente no controlado. Su `value` es solo de lectura.

Múltiples inputs:

```javascript
class Reservation extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      isGoing: true,
      numberOfGuests: 2
    };

    this.handleInputChange = this.handleInputChange.bind(this);
  }

  handleInputChange(event) {
    const target = event.target;
    const value = target.type === 'checkbox' ? target.checked : target.value;
    const name = target.name;
    this.setState({
      [name]: value    });
  }

  render() {
    return (
      <form>
        <label>
          Is going:
          <input
            name="isGoing"            type="checkbox"
            checked={this.state.isGoing}
            onChange={this.handleInputChange} />
        </label>
        <br />
        <label>
          Number of guests:
          <input
            name="numberOfGuests"            type="number"
            value={this.state.numberOfGuests}
            onChange={this.handleInputChange} />
        </label>
      </form>
    );
  }
}
```

# Eventos

`document.addEventListener(evento, funcion)`

Eventos:

`DOMContentLoaded` // Para cuando el documento esté listo.

## target

`e.target.classList`

La propiedad target de la interfaz del event.currentTarget es una referencia al objeto en el cual se lanzo el evento. Es diferente de
event.currentTarget donde el controlador de eventos (event handler) es llamado durante la fase de bubbling or capturing del evento.

## Eventos de ratón

- `click`
- `mouseenter`
- `mouseout`
- `mousedown` // Cuando lo presionas
- `mouseup` // Cuando lo sueltas
- `dbclick`

## Eventos de teclado

- `keydown`
- `keyup`
- `blur` // Al salir del elemento seleccionado, haciendo click fuera o seleccionando otro con el tabulador
- `copy`
- `paste`
- `cut`
- `input` // Para keydown, keyup, copy, paste, cut
- `submit`

## Eventos de scrolling

`window.addEventListener()`

- `scroll`
- 


## preventDefault

La función recibe como parámetro el evento:
(e)
{
`e.preventDefault()`

`e.stopPropagation()` // Prevenir el bubbling
}

# Use strict

`"use strict"`; Define que el código JavaScript debe ejecutarse en "modo estricto".
Con el modo estricto, no puede, por ejemplo, usar variables no declaradas.

# Desestructuración

[Desestructuración](https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Operators/Destructuring_assignment)

La sintaxis de desestructuración es una expresión de JavaScript que permite desempacar valores de arreglos o propiedades 
de objetos en distintas variables.

```javascript
const x = [1, 2, 3, 4, 5];
const [y, z] = x;
console.log(y); // 1
console.log(z); // 2
```

### Asignación separada de la declaración

```javascript
let a, b;
[a, b] = [1, 2];
console.log(a); // 1
console.log(b); // 2
```
	
### Valores predeterminados

```javascript
let a, b;
[a=5, b=7] = [1];
console.log(a); // 1
console.log(b); // 7
```

### Intercambio de variables

	let a = 1;
	let b = 3;

	[a, b] = [b, a];
	console.log(a); // 3
	console.log(b); // 1

	const arr = [1,2,3];
	[arr[2], arr[1]] = [arr[1], arr[2]];
	console.log(arr); // [1,3,2]

### Analizar un arreglo devuelto por una función

```javascript
function f() {
  return [1, 2];
}

let a, b;
[a, b] = f();
console.log(a); // 1
console.log(b); // 2
```

### Ignorar algunos valores devueltos

```javascript
function f() {
  return [1, 2, 3];
}

const [a, , b] = f();
console.log(a); // 1
console.log(b); // 3

const [c] = f();
console.log(c); // 1
```

También puedes ignorar todos los valores devueltos:

```javascript
	[,,] = f();
```

### Asignar el resto de un arreglo a una variable

```javascript
const [a, ...b] = [1, 2, 3];
console.log(a); // 1
console.log(b); // [2, 3]
```

### Desestructuración de objetos

#### Asignación básica

```javascript
const user = {
    id: 42,
    is_verified: true
};

const {id, is_verified} = user;

console.log(id); // 42
console.log(is_verified); // true
```

Los paréntesis (...) alrededor de la declaración de asignación son obligatorios cuando se usa la desestructuración de un
objeto literal sin una declaración.

{a, b} = {a: 1, b: 2} no es una sintaxis independiente válida, debido a que {a, b} en el lado izquierdo se considera un
bloque y no un objeto literal.

#### Asignación sin declaración

A una variable se le puede asignar su valor con desestructuración separada de su declaración.

```javascript
let a, b;

({a, b} = {a: 1, b: 2});
```


#### Asignar a nuevos nombres de variable

Una propiedad se puede desempacar de un objeto y asignar a una variable con un nombre diferente al de la propiedad del objeto.

	const o = {p: 42, q: true};
	const {p: foo, q: bar} = o;

	console.log(foo); // 42
	console.log(bar); // true
	
#### Valores predeterminados

A una variable se le puede asignar un valor predeterminado, en el caso de que el valor desempacado del objeto sea undefined.

	const {a = 10, b = 5} = {a: 3};

	console.log(a); // 3
	console.log(b); // 5

#### Asignar nombres a nuevas variables y proporcionar valores predeterminados

Una propiedad puede ser ambas

    Desempacada de un objeto y asignada a una variable con un nombre diferente.
    Se le asigna un valor predeterminado en caso de que el valor desempacado sea undefined.

	const {a: aa = 10, b: bb = 5} = {a: 3};

	console.log(aa); // 3
	console.log(bb); // 5

#### Desempacar campos de objetos pasados como parámetro de función

	const user = {
	  id: 42,
	  displayName: 'jdoe',
	  fullName: {
	    firstName: 'John',
	    lastName: 'Doe'
	  }
	};

	function userId({id}) {
	  return id;
	}

	function whois({displayName, fullName: {firstName: name}}) {
	  return `${displayName} es ${name}`;
	}

	console.log(userId(user)); // 42
	console.log(whois(user));  // "jdoe es John"

Esto desempaca el id, displayName y firstName del objeto user y los imprime.

#### Establecer el valor predeterminado de un parámetro de función

	function drawChart({size = 'big', coords = {x: 0, y: 0}, radius = 25} = {}) {
	  console.log(size, coords, radius);
	  // haz un dibujo de gráfico
	}

	drawChart({
	  coords: {x: 18, y: 30},
	  radius: 30
	});


# Notas importantes

### window.onload
Como el código Javascript es ejecutado antes de que la etiqueta body HTML sea cargada, document.body es null.
Ejecutar el código dentro de la función window.load soluciona este problema.

	window.onload = function() {
		
	};
	
Ejemplo:

      window.onload = () => {
      
        const p = document.createElement('p');
	
        p.innerHTML = 'Lorem ipsum';
	
        document.body.appendChild(p);
      };

### addEventListener() y pasar parámetros

Soluciona el problema de que la función se ejecute sin llamarla.

      element.addEventListener("click", function(){ myFunction(p1, p2); });

[Mirar: Pasar parámetros](https://www.w3schools.com/js/js_htmldom_eventlistener.asp)
[Ejemplo](https://es.stackoverflow.com/questions/345390/porque-sucede-esto-no-entiendo-addeventlistenerclick-se-ejecuta-auto)
[Ejemplo2](https://es.stackoverflow.com/questions/301517/la-funcion-en-onclick-se-ejecuta-sin-hacer-click)

# Clases


[Clases](https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Classes)

Las clases de javascript son una mejora sintáctica sobre la herencia basada en prototipos de JavaScript. La sintaxis de
las clases no introduce un nuevo modelo de herencia orientada a objetos en JavaScript. Las clases de JavaScript proveen 
una sintaxis mucho más clara y simple para crear objetos y lidiar con la herencia.

9.2 Clases vs. Prototipos

Los lenguajes orientados a objetos basados en clases como Java o C++, se basan en el concepto de dos entidades distintas: la clase y las instancias. Un lenguaje basado en prototipos, como JavaScript, no hace esta distinción: simplemente maneja
objetos. Este tipo de lenguajes tiene la noción de objetos prototipo, objetos usados como platilla para obtener las 
propiedades iniciales de un objeto. Cualquier objeto puede especificar su propias propieades, tanto en el momento que los
creamos como en tiempo de ejecución. Además, cualquier objeto puede asociarse como prototipo a otro objeto, permitiendo 
compartir todas sus propiedades.

En Javascript:

- Todos los objetos son instancias
- Las clases se definen y crean con las funciones constructoras.
- Un objeto se instancia con el operador new.
- La estructura de clases se crea asignando un objeto como prototipo.
- La herencia de propiedades se realiza a través de la cadena de prototipos.
- La función constructora o el prototipo especifican unas propiedades iniciales. Se pueden añadir o eliminar estas
propiedades en tiempo de ejecución, en un objeto concreto o a un conjunto de objetos.

### Declaración de clases

	class Rectangulo {
	  constructor(alto, ancho) {
	    this.alto = alto;
	    this.ancho = ancho;
	  }
	}
	
#### Expresiones de clases

Una expresión de clase es otra manera de definir una clase. Las expresiones de clase pueden ser nombradas o anónimas. El nombre dado a la expresión de clase nombrada es local dentro del cuerpo de la misma.

	// Anonima
	let Rectangulo = class {
	  constructor(alto, ancho) {
	    this.alto = alto;
	    this.ancho = ancho;
	  }
	};

	console.log(Rectangulo.name);
	// output: "Rectangulo"

	// Nombrada
	let Rectangulo = class Rectangulo2 {
	  constructor(alto, ancho) {
	    this.alto = alto;
	    this.ancho = ancho;
	  }
	};
	console.log(Rectangulo.name);
	// output: "Rectangulo2"

### Alojamiento

Una importante diferencia entre las declaraciones de funciones y las declaraciones de clases es que las declaraciones de funciones son alojadas y las declaraciones de clases no lo son. En primer lugar necesitas declarar tu clase y luego acceder a ella, de otro modo el ejemplo de código siguiente arrojará un ReferenceError:

	const p = new Rectangle(); // ReferenceError

	class Rectangle {}


### Constructor

El método constructor es un método especial para crear e inicializar un objeto creado con una clase. Solo puede haber un
método especial con el nombre "constructor" en una clase. Si esta contiene mas de una ocurrencia del método constructor,
se arrojará un Error SyntaxError

Un constructor puede usar la palabra reservada super para llamar al constructor de una superclase.

### Métodos prototipo

Vea también métodos definidos.

	class Rectangulo {
	  constructor (alto, ancho) {
	    this.alto = alto;
	    this.ancho = ancho;
	  }
	  // Getter
	  get area() {
	     return this.calcArea();
	   }
	  // Método
	  calcArea () {
	    return this.alto * this.ancho;
	  }
	}

	const cuadrado = new Rectangulo(10, 10);

	console.log(cuadrado.area); // 100

### Métodos estáticos

La palabra clave static define un método estático para una clase. Los métodos estáticos son llamados sin instanciar su
clase y no pueden ser llamados mediante una instancia de clase. Los métodos estáticos son a menudo usados para crear
funciones de utilidad para una aplicación.

	class Punto {
	  constructor ( x , y ){
	    this.x = x;
	    this.y = y;
	  }

	  static distancia ( a , b) {
	    const dx = a.x - b.x;
	    const dy = a.y - b.y;

	    return Math.sqrt ( dx * dx + dy * dy );
	  }
	}

	const p1 = new Punto(5, 5);
	const p2 = new Punto(10, 10);

	console.log (Punto.distancia(p1, p2)); // 7.0710678118654755

### Subclases con extends

La palabra clave extends es usada en declaraciones de clase o expresiones de clase para crear una clase hija.

	class Animal {
	  constructor(nombre) {
	    this.nombre = nombre;
	  }

	  hablar() {
	    console.log(this.nombre + ' hace un ruido.');
	  }
	}

	class Perro extends Animal {
	  hablar() {
	    console.log(this.nombre + ' ladra.');
	  }
	}
	


Fijarse que las clases no pueden extender objectos regulares (literales). Si se quiere heredar de un objecto regular, se debe user Object.setPrototypeOf()::

	var Animal = {
	  hablar() {
	    console.log(this.nombre + ' hace ruido.');
	  },
	  comer() {
	    console.log(this.nombre + ' se alimenta.');
	  }
	};

	class Perro {
	  constructor(nombre) {
	    this.nombre = nombre;
	  }
	  hablar() {
	    console.log(this.nombre + ' ladra.');
	  }
	}

	// Solo adjunta los métodos aún no definidos
	Object.setPrototypeOf(Perro.prototype, Animal);

	var d = new Perro('Mitzie');
	d.hablar(); // Mitzie ladra.
	d.comer(); // Mitzie se alimenta.

### Llamadas a súperclases con super

La palabra clave super es usada para llamar funciones del objeto padre.

	class Gato {
	  constructor(nombre) {
	    this.nombre = nombre;
	  }

	  hablar() {
	    console.log(this.nombre + ' hace ruido.');
	  }
	}

	class Leon extends Gato {
	  hablar() {
	    super.hablar();
	    console.log(this.nombre + ' maulla.');
	  }
	}


### Propiedades privadas
	class ClassWithPrivateField {
	  #privateField
	}

	class ClassWithPrivateMethod {
	  #privateMethod() {
	    return 'hello world'
	  }
	}

	class ClassWithPrivateStaticField {
	  static #PRIVATE_STATIC_FIELD
	}


# Objetos

[Objetos](https://developer.mozilla.org/es/docs/Web/JavaScript/Guide/Working_with_Objects#herencia)

## Creación de nuevos objetos

Opciones: iniciadores de objeto, función constructora y Object.create

### Uso de iniciadores de objeto

El uso de iniciadores de objetos a veces se denomina crear objetos con notación literal.

	var obj = { property_1:   value_1,   // property_# puede ser un identificador...
		    2:            value_2,   // o un número...
		    // ...,
		    'property n': value_n }; // o una cadena

Los objetos se crean como si se hiciera una llamada a new Object(); es decir, los objetos hechos a partir de expresiones
literales de objeto son instancias de Object.

También puedes utilizar iniciadores de objetos para crear arreglos. Consulta arreglos literales.

### Usar una función constructora

Pasos:

1. Definir el tipo de objeto escribiendo una función constructora. Existe una fuerte convención, con buena razón, para utilizar en mayúscula la letra inicial.

		function Car(make, model, year) {
		  this.make = make;
		  this.model = model;
		  this.year = year;
		}

2. Crear una instancia del objeto con el operador new.

		var mycar = new Car('Eagle', 'Talon TSi', 1993);

Puedes crear cualquier número de objetos Car con las llamadas a new. Por ejemplo,

	var kenscar = new Car('Nissan', '300ZX', 1992);
	var vpgscar = new Car('Mazda', 'Miata', 1990);

### Usar el método Object.create

Te permite elegir el prototipo del objeto que deseas crear, sin tener que definir una función constructora.

	var Animal = {
	  type: 'Invertebrates', // Valor predeterminado de las propiedades
	  displayType: function() {  // Método que mostrará el tipo de Animal
	    console.log(this.type);
	  }
	};

	// Crea un nuevo tipo de animal llamado animal1
	var animal1 = Object.create(Animal);
	
	var fish = Object.create(Animal);
	fish.type = 'Fishes';

## Definición de las propiedades de un tipo de objeto

Puedes agregar una propiedad a un tipo de objeto definido previamente mediante el uso de la propiedad prototype. Esto define una propiedad que es compartida por todos los objetos del tipo especificado, en lugar de por una sola instancia del objeto. El siguiente código agrega una propiedad color a todos los objetos del tipo Car, y luego asigna un valor a la propiedad color del objeto car1.

	Car.prototype.color = null;
	car1.color = 'black';
	
## Definición de métodos

	objectName.methodname = functionName;
	
	// O ESTO 
	
	var myObj = {

	  myMethod: function(params) {

	    // ...hacer algo
	  }

	  // O ESTO TAMBIÉN FUNCIONA

	  myOtherMethod(params) {

	    // ...hacer algo más
	  }
	};

`this`: En nuestra función nos referimos al Objeto con `this`.

Entonces puedes llamar al método en el contexto del objeto de la siguiente manera:

	object.methodname(params);

### Definir métodos dentro de la función constructora

	function displayCar() {
	  var result = `Un hermoso ${this.year} ${this.make} ${this.model}`;
	  pretty_print(result);
	}
	
	function Car(make, model, year, owner) {
	  this.make = make;
	  this.model = model;
	  this.year = year;
	  this.owner = owner;
	  this.displayCar = displayCar;
	}

## Definición de captadores (getters) y establecedores (setters)

1. Usando iniciadores de objeto:

		var objeto = {
		  a: 7,
		  get getB() {
		    return this.a + 1;
		  },
		  set setA(x) {
		    this.a = x / 2;
		  }
		}; 

		console.log (objeto.a); // 7
		console.log (objeto.getB); // 8 <-- En este punto se inicia el método get b().
		objeto.setA = 50;         // <-- En este punto se inicia el método set c(x)
		console.log(objeto.a); // 25

2. Usando el método Object.defineProperties:

Si más tarde necesitas agregar captadores y establecedores — porque no lo escribiste en el objeto prototipo o particular — entonces la segunda forma es la única forma posible.

El primer parámetro de este método es el objeto sobre el que se quiere definir el captador o establecedor.

	var o = { a: 0 };

	Object.defineProperties(o, {
	    'b': { get: function() { return this.a + 1; } },
	    'c': { set: function(x) { this.a = x / 2; } }
	});

	o.c = 10; // Ejecuta el establecedor, que asigna 10/2 (5) a la propiedad 'a'
	console.log(o.b); // Ejecuta el captador, que produce un + 1 o 6


## Unir objetos 

### Con spread operator

	const marcas1 = {'a': 'Fiat', 'b': 'Seat'};
	const marcas2 = {'c': 'Renault'};
	const marcas3 = {'d': 'Ford'};
	const marcasFinal = {...marcas1, ...marcas1, ...marcas1};

### Con assign

	var o1 = { a: 1 };
	var o2 = { b: 2 };
	var o3 = { c: 3 };

	var obj = Object.assign(o1, o2, o3);
	console.log(obj); // { a: 1, b: 2, c: 3 }
	console.log(o1);  // { a: 1, b: 2, c: 3 }, target object itself is changed.


`var myObject = new Object()`

`myObject.property1 = value1`

`myObject.property2 = value2`

`myObject.property = value`  -> para modificar valores o añadir propiedades

`myObject[property] = value` -> necesario para propiedades con espacios o propiedades contenidas en variables

`delete object.property` -> borrar propiedad

`obj.hasOwnProperty(propiedad)`  -> Determinar si un obj tiene cierta propiedad
	
array = [{(obj)}, {(obj)}]

## Herencia

[Herencia](https://developer.mozilla.org/es/docs/Web/JavaScript/Inheritance_and_the_prototype_chain)

En lo que a herencia se refiere, JavaScript sólo tiene una estructura: objetos. 
Cada objeto tiene una propiedad privada (referida como su [[Prototype]]) que mantiene un enlace a otro objeto llamado su prototipo. Ese objeto prototipo tiene su propio prototipo, y así sucesivamente hasta que se alcanza un objeto cuyo prototipo es null.
Por definición, null no tiene prototipo, y actúa como el enlace final de esta cadena de prototipos.
Casi todos los objetos en JavaScript son instancias de Object que se sitúa a la cabeza de la cadena de prototipos.

#### Heredando propiedades

### SUBPROPIEDADES

	const myObject = {

	  propiedad: {

	    subpropiedad: valor

	  },
	  propiedad: {

	    subpropiedad: { 

	      subpropiedad: valor,

	      subpropiedad: valor

	    },

	    subpropiedad: valor

	  }

	};
		
`obj.propiedad.subpropiedad`

## NESTED ARRAYS

	const ourPets = [
	
	  {
	  
	    animalType: "cat",
	    
	    names: [
	    
	      "Meowzer",
	      
	      "Fluffy",
	      
	      "Kit-Cat"
	      
	    ]
	    
	  },
	  
	  {
	    animalType: "dog",
	    
	    names: [
	    
	      "Spot",
	      
	      "Bowser",
	      
	      "Frankie"
	      
	    ]
	    
	  }
	  
	];
	
	ourPets[0].names[1]

## Object.method

### Object.isFrozen()

El método `Object.isFrozen(obj)` determina si un objeto está congelado.

Un objeto está congelado si y solo si no es extendible, todas sus propiedades son no-configurables, y todos los datos de sus propiedades no tienen capacidad de escritura.

### Object.seal()

El método `Object.seal(obj)` sella un objeto, previniendo que puedan añadirse nuevas propiedades al mismo, y marcando todas
las propiedades existentes como no-configurables. Los valores de las propiedades presentes permanecen pudiendo cambiarse en
tanto en cuanto dichas propiedades sean de escritura.

`Object.isSealed(obj)`

### Object.keys

### Object.values

### Object.entries

# Comillas invertidas \`\`**

      Ejemplo: const userInfo = `User info: ${name} ${surname} ${telephone}`;



# Instalar Node.js

    Node.js es un entorno en tiempo de ejecución multiplataforma, de código abierto, para la capa del servidor
    
    basado en el lenguaje de programación JavaScript, asíncrono, con E/S de datos en una arquitectura orientada 
    
    a eventos y basado en el motor V8 de Google.
    
# NPM

En la terminal de un proyecto:

`npm init`

`npm install eslint --save dev`

Opción Standard:

    npm install standard -D
    
    En package.json:
    
    "eslintConfig": {
    "extends": "./node_modules/standard/eslintrc.json"
  }

Personalizar reglas:

    parserOptions: {
        eslint: 'recommended',
    }
    rules:{
        quotes: ['error', 'double'],
    }
    
    package.json:
        crear nuevo script
        "scripts": {
            "test": "echo \"Error: no test spectified\" && exit 1",
            "link": "npx eslint . --ext .js"
            "link-fix": "npx eslint . --ext .js --fix"

# Instalar Extensión Eslint

Extensión Live Server de Ritwick Dey para actualizar la página html automáticamente.

Una vez instalada, podemos pulsar el botón de abajo a la derecha que pone "Go live" para correr un Live server

**Extensión JavaScript (ES6) code snippets de charalampos karypidis**


Devuelve un número entre max y min, incluyéndolos

# DOM

Document object mode

    Interfaz de programación para los documentos HTML y XML.

Facilita una representación estructurada del documento y define de qué manera los programas pueden acceder, al fin de modificar, tanto su estructura, estilo y contenido. El DOM da una representación del documento como un grupo de nodos y objetos estructurados que tienen propiedades y métodos. Esencialmente, conecta las páginas web a scripts o lenguajes de programación.

`Una página web es un documento`. Éste documento puede exhibirse en la ventana de un navegador o también como código fuente HTML. Pero, en los dos casos, es el `mismo documento`. El `modelo de objeto de documento (DOM)` proporciona otras `formas de presentar, guardar y manipular` este mismo documento. El DOM es una `representación completamente orientada al objeto de la página web` y puede ser `modificado con un lenguaje de script` como JavaScript.

![Esquema_DOM](imagenes/dom_esquema.png)

Ejemplos:

Por ejemplo, el DOM de W3C especifica que el método getElementsByTagName en el código de abajo debe devolver una lista de todos los elementos \<p> del documento:

    paragraphs = document.getElementsByTagName ("p");
    // paragraphs[0] es el primer elemento <p>
    // paragraphs[1] es el segundo elemento <p>, etc.
    alert (paragraphs [0].nodeName);

## Insertar elementos

`Document.createElement("elemento")`

`.appendChild()`

`insertBefore(element_que_se_inserta, elemento_de referencia)`

## Eliminar elementos

Dos formas:

1. Desde sí mismo:

`.remove()`

2. Desde su elemento padre:

`.removeChild(...)`

## Transversing de DOM

### Listar los nodos hijos

`.childNodes` // Considera los saltos de línea como nodos. Sucio.

`.children` // devuelve un array

### Transversing de hijo a padre

`.parentElement`

### Transversing de hermanos

`.nextElementSibling`

`.previousElementSibling`


## Modificar css

Propiedad CSS : backgroud-color -> Javascript: backgroundColor

`element.style.propiedad` = "gfdgsd" //No es una buena práctica.

Lo ideal es cambiar las clases.

### Añadir y modificar clases

`.classList.add("nombre_clase","...")`

## Modificar contenidos

### Métodos de Document

### Métodos de Node

`textContent`

```javascript
<div id="divA">This is some text!</div>

let text = document.getElementById('divA').textContent;
// The text variable is now: 'This is some text!'
document.getElementById('divA').textContent = 'This text is different!';
// The HTML for divA is now:
// <div id="divA">This text is different!</div>
```

### Métodos de Element

`innerHTML`
`innerText`

# BOM
        
Browser Object Model
        
El `window` objeto es compatible con todos los navegadores. Representa la ventana del navegador.

![bom_esquema](https://user-images.githubusercontent.com/91955244/197706485-f07591a1-c0eb-4e48-8dad-f25551731fa9.png)
        
`window.localStorage`
        
La propiedad de sólo lectura localStorage te permite acceder al objeto local Storage; los datos persisten almacenados entre de las diferentes sesiones de navegación.

## localStorage

	window.localStorage.getItem(clave)
	
	window.localStorage.setItem(clave, valor)
	
	window.localStorage.removeItem(clave)

Convertir un objeto a JSON para poder almacenarlo:

	JSON.stringify(objeto)

También arrays:

        JSON.stringify(array)
	
Para convertir un JSON en el valor o objeto que describe: 

	JSON.parse(json)

Crear un componente con función Javascript:

	const DemoComponent = function() {
	  return (
	    <div className='customClass' />
	  );
	};

	La constante debe comenzar en mayúsculas

# Recursión

Recursión es cuando una función sigue llamándose a sí misma, hasta que ya no tiene que hacerlo.

Piensa en recursión como una carrera en un circuito. Es como correr la misma pista una y otra vez, pero las vueltas se hacen más pequeñas cada vez. Eventualmente, correrás la vuelta más pequeña y se terminará la carrera.

Lo mismo con la recursión: La función sigue llamándose a sí misma, cada vez con una entrada menor hasta que eventualmente se detiene.

Pero, la función no decide por sí misma cuando parar. Nosotros le decimos cuando. Nosotros le damos a la función una condición conocida como `caso base`.

      Se llama recursividad a un proceso mediante el que una función se llama a sí misma de forma repetida, hasta que se
      satisface alguna determinada condición. El proceso se utiliza para computaciones repetidas en las que cada acción 
      se determina mediante un resultado anterior. Se pueden escribir de esta forma muchos problemas iterativos.
      
### Ejemplos de recursión

1. Cuenta regresiva desde un número dado hasta el número más pequeño, restando 1 cada vez que pasa por el bucle.

Dado el número 5, la salida será:

    // 5
    // 4
    // 3
    // 2
    // 1
    
Esta función con recursión será:

```javascript
function cuentaAtras (numero) {
if (numero === 0) {
    return; // si es 0 no devuelve ningún valor
}
console.log(numero);
return cuentaAtras(numero - 1);
};
```

Esto es lo que sucede:

    1// La entrada actual es 5
    2// Es 5 igual a 0 ?
    3// No, entonces imprime 5 en la consola.
    4// Se llama asi misma de nuevo con el numero - 1 O 5 - 1;
    5// La entrada principal es 4
    6// Es 4 igual a 0 ?
    7// No, entonces imprime 4 en la consola.
    8// Repite hasta que la entrada sea 0, y asi la función deja de llamarse a si misma cuando lleg al caso base (numero === 0).
    
```javascript
function cuentaAtras (3) {
if (numero === 0) {
    return; 
}
console.log(3);
return cuentaAtras(3 - 1);
	  cuentaAtras (2) {
	    if (numero === 0) {
		return; 
	    }
	    console.log(2);
	    return cuentaAtras(2 - 1);
		      cuentaAtras (1) {
			if (numero === 0) {
			    return; 
			}
			console.log(1);
			return cuentaAtras(1 - 1);
				  cuentaAtras (0) {
				    if (numero === 0) {
					return; 
				    }
		 //no se ejecuta    console.log(1);
		 //no se ejecuta    return cuentaAtras(1 - 1);
};
```

2. Cuenta regresiva desde un número dado hasta el número más pequeño, restando 1 cada vez que pasa por el bucle, pero devolviendo un array.


Dado el número 5, la salida será:

    // [1, 2, 3, 4, 5]

Esta función con recursión será:

    function countup(n) {
      if (n < 1) {
        return [];
      } else {
        const countArray = countup(n - 1);
        countArray.push(n);
        return countArray;
      }
    }
    console.log(countup(5));


Esto es lo que sucede:

    1// La entrada actual es 5
    2// Es 5 menor que 1 ?
    3// No, entonces: c
        const countArray = countup(5-1)
        count.Array.push(5)
        
    4// Se llama asi misma de nuevo con el numero - 1 O 5 - 1;
    5// La entrada principal es 4
    6// Es 4 igual a 0 ?
    7// No, entonces imprime 4 en la consola.
    8// Repite hasta que la entrada sea 0, y asi la función deja de llamarse a si misma cuando lleg al caso base (numero === 0).

```
function countup(5) {
      if (5 < 1) {
        return [];
      } else {
        const countArray = countup(5 - 1);
                function countup(4) {
                      if (4 < 1) {
                            return [];}
                      else {
                            const countArray = countup(4 - 1);
                                    function countup(3) {
                                          if (3 < 1) {
                                            return [];
                                          } 
                                          else {
                                            const countArray = countup(3 - 1);
                                                    function countup(2) {
                                                          if (2 < 1) {
                                                            return [];
                                                          } 
                                                          else {
                                                            const countArray = countup(2 - 1);
                                                                    function countup(1) {
                                                                          if (1 < 1) {
                                                                            return [];
                                                                          } 
                                                                          else {
                                                                            const countArray = countup(1 - 1);
                                                                            function countup(0) {
                                                                                  if (0 < 1) {
                                                                            #1         return [];
                                                                                  } 
                                                                                  else {
                                                                                    const countArray = countup(0 - 1);

                                                                                    countArray.push(0);
                                                                                    return countArray;
                                                                                  }
                                                                             }
                                                                    #2      countArray.push(1);
                                                                    #3      return countArray;
                                                                          }
                                                                     }
                                                      4#     countArray.push(2);
                                                      5#     return countArray;
                                                          }
                                                     }
                                      5#    countArray.push(3);
                                      6#    return countArray;
                                          }
                                     }
                        7#   countArray.push(4);
                        8#   return countArray;
                      }
                }
   9#   countArray.push(5);
   10#  return countArray;
      }
}

```



3. Función factorial.

Dado el número 5, la salida será:
    
    // 120
    
Esta función con recursión será:

    function factorial(n) {
        if (n<=1) return 1; 
        return n* factorial(n-1);
    }


Esto es lo que sucede:

    1// La entrada actual es 5
    2// Es 5 menor o igual a 1 ?
    3// No, Ok entonces devuelve 5 * factorial(5-1);
    4// Se llama asi misma de nuevo con el numero - 1 ó 5 - 1;
    5// La entrada principal es 4
    6// Es 4 menor o igual a 1 ?
    7// No, Ok entonces devuelve 4 * factorial(4-1);
    8// Se llama asi misma de nuevo con el numero - 1 ó 4 - 1;
    5// La entrada principal es 3
    6// Es 3 menor o igual a 1 ?
    7// No, Ok entonces devuelve 3 * factorial(3-1);
    // Ya tenemos 5 * 4 * 3 * ..
    8// Repite hasta que la entrada sea 0, y asi la función deja de llamarse a si misma cuando llega al caso base (numero === 0).
    // Devuelve 5 * 4 * 3 * 2 * 1

![recursion_factorial](imagenes/recursividad_fun_factorial.png)


4. bauuuba

```javascript

function bauuuba(n) {
if (n < 1) {
    return '';
} else {
    var str = bauuuba(n - 1);
    str = str +'bauuuba ';
    return str;
}
}

function bauuuba(2) {
  if (2 < 1) {
      return '';
  } else {
      var str = bauuuba(2 - 1);
		    function bauuuba(1) {
		      if (1 < 1) {
			  return '';
		      } else {
			  var str = bauuuba(1 - 1);
					function bauuuba(0) {
					  if (0 < 1) {
					      return '';
					  } else {
					      var str = bauuuba(0 - 1);
					      str = str +'bauuuba ';
					      return str;
					  }
					  }
			  str = str +'bauuuba ';
			  return str;
		      }
		      }
      str = str +'bauuuba ';
      return str;
  }
  }
```

# Expresiones Regulares    RegExp

## Web

[regex101.com](https://regex101.com/)

### Instanciación

Normalmente  son una constante:

    const expReg = / ___ /
    const expReg = RegExp (" ___ ")
    
## Búsqueda de coincidencias

El método `exec()` ejecuta una busqueda sobre las coincidencias de una expresión regular en una cadena especifica. 

Devuelve el resultado como **array**, o **null**.

    expReg.exec(cadena)
    
El método `test()` ejecuta la búsqueda de una ocurrencia entre una expresión regular y una cadena especificada. 

Devuelve `true` o `false`.

    regexObj.test(cadena)

El método find

    arr.find(elem => {return elem.length <= 3})

El método filter

    arr.filter (elem => elem.length <= 3)

## Mensaje de error

El método `console.assert()` escribe un mensaje de error si la  assertion es `false`. Si la aserción es `true`, nada ocurre. 

## Aserciones

`^` Coincide con el comienzo de la entrada.

`$` Coincide con el final de la entrada.

## Clases de caracteres

`\w  `  Equivale a [A-Za-z0-9_] Busca cualquier caracter alfanumérico del alfabeto latino básico,

`\W  `  Equivale a [^A-Za-z0-9_]    Busca cualquier caracter que no sea un caracter de palabra del alfabeto latino básico. Coincide con %,&, $ ...

`\d`    Equivale a [0-9] 

`\d`    Equivale a [^0-9]   Busca cualquier caracter que no sea un dígito

`\s`    Espacio en blanco

`\n`    Salto de línea

`.`     Cualquier caracter

## Cuantificadores

`x{n}` Donde "n" es un número entero positivo, concuerda exactamente con "n" apariciones del elemento "x" anterior.

`x{n,m}` Coincide con al menos "n" y como máximo "m" apariciones del elemento "x" anterior.

`?` 0 ó 1 Se detendrá tan pronto como encuentre una coincidencia

`*` 0 ó más

`+` Uno o más

## Ejemplos

`^(\d{3}\s){2}\d{3}$`  Coincide con  123-456-789

`^(\d{3}(\s|-|\/)){2}\d{3}$`  Coincide con  123-456-789 , 123/456/789 ó 123 456 789

`/a+e*i?/`  Coincide con a, ae , aei, aaei, aaeei, ...

`^\d{8}(-|\s)?[a-zA-Z]$`    Coincide con 54733151M, 54733151 m, 54733151-M

    ^\d{8} Comienza con 8 dígitos
    
    (-|\s)? Lleva 0 ó 1 de '-' ó ' '
    
    [a-zA-Z]$   Termina con una letra minúscula o mayúscula

const comprobarRegExp = () => {

    /*

    Comprobación de un email

    */

    \/\/1ºDeclaramos la expReg

    const expReg = RegExp("")
