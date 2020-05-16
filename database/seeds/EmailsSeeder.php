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
            'sectorOferta' => 'Hostelería',
            'cosOferta' => 'Oferta de empresa1 de Mati a Girona sector Hostelería',
            'nomReceptor' => 'Empresa1',
          ]);
          DB::table('emails')->insert([
            'id' => 2,
            'idremitent' => 11,
            'missatgeEnviat' => 'Crec que soc un bon aspirant a aquest lloc de treball.',
            'zonaOferta' => 'Girona',
            'horariOferta' => 'Matí',
            'sectorOferta' => 'Hostelería',
            'cosOferta' => 'Oferta de empresa1 de Mati a Girona sector Hostelería',
            'nomReceptor' => 'Empresa1',
          ]);
          DB::table('emails')->insert([
            'id' => 3,
            'idremitent' => 11,
            'missatgeEnviat' => 'Podeu contactar amb mi si em necessiteu.',
            'zonaOferta' => 'Girona',
            'horariOferta' => 'Matí',
            'sectorOferta' => 'Hostelería',
            'cosOferta' => 'Oferta de empresa1 de Mati a Girona sector Hostelería',
            'nomReceptor' => 'Empresa4',
          ]);
          DB::table('emails')->insert([
            'id' => 4,
            'idremitent' => 11,
            'missatgeEnviat' => 'Hola, gracies per la oportunitat.',
            'zonaOferta' => 'Girona',
            'horariOferta' => 'Matí',
            'sectorOferta' => 'Hostelería',
            'cosOferta' => 'Oferta de empresa1 de Mati a Girona sector Hostelería',
            'nomReceptor' => 'Empresa1',
          ]);
          DB::table('emails')->insert([
            'id' => 5,
            'idremitent' => 11,
            'missatgeEnviat' => 'Vull formar part de la vostra empresa.',
            'zonaOferta' => 'Girona',
            'horariOferta' => 'Matí',
            'sectorOferta' => 'Hostelería',
            'cosOferta' => 'Oferta de empresa1 de Mati a Girona sector Hostelería',
            'nomReceptor' => 'Empresa1',
          ]);
          DB::table('emails')->insert([
            'id' => 6,
            'idremitent' => 11,
            'missatgeEnviat' => 'Espero la vostra resposta.',
            'zonaOferta' => 'Girona',
            'horariOferta' => 'Matí',
            'sectorOferta' => 'Hostelería',
            'cosOferta' => 'Oferta de empresa1 de Mati a Girona sector Hostelería',
            'nomReceptor' => 'Empresa3',
          ]);
          DB::table('emails')->insert([
            'id' => 7,
            'idremitent' => 11,
            'missatgeEnviat' => 'Gracies per aquesta oportunitat.',
            'zonaOferta' => 'Girona',
            'horariOferta' => 'Matí',
            'sectorOferta' => 'Hostelería',
            'cosOferta' => 'Oferta de empresa1 de Mati a Girona sector Hostelería',
            'nomReceptor' => 'Empresa2',
          ]);
    }
}
