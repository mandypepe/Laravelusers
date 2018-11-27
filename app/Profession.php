<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $table='professions';
    //public $timestamps=false; // desable timestamps
    protected  $fillable=['title']; // permite carga masivas
    protected function  users()
    {
        $this->hasMany(User::class); // tiene muchos usuarios
    }

}
