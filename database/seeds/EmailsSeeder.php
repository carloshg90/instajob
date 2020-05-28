<?php

use Illuminate\Database\Seeder;

class EmailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emails')->insert([
            'id' => 1,
            'idremitent' => 11,
            'missatgeEnviat' => 'Estic interessat en la vostra oferta.',
            'zonaOferta' => 'Girona',
            'horariOferta' => 'Matí',
            'sectorOferta' => 'Hostaleria',
            'cosOferta' => 'Oferta de empresa1 de Mati a Girona sector Hostaleria',
            'nomReceptor' => 'Empresa1',
          ]);
          DB::table('emails')->insert([
            'id' => 2,
            'idremitent' => 13,
            'missatgeEnviat' => 'Crec que soc un bon aspirant a aquest lloc de treball.',
            'zonaOferta' => 'Girona',
            'horariOferta' => 'Matí',
            'sectorOferta' => 'Hostaleria',
            'cosOferta' => 'Oferta de empresa1 de Mati a Girona sector Hostaleria',
            'nomReceptor' => 'Empresa1',
          ]);
          DB::table('emails')->insert([
            'id' => 3,
            'idremitent' => 15,
            'missatgeEnviat' => 'Podeu contactar amb mi si em necessiteu.',
            'zonaOferta' => 'Girona',
            'horariOferta' => 'Matí',
            'sectorOferta' => 'Hostaleria',
            'cosOferta' => 'Oferta de empresa1 de Mati a Girona sector Hostaleria',
            'nomReceptor' => 'Empresa4',
          ]);
          DB::table('emails')->insert([
            'id' => 4,
            'idremitent' => 16,
            'missatgeEnviat' => 'Hola, gracies per la oportunitat.',
            'zonaOferta' => 'Girona',
            'horariOferta' => 'Matí',
            'sectorOferta' => 'Hostaleria',
            'cosOferta' => 'Oferta de empresa1 de Mati a Girona sector Hostaleria',
            'nomReceptor' => 'Empresa1',
          ]);
          DB::table('emails')->insert([
            'id' => 5,
            'idremitent' => 17,
            'missatgeEnviat' => 'Vull formar part de la vostra empresa.',
            'zonaOferta' => 'Girona',
            'horariOferta' => 'Matí',
            'sectorOferta' => 'Hostaleria',
            'cosOferta' => 'Oferta de empresa1 de Mati a Girona sector Hostaleria',
            'nomReceptor' => 'Empresa1',
          ]);
          DB::table('emails')->insert([
            'id' => 6,
            'idremitent' => 9,
            'missatgeEnviat' => 'Espero la vostra resposta.',
            'zonaOferta' => 'Girona',
            'horariOferta' => 'Matí',
            'sectorOferta' => 'Hostaleria',
            'cosOferta' => 'Oferta de empresa1 de Mati a Girona sector Hostaleria',
            'nomReceptor' => 'Empresa3',
          ]);
          DB::table('emails')->insert([
            'id' => 7,
            'idremitent' => 9,
            'missatgeEnviat' => 'Gracies per aquesta oportunitat.',
            'zonaOferta' => 'Girona',
            'horariOferta' => 'Matí',
            'sectorOferta' => 'Hostaleria',
            'cosOferta' => 'Oferta de empresa1 de Mati a Girona sector Hostaleria',
            'nomReceptor' => 'Empresa2',
          ]);
    }
}
