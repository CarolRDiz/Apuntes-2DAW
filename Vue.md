# VUE

- [Resumen](https://youtu.be/nhBVL41-_Cw)
- [Curso](https://youtu.be/qZXt1Aom3Cs)
- [Vue-form-generator](#Vue-form-generator)

## Crear aplicación VUE:

	npm init vue@latest
	cd <your-project-name>vbavba


	npm install
	npm run dev
	npm run build
	
## Usar Vue desde CDN:
```html
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
```
## Instancia de la aplicación:
```javascript
const app = createApp({
  /* root component options */
})
```
## Montar la app:
```html
<div id="app"></div>
```
```javascript
app.mount('#app')
```
## Instancias de la aplicación  múltiples:
```javascript
const app1 = createApp({
  /* ... */
})
app1.mount('#container-1')
const app2 = createApp({
  /* ... */
})
app2.mount('#container-2')
```
## Partes básicas de un componente de Vue:

- Template:
	-Puede usar los valores de data entre {{}}
- Script:
	- data : la función devuelve un objeto
	- computed : 
- Style:
	- style scoped : los estilos solo pertenecerán a ese componente

	
## Renderizar listas:
`v-for`
```javascript
data() {
  return {
    items: [{ message: 'Foo' }, { message: 'Bar' }]
  }
}
```
```
<li v-for="item in items">
  {{ item.message }}
</li>
```
## Interpolación de texto:

	<span>Message: {{ msg }}</span>

## HTML crudo:

- v-html:
```
<span v-html="rawHtml"></span>

//rawHTML = "<span style="color: red">This should be red.</span>"
```

## Vinculación dinámica de múltiples atributos

```javascript
data() {
  return {
    objectOfAttrs: {
      id: 'container',
      class: 'wrapper'
    }
  }
}
```
```
<div v-bind="objectOfAttrs"></div>
```
## Usar expresiones Javascript

	{{ number + 1 }}

	{{ ok ? 'YES' : 'NO' }}

	{{ message.split('').reverse().join('') }}

	<div :id="`list-${id}`"></div>

## Solo expresiones

```
<!-- this is a statement, not an expression: -->
{{ var a = 1 }}

<!-- flow control won't work either, use ternary expressions -->
{{ if (ok) { return message } }}
```
## Calling Functions
Es posible llamar a un método dentro de una expresión vinculante:
```javascript
<span :title="toTitleDate(date)">
  {{ formatDate(date) }}
</span>
```
Estas funciones se llamaran cada vez que el componente se actualize.

## WATCH

Para activar una función cada vez que cambia una propiedad reactiva.
```javascript
<script>
export default {
  data() {
    return {
      question: 'Pregunta inicial',
    }
  },
  watch: {
    question(value, oldvalue) {
      console.log(value, oldvalue)
      if (!value.includes('?')) return
      console.log('Se ha detectado una ?')

      // TODO: Llamada HTTP
    },
  },
}
</script>
```
## Directivas:

Prefijadas con `v-`

- `v-html`: imprimir HTML.
- `v-bind`: para dar valores a los atributos.

		<div v-bind:id="dynamicId"></div>
		// ATAJO
		<div :id="dynamicId"></div>
- `v-if`:

		<p v-if="seen">Now you see me</p>
		It would remove / insert the <p> element based on the truthiness of the value of the expression seen
- `v-model`:
	
		<input v-model="message" placeholder="edíteme">
		<p>El mensaje es: {{ message }}</p>
		//
		data() {
		    return {
		      question: 'Pregunta inicial',
		    }
	  	},
- `v-for`
- `v-on`
- `v-slot`

- Atributos Booleanos:
	- `disabled`:
```
<button :disabled="isButtonDisabled">Button</button>
```
### Argumentos:
- `v-bind:href="url"`:

		<a :href="url"> ... </a>

- `v-on:click="doSomething">`:
	
		<a @click="doSomething"> ... </a>
		
### Argumentos dinámicos: expresiones Javascript en los argumentos.
- `v-bind:[attributeName]="url"`:

		<a :[attributeName]="url"> ... </a>

- ` v-on:[eventName]="doSomething">`:

		<a @[eventName]="doSomething">

		Si el valor de eventName es "focus", v-on:[eventName]será equivalente a v-on:focus.
### Modificadores:
- `.prevent` modifier indica a v-on que llame aevent.preventDefault():

		<form @submit.prevent="onSubmit">...</form>

## Fundamentos de reactividad

## Propiedades
Header.vue:
```javascript
<template>
    <header>
        <h1>{{title}}</h1>
    </header>
</template>
<script>
    export default {
        name: 'Header',
        props:{
            'title': String,
        }
    }
</script>
```
App.vue:
```javascript
  <Header title="Loquesea"/>
```
## Declarar métodos
`methods:{}`
```javascript
export default {
  data() {
    return {
      count: 0
    }
  },
  methods: {
    increment() {
      this.count++
    }
  },
  mounted() {
    // methods can be called in lifecycle hooks, or other methods!
    this.increment()
  }
}

<button @click="increment">{{ count }}</button>
```
```javascript
export default {
  data() {
    return {
      obj: {
        nested: { count: 0 },
        arr: ['foo', 'bar']
      }
    }
  },
  methods: {
    mutateDeeply() {
      // these will work as expected.
      this.obj.nested.count++
      this.obj.arr.push('baz')
    }
  }
}
```
## DOM Update Timing 

To wait for the DOM update to complete after a state change, you can use the nextTick() global API:
```javascript
import { nextTick } from 'vue'

export default {
  methods: {
    increment() {
      this.count++
      nextTick(() => {
        // access updated DOM
      })
    }
  }
}
```
## Importar/Exportar

Para usar los componentes hay que importarlos y exportarlos.
```javascript
<script>
	import XComponente from './xx/XComponente.vue'
	export default{
		name: 'App',
		componente: {
			XComponente
		}
```
## Pasar datos entre componentes

[Documentación](https://www.smashingmagazine.com/2020/01/data-components-vue-js/)

### Emit

[Guía](https://learnvue.co/tutorials/vue-emit-guide)

Course.vue:
`@click="$emit('delete-course', course.id)"`
```javascript
<template>
    <i @click="$emit('delete-course', course.id)"
        class="fas fa-times">
    </i>
</template>

<script>
	...
	emits: ['delete-course'],
```
Courses.vue:
`@delete-course="$emit('delete-course', course.id)"`
```javascript
<template>
    <Course @delete-course="$emit('delete-course', course.id)"
            :course="course" />
</template>

<script>
	...
	emits: ['delete-course'],
```
App.vue:
`@delete-course="deleteCourse"`
```javascript
<template>
    <Courses @delete-course="deleteCourse"
  :courses="courses" />
</template>

<script>
	...
	deleteCourse(id){
	      console.log('Borrar: '+id);
    	}
```
## Filters

[Youtube Tutorial](https://www.youtube.com/watch?v=RPNjpkZgJag)

## Axio

## Vue form generator

`npm install vue-form-generator`

[Docu](https://styde.net/generar-formularios-en-vue-js/)



