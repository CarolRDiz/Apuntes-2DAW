# JAVASCRIPT

Instalar Node.js

    Node.js es un entorno en tiempo de ejecución multiplataforma, de código abierto, para la capa del servidor
    
    basado en el lenguaje de programación JavaScript, asíncrono, con E/S de datos en una arquitectura orientada 
    
    a eventos y basado en el motor V8 de Google.
    
NPM

En la terminal de un proyecto:

`npm init`

`npm install eslint --save dev`
    
Configuración:

No estamos usando framework
TYpescript no
YOur code run: browser
Style for your proyect: guide
style guide: 
INstall now: yes
...
    
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

Instalar Extensión Eslint

Extensión Live Server de Ritwick Dey para actualizar la página html automáticamente.
    Una vez instalada, podemos pulsar el botón de abajo a la derecha que pone "Go live" para correr un Live server

Extensión JavaScript (ES6) code snippets de charalampos karypidis

`Math.floor(Math.random() * (max - min + 1)) + min`

Devuelve un número entre max y min, incluyéndolos

## DOM

Document object mode



## Recursión

Recursión es cuando una función sigue llamándose a sí misma, hasta que ya no tiene que hacerlo.

Piensa en recursión como una carrera en un circuito. Es como correr la misma pista una y otra vez, pero las vueltas se hacen más pequeñas cada vez. Eventualmente, correrás la vuelta más pequeña y se terminará la carrera.

Lo mismo con la recursión: La función sigue llamándose a sí misma, cada vez con una entrada menor hasta que eventualmente se detiene.

Pero, la función no decide por sí misma cuando parar. Nosotros le decimos cuando. Nosotros le damos a la función una condición conocida como `caso base`.

### Ejemplos de recursión

1. Cuenta regresiva desde un número dado hasta el número más pequeño, restando 1 cada vez que pasa por el bucle.

Dado el número 5, la salida será:

    // 5
    // 4
    // 3
    // 2
    // 1
    
Esta función con recursión será:

    function cuentaAtras (numero) {
        if (numero === 0) {
            return; // si es 0 no devuelve ningún valor
        }
        console.log(numero);
        return cuentaAtras(numero - 1);
    };

Esto es lo que sucede:

    1// La entrada actual es 5
    2// Es 5 igual a 0 ?
    3// No, entonces imprime 5 en la consola.
    4// Se llama asi misma de nuevo con el numero - 1 O 5 - 1;
    5// La entrada principal es 4
    6// Es 4 igual a 0 ?
    7// No, entonces imprime 4 en la consola.
    8// Repite hasta que la entrada sea 0, y asi la función deja de llamarse a si misma cuando lleg al caso base (numero === 0).

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

El método find

    arr.find(elem => {return elem.length <= 3})

El método filter

    arr.filter (elem => elem.length <= 3)

### Mensaje de error

El método `console.assert()` escribe un mensaje de error si la  assertion es `false`. Si la aserción es `true`, nada ocurre. 

### Aserciones

`^` Coincide con el comienzo de la entrada.

`$` Coincide con el final de la entrada.

### Clases de caracteres

`\w  `  Equivale a [A-Za-z0-9_] Busca cualquier caracter alfanumérico del alfabeto latino básico,

`\W  `  Equivale a [^A-Za-z0-9_]    Busca cualquier caracter que no sea un caracter de palabra del alfabeto latino básico. Coincide con %,&, $ ...

`\d`    Equivale a [0-9] 

`\d`    Equivale a [^0-9]   Busca cualquier caracter que no sea un dígito

`\s`    Espacio en blanco

`\n`    Salto de línea

`.`     Cualquier caracter

### Cuantificadores

`x{n}` Donde "n" es un número entero positivo, concuerda exactamente con "n" apariciones del elemento "x" anterior.

`x{n,m}` Coincide con al menos "n" y como máximo "m" apariciones del elemento "x" anterior.

`?` 0 ó 1 Se detendrá tan pronto como encuentre una coincidencia

`*` 0 ó más

`+` Uno o más

### Ejemplos

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

    
