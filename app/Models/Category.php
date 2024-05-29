<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // campos que se van a usar para asignación masiva
    protected $fillable = [ 'name' ];

    // campos que no se van a usar para asignación masiva
    protected $guarded = [];

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
