# Visualizaciones de posts sin plugins

Funcionalidad que permite contar el numero de visitas en los posts sin usar plugins de terceros. El valor se guarda en un custom field, lo que significa que es recomendable crear previamente el custom field con el mismo nombre del código o bien con otro nombre pero reemplazando el valor del código. 

En mi caso he usado el plugin advanced custom field y al final he deshabilitado la opción de que el campo sea editable para que el usuario no pueda editar ese valor.

## Cómo usarlo

1. Añade el código que esta en el functions.php en tu `functions.php` de tu tema activo.
2. Crear tu custom field.
3. Añade el código que esta en el single.php en tu `single.php` que se encargará de procesar la lógica.
