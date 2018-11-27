<?php

use App\User;
use App\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // DB::insert("Insert into tabla(colum) values (values)");
       // DB::insert('Insert into tabla(colum) values (?)',['valores','valores']);
       //DB::insert('Insert into tabla('name','last_name') values (:name,:last_name)',['name'=>'valores','last_name']);
       //$data=DB::select('select id from table where campo="valor"');
       //dd($data);
        //$data2=DB::select('select id from table where campo=?',['valor_campo']);
        //$data3=DB::select('select id from table where campo=? limit 0,1',['valor_campo']);
        //$data4=DB::table('tabla')->select('columna')->take(1)->get();
        //$data4->first()->columna;
        #$data5=DB::table('profession')->select('id')->first();
        //dd($data5->columna);
        //$data6=DB::table('profession')->select('id','columna')->where('columna','operador = <','value')->first();
        //$data6->id;
        // select *from  $data7=DB::table('profession')->where('columna','operador = <','value')->first();
        //$data7->id;
        //$dataID=DB::table('profession')->where(['columna'=>'valor'])->value('id');
        //$dataID=DB::table('profession')->where('columna','valor')->value('id');
       // $datafiltros=DB::table('profession')->whereTitle('valor')->value('id');


        #$profession=Profession::where(['title'=>'Validador'])->value('id');
        $profession=Profession::where('title','Inicializador')->value('id');
        factory(User::class)->create(['profession_id'=>$profession]);
        factory(User::class)->create(['profession_id'=>Profession::all()->random()->id]);
        factory(User::class,20)->create(['profession_id'=>Profession::all()->random()->id]);  // 20 3lementos
        factory(User::class)->times(18)->create();

        //ramdom name
        factory(User::class)->create([
            'email'=>'b00@b.cu',
            'password'=>bcrypt('laravel'),
            'is_admin'=>true,
            'profession_id'=>0
        ]);




        User::created([
            'name'=>'inisializador',
            'email'=>'b00@b.cu',
            'password'=>bcrypt('laravel'),
            'is_admin'=>true,
            'profession_id'=>$profession
        ]);
        User::created(['name'=>'mandy',
            'email'=>'bpp@b.cu',
            'password'=>bcrypt('laravel'),
            'is_admin'=>false,
            'profession_id'=>'null'
        ]);
        User::created(['name'=>'atack',
            'email'=>'b99@b.cu',
            'password'=>bcrypt('laravel'),
            'is_admin'=>true,
            'profession_id'=>4
        ]);
        User::created(['name'=>'back',
            'email'=>'b77@b.cu',
            'password'=>bcrypt('laravel'),
            'is_admin'=>false,
            'profession_id'=>3
        ]);


       /* DB::table('users')->insert(['name'=>'Validador',
            'email'=>'a@a.cu',
            'password'=>bcrypt('laravel'),
            ]);*/
    }
}
