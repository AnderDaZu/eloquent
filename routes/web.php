<?php

use App\Models\Category;
use App\Models\User;
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
