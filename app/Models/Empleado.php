<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'correo', 'sexo', 'area', 'descripcion'];

    static $rules = [
        'nombre' => 'required',
        'correo' => 'required|email',
        'sexo' => 'required',
        'area' => 'required',
        'descripcion' => 'required',
        'file' => 'image'
    ];

    //uno a uno polimorfica
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
