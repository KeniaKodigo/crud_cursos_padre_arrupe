<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //asignando la tabla de la base de datos
    protected $table = 'courses';
    //asignado que los campos updated_at y created_at no estan en la tabla de courses
    public $timestamps = false;
}
