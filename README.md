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

## Asignación Masiva
La asignación masiva en Laravel es una técnica que permite asignar valores a múltiples atributos de un modelo de forma simultánea 
utilizando un solo arreglo de datos. Esto simplifica la creación y actualización de registros en la base de datos, especialmente 
cuando se trabaja con grandes cantidades de datos.

### Protección contra la asignación masiva
Para protegerse contra la asignación masiva inadvertida o malintencionada, Laravel utiliza dos propiedades en los modelos 
Eloquent: fillable y guarded.

#### Propiedad fillable
La propiedad fillable define una lista blanca de atributos que pueden ser asignados masivamente. Por ejemplo:
```php
class User extends Model
{
    protected $fillable = ['name', 'email', 'password'];
}
```
Con esta configuración, solo los atributos name, email y password podrán ser asignados masivamente. Cualquier intento 
de asignar otros atributos será ignorado.

#### La propiedad guarded 
Define una lista negra de atributos que no pueden ser asignados masivamente. Es el enfoque inverso a fillable. Por ejemplo:
```php
class User extends Model
{
    protected $guarded = ['is_admin'];
}
```
Con esta configuración, cualquier atributo excepto is_admin podrá ser asignado masivamente.

### Ejemplo
- Creación de registro sin emplear asignación masiva
```php
$user = new User();
$user->name = 'John Doe';
$user->email = 'john@example.com';
$user->password = bcrypt('password');
$user->save();
```
- Usando asignación masiva, el mismo código puede reducirse a:
```php
$user = User::create([
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'password' => bcrypt('password')
]);

```

## Conclusión
La asignación masiva en Laravel es una herramienta poderosa para simplificar la creación y actualización de modelos 
con múltiples atributos. Sin embargo, es crucial usar fillable o guarded para proteger la aplicación contra 
vulnerabilidades de seguridad. Al definir explícitamente qué atributos pueden ser asignados masivamente, aseguras 
que tu aplicación maneje los datos de manera segura y eficiente.

# Generar datos falsos
[faker](https://fakerphp.org/)

# Relaciones

> Nota: en las relaciones de uno a uno y uno a muchos, el belongsto se coloca en el módelo donde va la llave foranea

## Relación Uno a Uno
Si se tiene una relación de usuarios con perfiles, se establece que un usuario puede tener solo un perfil y
dicho perfil solo puede estar asignado a un usuario, con esto definimos lo siguiente para la creación de las
relaciones en los módelos correspondientes:
- Módelo users
```php
public function profile() {
    return $this->hasOne(Profile::class);
}
```
- Módelo profiles
```php
public function user() {
    return $this->belongsTo(User::class);
}
```
> Nota: es de resaltar que la llave foranea se establecio en la tabla profiles como user_id

## Relación Uno a Muchos
Se tiene una relación de categorías con posts, donde una categoría puede estar en muchos posts, y un post
solo puede tener una categoría, por ello se establece una relación uno a muchos
- Módelo Category
```php
public function posts(){
    return $this->hasMany(Post::class);
}
```
- Módelo Post
```php
public function category(){
    return $this->belongsTo(Category::class);
}
```
> Nota: es de resaltar que la llave foranea se establecio en la tabla posts como category_id
