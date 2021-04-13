<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesionals extends Model
{
    use HasFactory;
    protected $filiable = ['documento', 'nombre', 'apellido', 'habilidades', 'salario', 'disponible']; 
}
