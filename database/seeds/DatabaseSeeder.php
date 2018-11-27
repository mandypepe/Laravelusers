<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate_tables(['professions','users']);
        // $this->call(UsersTableSeeder::class);
        $this->call(Profession_seeder::class);
        $this->call(User_seeder::class);
    }

    public function truncate_tables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        foreach ($tables as $tables) {
            DB::table($tables)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
