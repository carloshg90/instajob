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
            'name' => 'Mercadona',
            'email' => 'mercadona@gmail.com',
            'password' => 'mercadona',
            'sector' => 'Hostelería',
            'horari' => 'Matí',
            'usuari' => 'Empresa',
            'zona' => 'Girona'
        ),
        array(
            'name' => 'Carloshg90',
            'email' => 'carloshg90@hotmail.com',
            'password' => 'carloshg90',
            'sector' => 'Hostelería',
            'horari' => 'Matí',
            'usuari' => 'Empresa',
            'zona' => 'Girona'
        ),
        array(
            'name' => 'Instajob',
            'email' => 'instajob@gmail.com',
            'password' => 'instajob',
            'sector' => 'Banca',
            'horari' => 'Nit',
            'usuari' => 'Empresa',
            'zona' => 'Tarragona'
        ),
        array(
            'name' => 'Facebook',
            'email' => 'facebook@gmail.com',
            'password' => 'facebook',
            'sector' => 'Mecànica',
            'horari' => 'Tarda',
            'usuari' => 'Empresa',
            'zona' => 'Asturias'
        ),
        array(
            'name' => 'Marechiaro',
            'email' => 'marechiaro@gmail.com',
            'password' => 'marechiaro',
            'sector' => 'Hostelería',
            'horari' => 'Tarda',
            'usuari' => 'Empresa',
            'zona' => 'Girona'
        ),
        array(
            'name' => 'Whatsapp',
            'email' => 'whatsapp@gmail.com',
            'password' => 'whatsapp',
            'sector' => 'Hostelería',
            'horari' => 'Tarda',
            'usuari' => 'Empresa',
            'zona' => 'Girona'
        ),
        array(
            'name' => 'Caixabank',
            'email' => 'caixabank@gmail.com',
            'password' => 'caixabank',
            'sector' => 'Banca',
            'horari' => 'Tarda',
            'usuari' => 'Empresa',
            'zona' => 'Girona'
        ),
        array(
            'name' => 'Santander',
            'email' => 'santander@gmail.com',
            'password' => 'santander',
            'sector' => 'Banca',
            'horari' => 'Tarda',
            'usuari' => 'Empresa',
            'zona' => 'Girona'
        ),
        array(
            'name' => 'litoshg90',
            'email' => 'litoshg90@gmail.com',
            'password' => 'litoshg90',
            'sector' => 'Hostelería',
            'horari' => 'Matí',
            'usuari' => 'Treballador',
            'zona' => 'Girona'
        ),
        array(
            'name' => 'Decathlon',
            'email' => 'decathlon@gmail.com',
            'password' => 'decathlon',
            'sector' => 'Hostelería',
            'horari' => 'Tarda',
            'usuari' => 'Empresa',
            'zona' => 'Girona'
        ),
        array(
            'name' => 'Xavi Sala',
            'email' => 'xavisala@gmail.com',
            'password' => 'xavisala',
            'sector' => 'Banca',
            'horari' => 'Nit',
            'usuari' => 'Treballador',
            'zona' => 'Tarragona'
        ),
        array(
            'name' => 'Instagram',
            'email' => 'instagram@gmail.com',
            'password' => 'instagram',
            'sector' => 'Hostelería',
            'horari' => 'Tarda',
            'usuari' => 'Empresa',
            'zona' => 'Girona'
        ),
        array(
            'name' => 'Albert Ibiza',
            'email' => 'albertibiza@gmail.com',
            'password' => 'albertibiza',
            'sector' => 'Mecànica',
            'horari' => 'Tarda',
            'usuari' => 'Treballador',
            'zona' => 'Asturias'
        ),
        array(
            'name' => 'Cendrassos',
            'email' => 'cendrassos@gmail.com',
            'password' => 'cendrassos',
            'sector' => 'Construcció',
            'horari' => 'Tarda',
            'usuari' => 'Empresa',
            'zona' => 'Barcelona'
        ),
        array(
            'name' => 'David Valles',
            'email' => 'davidvalles@gmail.com',
            'password' => 'davidvalles',
            'sector' => 'Construcció',
            'horari' => 'Tarda',
            'usuari' => 'Treballador',
            'zona' => 'Barcelona'
        ),
        array(
            'name' => 'Xavi Vallejo',
            'email' => 'xavivallejo@gmail.com',
            'password' => 'xavivallejo',
            'sector' => 'Construcció',
            'horari' => 'Tarda',
            'usuari' => 'Treballador',
            'zona' => 'Barcelona'
        ),
        array(
            'name' => 'Josep Maria',
            'email' => 'josepmaria@gmail.com',
            'password' => 'josepmaria',
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
