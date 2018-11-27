<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeUserController extends Controller
{
public function welcome($name,$nickname=null)
{
    //? significa que el parametro es opcional
        return "hola :{$name} alias :{$nickname}";
}

    public function welcomeu($name)
    {
        //? significa que el parametro es opcional
            return "hola :{$name} alias :Jon Doe";

    }
}
