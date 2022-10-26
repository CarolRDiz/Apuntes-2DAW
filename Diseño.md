#Ancla en html
...

#Clases

`class="class1 class2"` Las clases se espacian para separarlas

# Especificidad

Cuanto más elementos tenga el selector, más específico es, y mayor prioridad tiene, sin verse afectado por la lectura en cascada.

# Selectores

`*` Selector universal

e `,` e Selecciona ambos

**Selector de clase**

`.classname`  el.classname

**Selector de id**

`#idname`

**Selectores de atributo**

`[attr]`        Selecciona los elementos que tienen el atributo attr.
  
`[attr=value]`  Selecciona los elementos cuyo atributo attr tenga exactamente el valor value.

`[attr~=value]` Selecciona los elementos cuyo atributo attr tenga por valor una lista de palabras separadas por espacios,    una de las cuales sea value.

`[attr|=value]` Selecciona los elementos cuyo atributo attr tenga exactamente el valor value o empiece por value seguido de un guión -

`[attr^=value]`   Selecciona los elementos cuyo atributo attr tenga un valor prefijado por value.

`[attr$=value]`   Selecciona los elementos cuyo atributo attr cuyo valor tiene el sufijo (seguido) de value.

`[attr*=value]`   Selecciona los elementos cuyo atributo attr tenga un valor que contenga value.

**Combinadores**

**Combinador de hermanos adyacentes**

`A + B`   El combinador + selecciona hermanos adyacentes. Esto quiere decir que el segundo elemento sigue directamente al primero y ambos comparten el mismo elemento padre.

**Combinador general de hermanos**

`A ~ B`   El combinador ~ selecciona hermanos. Esto quiere decir que el segundo elemento sigue al primero (no necesariamente de forma inmediata) y ambos comparten el mismo elemento padre.




