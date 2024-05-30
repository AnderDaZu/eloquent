<?php

use App\Models\Category;
use App\Models\Course;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test1', function () {
    $users = User::orderBy('id', 'desc')
        ->get();
    return $users;
});

Route::get('/test2', function () {
    $user = new User();
    $user->name = 'Anderson';
    $user->email = 'WkTqM@example.com';
    $user->password = bcrypt('12345678');
    $user->save();

    return $user;
});

Route::get('/test3', function () {
    $data = [
        'name' => 'Programación',
    ];
    $category = Category::create($data);

    return $category;
});

Route::get('/test4', function () {
    $user = User::find(1);

    // Opción 1 para actualizar
    // $user->name = 'Anderson';
    // $user->email = 'anderson@coders.com';
    // $user->save();

    $data = [
        'name' => 'Anderson Daz',
        'email' => 'andersondaz@coders.com',
    ];
    // Opción 2 para actualizar (recomendada)
    $user->update($data);

    return $user;
});

Route::get('/test5', function () {
    /*
        // forma para consultar la relación entre dos tablas usando query builder
        $user2 = DB::table('users')
            ->join('profiles', 'profiles.user_id', 'users.id')
            ->where('users.id', 1)
            ->first();
    */

    // forma para consultar la relacion entre dos tablas usando el modelo
    $user = User::find(1);

    return $user->profile;
});

Route::get('/test6', function () {
    $post = Post::find(1);
    $category = Category::find(1);
    return $category->posts;
});

Route::get('/test7', function () {
    $user = User::find(1);
    
    // return $user->profile->address;
    // usando la ralación uno a uno atravez de, se puede simplificar lo de arriba ☝️ con lo de abajo 👇
    return $user->address;
});

Route::get('/test8', function(){
    $course = Course::find(4);

    // cuando se usa la relación uno a muchos, no se puede realizar lo siguiente:
    // return $course->sections->lesson; // esto se soluciona usando la relación uno a muchos a través de

    // return $course->sections;
    return $course->lessons;
});

Route::get('/test9', function () {
    // insertar uno o más en tablas que estan muchos a muchos
    $post = Post::find(1);
    // $post->tags()->attach([1, 2, 3]); // attach permite crear registros en tabla pivote con los ids que van en el array
    // $post->tags()->detach([1, 2, 3, 4]); // detach permite eliminar registros de la tabla pivote con los ids que se indiquen

    $tags = [1, 3, 4];
    // sync elimina los registros que esten en la tabla pivote y crea nuevos con los ids que se establescan
    // valores antes [1, 2, 3]
    // $post->tags()->sync($tags);
    // valores despues [1, 3, 4]
    // $post->tags()->sync($tags);

    $post->tags()->attach([
        1 => [
            'data' => 'Hi there...'
        ]
    ]);
    // $post->tags()->detach(1);

    return $post->tags;
});

Route::get('/test10', function () {
    $post = Post::find(1);
    return $post->image;
});
