# JAVASCRIPT

`Math.floor(Math.random() * (max - min + 1)) + min`

Devuelve un número entre max y min, incluyéndolos

## Recursión

Recursión es cuando una función sigue llamándose a sí misma, hasta que ya no tiene que hacerlo.

Piensa en recursión como una carrera en un circuito. Es como correr la misma pista una y otra vez, pero las vueltas se hacen más pequeñas cada vez. Eventualmente, correrás la vuelta más pequeña y se terminará la carrera.

Lo mismo con la recursión: La función sigue llamándose a sí misma, cada vez con una entrada menor hasta que eventualmente se detiene.

Pero, la función no decide por sí misma cuando parar. Nosotros le decimos cuando. Nosotros le damos a la función una condición conocida como `caso base`.

### Ejemplos de recursión

    function factorial(n){
      var resultado = 1;
      for(var i=n; i>=1; i--){
        resultado = resultado * i;
      }
      return resultado;
    }

Esta función devuelve el factorial de n haciendo uso de un bucle for. Sin embargo hay otra forma de hacerlo sin necesidad de usar ninguna estructura de bucle que es mediante recursividad. Esta versión de la función hace exactamente lo mismo, pero es más corta, más simple y más elegante:

    function factorial(n) {
        if (n<=1) return 1; // Esta condición es el caso base, cuando se cumpla se terminará la función.
        return n* factorial(n-1);
    }
    
Es decir, cuando llamamos a la primera función, ésta se llama a sí misma pero pasándole un número menos y así sucesivamente hasta llegar a la última (la que recibe un 1 y por lo tanto deja de hacer más llamadas). En el momento en el que alguna de ellas **empieza a devolver valores "hacia atrás"**, regresa la llamada a cada una de ellas, los valores devueltos se van multiplicando por el parámetro original en cada una de ellas, hasta llegar arriba del todo en el que la primera llamada devuelve el valor buscado.



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

`\w  `  Equivale a [A-Za-z0-9_] Busca cualquier caracter alfanumérico del alfabeto latino básico,

`\W  `  Equivale a [^A-Za-z0-9_]    Busca cualquier caracter que no sea un caracter de palabra del alfabeto latino básico. Coincide con %,&, $ ...

`\d`    Equivale a [0-9] 

`\d`    Equivale a [^0-9]   Busca cualquier caracter que no sea un dígito

`\s`    Espacio en blanco

`.`     Cualquier caracter

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

const comprobarRegExp = () => {

    /*

    Comprobación de un email

    */

    \/\/1ºDeclaramos la expReg

    const expReg = RegExp("")

    
