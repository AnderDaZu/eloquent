<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function posts(){
        return $this->belongsToMany(Post::class)
            ->withTimestamps(); // para que se agreguen valores en los campos created_at & updated_at de la tabla pivote
    }
}
