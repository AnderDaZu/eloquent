<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function sections(){
        return $this->hasMany(Section::class);
    }

    public function lessons(){
        return $this->hasManyThrough(Lesson::class, Section::class);
    }
}
