# La integración y la distribución continuas (CI/CD)

## CI, integración continua
Es un proceso de automatización para los desarrolladores. 
El éxito de la CI implica que se diseñen, prueben y combinen los cambios nuevos en el código de una aplicación 
con regularidad en un repositorio compartido. Supone una solución al problema de que se desarrollen demasiadas 
divisiones de una aplicación al mismo tiempo, que luego podrían entrar en conflicto entre sí.

## CD, distribución o la implementación continuas

Ambos se refieren a la automatización de las etapas posteriores del proceso, pero a veces se usan por separado 
para explicar hasta dónde llega la automatización.

La `distribución continua` se refiere a que los cambios que implementa un desarrollador en una aplicación se 
someten a **pruebas automáticas de errores** y se cargan en un repositorio (como GitHub o un registro de contenedores), 
para que luego el equipo de operaciones pueda implementarlos en un entorno de producción en vivo. Es una solución 
al **problema de la poca supervisión y comunicación** entre los equipos comerciales y de desarrollo. Con ese fin, el 
propósito de la distribución continua es garantizar que **la implementación del código nuevo se lleve a cabo con el 
mínimo esfuerzo.**

La `implementación continua` hace referencia al **lanzamiento automático de los cambios** que implementa el desarrollador 
**desde el repositorio hasta la producción**, para ponerlos a **disposición de los clientes**. Así ya no se sobrecarga a 
los equipos de operaciones con procesos manuales que retrasan la distribución de las aplicaciones. Con este tipo de 
implementación, se aprovechan los beneficios de la distribución continua y se automatiza la siguiente etapa del proceso.
