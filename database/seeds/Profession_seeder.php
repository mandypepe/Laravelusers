<?php

use App\Profession;
use Illuminate\Database\Seeder;
USE Illuminate\Support\Facades\DB;

class Profession_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Profession::create(['title'=>'Inicializador',]);
       Profession::create(['title'=>'BANK',]);
       factory(Profession::class,12)->create();
        factory(Profession::class)->times(18)->create();

       /*DB::table('professions')->insert(['title'=>'Validador']);
       DB::table('professions')->insert(['title'=>'Probador' ]);
       DB::table('professions')->insert(['title'=>'Programador']);*/
    }
}
