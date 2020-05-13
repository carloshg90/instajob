<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        self::seedUsers();
    }

    private $arrayUsers= array(
        array(
            'name' => 'Empresa1',
            'email' => 'empresa1@gmail.com',
            'password' => 'empresa1',
            'sector' => 'Hostelería',
            'horari' => 'Matí',
            'usuari' => 'Empresa',
            'zona' => 'Girona'
        ),
        array(
            'name' => 'Empresa2',
            'email' => 'empresa2@gmail.com',
            'password' => 'empresa2',
            'sector' => 'Banca',
            'horari' => 'Nit',
            'usuari' => 'Empresa',
            'zona' => 'Tarragona'
        ),
        array(
            'name' => 'Empresa3',
            'email' => 'empresa3@gmail.com',
            'password' => 'empresa3',
            'sector' => 'Mecànica',
            'horari' => 'Tarda',
            'usuari' => 'Empresa',
            'zona' => 'Asturias'
        ),
        array(
            'name' => 'Empresa4',
            'email' => 'empresa4@gmail.com',
            'password' => 'empresa4',
            'sector' => 'Construcció',
            'horari' => 'Tarda',
            'usuari' => 'Empresa',
            'zona' => 'Barcelona'
        ),
        array(
            'name' => 'Empresa5',
            'email' => 'empresa5@gmail.com',
            'password' => 'empresa5',
            'sector' => 'Hostelería',
            'horari' => 'Tarda',
            'usuari' => 'Empresa',
            'zona' => 'Girona'
        ),
        array(
            'name' => 'Empresa6',
            'email' => 'empresa6@gmail.com',
            'password' => 'empresa6',
            'sector' => 'Hostelería',
            'horari' => 'Tarda',
            'usuari' => 'Empresa',
            'zona' => 'Girona'
        ),
        array(
            'name' => 'Empresa7',
            'email' => 'empresa7@gmail.com',
            'password' => 'empresa7',
            'sector' => 'Hostelería',
            'horari' => 'Tarda',
            'usuari' => 'Empresa',
            'zona' => 'Girona'
        ),
        array(
            'name' => 'Empresa8',
            'email' => 'empresa8@gmail.com',
            'password' => 'empresa8',
            'sector' => 'Hostelería',
            'horari' => 'Tarda',
            'usuari' => 'Empresa',
            'zona' => 'Girona'
        ),
        array(
            'name' => 'Empresa9',
            'email' => 'empresa9@gmail.com',
            'password' => 'empresa9',
            'sector' => 'Hostelería',
            'horari' => 'Tarda',
            'usuari' => 'Empresa',
            'zona' => 'Girona'
        ),
        array(
            'name' => 'Empresa10',
            'email' => 'empresa10@gmail.com',
            'password' => 'empresa10',
            'sector' => 'Hostelería',
            'horari' => 'Tarda',
            'usuari' => 'Empresa',
            'zona' => 'Girona'
        ),
        array(
            'name' => 'Treballador1',
            'email' => 'treballador1@gmail.com',
            'password' => 'treballador1',
            'sector' => 'Hostelería',
            'horari' => 'Matí',
            'usuari' => 'Treballador',
            'zona' => 'Girona'
        ),
        array(
            'name' => 'Treballador2',
            'email' => 'treballador2@gmail.com',
            'password' => 'treballador2',
            'sector' => 'Banca',
            'horari' => 'Nit',
            'usuari' => 'Treballador',
            'zona' => 'Tarragona'
        ),
        array(
            'name' => 'Treballador3',
            'email' => 'treballador3@gmail.com',
            'password' => 'treballador3',
            'sector' => 'Mecànica',
            'horari' => 'Tarda',
            'usuari' => 'Treballador',
            'zona' => 'Asturias'
        ),
        array(
            'name' => 'Treballador4',
            'email' => 'treballador4@gmail.com',
            'password' => 'treballador4',
            'sector' => 'Construcció',
            'horari' => 'Tarda',
            'usuari' => 'Treballador',
            'zona' => 'Barcelona'
        ));


        private function seedUsers(){
            DB::table('users')->delete();

            $role_empresa = Role::where('name','Empresa')->first();
            $role_treballador = Role::where('name','Treballador')->first();

            foreach( $this->arrayUsers as $user ) {
                    $usuari = new User();
                    $usuari->name =  $user['name'];
                    $usuari->email =  $user['email'];
                    $usuari->password =  Hash::make($user['password']);
                    $usuari->sector =  $user['sector'];
                    $usuari->horari =  $user['horari'];
                    $usuari->usuari =  $user['usuari'];
                    $usuari->zona =  $user['zona'];
                    $usuari->save();
                    if( $usuari['usuari']=='Empresa'){
                        $usuari->roles()->attach($role_empresa);
                    }
                    else {
                        $usuari->roles()->attach($role_treballador);
                    };
        }
    }


}
