## Expresiones Regulares    RegExp

### Web

**regex101.com**

### Instanciación

Normalmente  son una constante:

    const expReg = / ___ /
    const expReg = RegExp (" ___ ")
    
### Búsqueda de coincidencias

El método `exec()` ejecuta una busqueda sobre las coincidencias de una expresión regular en una cadena especifica. 

Devuelve el resultado como **array**, o **null**.

    expReg.exec(cadena)
    
El método `test()` ejecuta la búsqueda de una ocurrencia entre una expresión regular y una cadena especificada. 

Devuelve `true` o `false`.

    regexObj.test(cadena)
    
### Mensaje de error

El método `console.assert()` escribe un mensaje de errorsi la  assertion es `false`. Si la aserción es `true`, nada ocurre. 

### Aserciones

`^` Coincide con el comienzo de la entrada.
`$` Coincide con el final de la entrada.

### Clases de caracteres

`\w  `
`\W  `
`\d`    Números,  [0-9]
`\s`    Espacio en blanco

### Cuantificadores

`x{n}` Donde "n" es un número entero positivo, concuerda exactamente con "n" apariciones del elemento "x" anterior.

`x{n,m}` Coincide con al menos "n" y como máximo "m" apariciones del elemento "x" anterior.

`?` 0 ó 1 Se detendrá tan pronto como encuentre una coincidencia

`*` 0 ó más

`+` Uno o más

### Ejemplos

`/^(\d{3}\s){2}\d{3}$`  Coincide con  123-456-789

`^(\d{3}(\s|-|\/)){2}\d{3}$`  Coincide con  123-456-789 , 123/456/789 ó 123 456 789

`/a+e*i?/`  Coincide con a, ae , aei, aaei, aaeei, ...

`^\d{8}(-|\s)?[a-zA-Z]$`    Coincide con 54733151M, 54733151 m, 54733151-M

    ^\d{8} Comienza con 8 dígitos
    
    (-|\s)? Lleva 0 ó 1 de '-' ó ' '
    
    [a-zA-Z]$   Termina con una letra minúscula o mayúscula


