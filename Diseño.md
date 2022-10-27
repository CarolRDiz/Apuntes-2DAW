#Flexbox
[Maquetación con flexbox](https://www.adictosaltrabajo.com/2018/02/14/maquetacion-con-flexbox/)

contenedor {
  display: flex;
  flex-direction: row | column; //Eje primario: eje_x(row) | eje_y(column)
  //Alineación en el eje primario
  justify-content: flex-start | flex-end | center | space-between | space-around | space-evenly; 
  //Alineación en el eje secundario
  align-items: flex-start | flex-end | center | baseline | stretch; 
  
  width: 100%;
  height: 100vh;
  padding: 0.5rem;
  background-color: blanchedalmond;
}

#Ancla en html
...

# Clases

`class="class1 class2"` Las clases se espacian para separarlas

# Especificidad

Cuanto más elementos tenga el selector, más específico es, y mayor prioridad tiene, sin verse afectado por la lectura en cascada.

![Especificidad](imagenes/especificidad.png)

# Selectores

![Selectores](https://developer.mozilla.org/es/docs/Web/CSS/CSS_Selectors)

`*` Selector universal

e `,` e Selecciona ambos


## Selector de clase

`.classname`  el.classname

## Selector de id

`#idname`

## Selectores de atributo

`[attr]`        Selecciona los elementos que tienen el atributo attr.
  
`[attr=value]`  Selecciona los elementos cuyo atributo attr tenga exactamente el valor value.

`[attr~=value]` Selecciona los elementos cuyo atributo attr tenga por valor una lista de palabras separadas por espacios,    una de las cuales sea value.

`[attr|=value]` Selecciona los elementos cuyo atributo attr tenga exactamente el valor value o empiece por value seguido de un guión -

`[attr^=value]`   Selecciona los elementos cuyo atributo attr tenga un valor prefijado por value.

`[attr$=value]`   Selecciona los elementos cuyo atributo attr cuyo valor tiene el sufijo (seguido) de value.

`[attr*=value]`   Selecciona los elementos cuyo atributo attr tenga un valor que contenga value.

## Combinadores

**Combinadores descendientes**

`A B`     El combinador (espacio) selecciona los elementos que son descendientes del primer elemento.

**Combinador de hijo**

`A > B`   El combinador > selecciona los elementos que son hijos directos del primer elemento.

**Combinador de hermanos adyacentes**

`A + B`   El combinador + selecciona hermanos adyacentes. Esto quiere decir que el segundo elemento sigue directamente al primero y ambos comparten el mismo elemento padre.

**Combinador general de hermanos**

`A ~ B`   El combinador ~ selecciona hermanos. Esto quiere decir que el segundo elemento sigue al primero (no necesariamente de forma inmediata) y ambos comparten el mismo elemento padre.

## Pseudoclases

![Pseudoclases](https://developer.mozilla.org/es/docs/Web/CSS/Pseudo-classes)

Palabra clave que se añade a los selectores y que especifica un estado especial del elemento seleccionado.

`selector:pseudoclase { propiedad: valor; }`

![nth-child()](https://developer.mozilla.org/es/docs/Web/CSS/:nth-child)

## Pseudoelementos

![Pseudoelementos](https://developer.mozilla.org/es/docs/Web/CSS/Pseudo-elements)

Permiten añadir estilos a una parte concreta del documento.

`selector::pseudo-elemento { propiedad: valor; }`

## Diferencia entre > y :first-child



