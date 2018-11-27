<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $casts=['is_admin'=>'boolean']; //castenado paramtros de la bd

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected function profession ()
{
//buscar por defecto profession_id
        // en caso de no estar llamarse asi sele pasa como argumento   $this->belongsTo(Profession::class ,'id_profesiones');
    $this->belongsTo(Profession::class); //un usuario pertenece auna  profesion

}
    public function isadm()
    {
        return $this->is_admin;
        //
        //return $this->email=="a@a.cu";
    }
    public static function  findbymail($email){
        return static::where(compact($email))->first();
    }

}
