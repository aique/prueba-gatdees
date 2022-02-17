# Estructura de directorios

## Evaluables

En los siguientes directorios se encuentra la programación del propio módulo
en sí, los cuales cual deberán ser inspeccionados para medir la calidad del producto
entregado, y modificados en caso de necesitar ampliaciones.

### src

Ficheros fuente con el código de la aplicación.

### tests

Test realizados durante el desarrollo de la aplicación, al margen de los
proporcionados por la Nueva República.

### doc

Documentación.

También se encuentra ubicado en el directorio `tests/bin` los proporcionados
por la misma.

## No evaluables

Los ficheros contenidos en la siguiente lista son poco relevantes o pertenecientes
en su mayoría a código de terceros.

### bin

Ejecutables. El más relevante es el fichero `deploy`, encargado de lanzar la aplicación.

### config

Ficheros de configuración. El más relevante es el fichero `services.yaml`, en el que se
deberán añadir los nuevos protocolos a la factoría de creación.

### docker

Ficheros de configuración para Docker.

### public

Punto de entrada de la aplicación.

### var

Ficheros de log y caché utilizados por Symfony.

### vendor

Dependencias.
