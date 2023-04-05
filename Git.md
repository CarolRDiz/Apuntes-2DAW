# git init

El comando git init crea un nuevo repositorio de Git. Puede utilizarse para convertir un proyecto existente y sin versión en un repositorio de Git, o para inicializar un nuevo repositorio vacío. La mayoría de los demás comandos de Git no se encuentran disponibles fuera de un repositorio inicializado, por lo que este suele ser el primer comando que se ejecuta en un proyecto nuevo.

# git remote 

El comando git remote te permite crear, ver y eliminar conexiones con otros repositorios.

## origen remoto

Al clonar un repositorio con `git clone`, se crea automáticamente una conexión remota llamada “`origin`” (origen) que apunta al repositorio clonado. Esto resulta útil para los desarrolladores que crean una copia local de un repositorio central, ya que permite incorporar cambios de nivel superior o publicar confirmaciones locales de forma sencilla.

Conectamos nuestro repositorio local a uno remoto:

`git remote add origin http://host/path/to/repo.git`

# git clone

Es igual a hacer `git init` y `git remote add origin http://host/path/to/repo.git`

# fork

Se encarga de la creación de una copia de un repositorio en la cuenta de usuario.

## remoto upstream

git remote add upstream http://host/path/to/repo.git

# push, pull

push: subir cambios
pull: incorporar cambios

# git stash

Almacena temporalmente (o guarda en un stash) los cambios que hayas efectuado en el código en el que estás trabajando para que puedas trabajar en otra cosa y, más tarde, regresar y volver a aplicar los cambios más tarde. Guardar los cambios en stashes resulta práctico si tienes que cambiar rápidamente de contexto y ponerte con otra cosa, pero estás en medio de un cambio en el código y no lo tienes todo listo para confirmar los cambios.

Comandos:
- `git stash save “mensaje”`
- `git stash list`
- `git stash pop stash@{2}`

# commit

# rama

Crear rama: `git branch \<nombre\>`

**Head** apunta a la rama en la que estás.

Cambiar de una rama a otra: `git checkout \<nombre\>`

# reset

Elimina los últimos commits del historial.

- soft: se mantienen los cambios pendientes, ficheros modificados o preparados.
- hard: lo contrario de hard

## revert (reverse commit)

Invierte los cambios introducidos y añade un nuevo commit con el contenido inverso resultante.

# Flujos de trabajo

- Centralizado
- Feature Branch
- Forking
- GitFlow

