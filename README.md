# ELOQUENT

Cuando se usa eloquent para realizar consultas, este sigue una convención para identificar que x módelo debe
conectarse con x tabla de la base de datos, por convención se tiene establecido que los nombres de los módelos
deben estar en singular y el nombre de las tablas en plurar, cuando no se quiera seguir esta convención hay una
solución para indicarle al módelo que tabla de la db debe conectarse
- se agrega en el módelo
```php
protected $table = 'nombre_tabla';
```

> Es importante resaltar que todos los métodos que se usaron en query builder, son aplicables támbien en eloquent

