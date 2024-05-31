<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    // public function tags(){
    //     return $this->belongsToMany(Tag::class)
    //         ->withTimestamps() // para que se agreguen valores en los campos created_at & updated_at de la tabla pivote
    //         ->withPivot('data'); // habilitar para que se puedan mostrar los valores de columnas secundarias de la tabla pivote
    // }

    // Relación uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    // Relación uno a muchos polimorfica
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    // Relación muchos a muchos polimorfica
    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable')
            ->withTimestamps();
    }
}
