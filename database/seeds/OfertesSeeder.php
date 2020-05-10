<?php

use Illuminate\Database\Seeder;

class OfertesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ofertas')->insert([
            'id' => 1,
            'nomEmpresa' => 'Empresa1',
            'idEmpresa' => 1,
            'sector' => 'Hostelería',
            'horari' => 'Matí',
            'zona' => 'Girona',
            'cos' => 'Oferta de empresa1 de Mati a Girona sector Hostelería',
          ]);
          DB::table('ofertas')->insert([
            'id' => 2,
            'nomEmpresa' => 'Empresa2',
            'idEmpresa' => 2,
            'sector' => 'Banca',
            'horari' => 'Nit',
            'zona' => 'Tarragona',
            'cos' => 'Oferta de empresa2 de Nit a Tarragona sector Banca',
          ]);
          DB::table('ofertas')->insert([
            'id' => 3,
            'nomEmpresa' => 'Empresa3',
            'idEmpresa' => 3,
            'sector' => 'Mecànica',
            'horari' => 'Tarda',
            'zona' => 'Asturias',
            'cos' => 'Oferta de empresa3 de Tarda a Asturias sector Mecànica',
          ]);
          DB::table('ofertas')->insert([
            'id' => 4,
            'nomEmpresa' => 'Empresa4',
            'idEmpresa' => 4,
            'sector' => 'Construcció',
            'horari' => 'Tarda',
            'zona' => 'Barcelona',
            'cos' => 'Oferta de empresa4 de Tarda a Barcelona sector Construcció',
          ]);
    }
}
