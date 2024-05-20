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

## Creando registros a partir de módelos
Para crear registros a partir de módelos se debe instanciar el módelo
```php
$user = new User();
```
posteriormente se asignan los valores a los diferentes campos o atributos con los cuales cuenta dicho objeto
```php
$user->name = 'Juan';
$user->email = 'juan@gmail.com';
$user->password = bcrypt('123456');
```
posteriormente se guarda el registro
> Es importante resaltar que si se pide que se retorne la información del registro que se acaba de crear a partir del módelo, en este caso el sistema no retornará ni password ni remember_token ya que por cuestiones de seguridad, se especifico en el módelo que los valores para dichos campos se deben de ocultar o de omitir al momento de que se requiera acceder a la información del usuario, esto esta definido como:
```php
/**
 * The attributes that should be hidden for serialization.
 *
 * @var array<int, string>
 */
protected $hidden = [
    'password',
    'remember_token',
];
```
