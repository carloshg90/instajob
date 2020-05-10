<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Guardem els 2 rols que volem tenir
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'Empresa',
          ]);

          DB::table('roles')->insert([
            'id' => 2,
            'name' => 'Treballador',
          ]);
    }
}
