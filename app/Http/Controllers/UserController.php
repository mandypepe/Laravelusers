<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $user=User::all();
        $title='hi ;ara';
        //dd(compact('user','title')); lo mismo que var dum
       // return view('User',compact('user','title','vacio'));
        return view('User')->with('user',$user)->with('title',$title);
        #return view('User',['users'=>$user,'title'=>'hi ;ara']);
    }
    public function new_user()
    {
        //return 'Usuarioas '.$id;
        return view('Userscreate');
    }
    public function detail_user(User $user){
       //dd($user);

        //$usuario=User::findOrFail($id);

        /*$usuario=User::find($id);
        if (empty($usuario) or $usuario==null)
        {
            return response()->view('errors.404',[],404);
        }*/
        //['user'=>$usuario]

        //return 'Usuarioas '.$id;
        return view('Usershow',compact('user'));

    }
    public  function store(){

        //return redirect(route('user.create'))->withInput(); manual return input
        $data=request()->validate(['name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|alpha_num|min:6'
            ],['name.required'=>'El nombre es requerido',
            'email.required'=>'El email es requerido',
            'email.email'=>'El email no es valido',
            'email.unique'=>'El email tiene que ser unico',
            'password.required'=>'El password es requerido',
            'password.alpha_num'=>'El tiene que ser alphanumerico',
            'password.min'=>'El tiene que ser mayor a 6 caracteres',
            ]);
        //$data=request()->all();
       // $data=request()->only(['name','email']);
        //dd($data);
        User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password'])
        ]);
        return redirect()->route('user.list');
    }
    public function edit(User $user){
        //$user=User::findOrFail($id);
        return view('Usersedit',['user'=>$user]);
    }
}
