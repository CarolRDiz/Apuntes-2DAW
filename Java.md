# Serialización

La serialización es la conversión del **estado de un objeto** en un **flujo de bytes**; la **deserialización** hace lo contrario. Dicho de otra manera, 
la serialización es la conversión de un **objeto Java** en un **flujo estático (secuencia) de bytes**, que luego podemos guardar en una **base de datos** 
o transferir a través de una **red**.

Las clases que son elegibles para la serialización deben **implementar** una interfaz de marcador especial, **Serializable**.

La JVM asocia un **número de versión** (largo) con cada clase serializable. Lo usamos para verificar que los objetos guardados y cargados tengan los mismos 
atributos y, por lo tanto, sean compatibles en la serialización.

La mayoría de los IDE pueden generar este número automáticamente y se basa en el nombre de la clase, los atributos y los modificadores de acceso asociados. Cualquier cambio da como resultado un número diferente y puede causar una InvalidClassException.

Si una clase serializable no declara un serialVersionUID, la JVM generará uno automáticamente en tiempo de ejecución. Sin embargo, se recomienda encarecidamente que cada clase declare su serialVersionUID, ya que el generado depende del compilador y, por lo tanto, puede generar InvalidClassExceptions inesperadas.
