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
            'nomEmpresa' => 'Mercadona',
            'idEmpresa' => 1,
            'sector' => 'Hostelería',
            'horari' => 'Matí',
            'zona' => 'Girona',
            'cos' => 'Busquem un reponedor per aquest cap de setmana',
          ]);
          DB::table('ofertas')->insert([
            'id' => 2,
            'nomEmpresa' => 'Carloshg90',
            'idEmpresa' => 2,
            'sector' => 'Hostelería',
            'horari' => 'Matí',
            'zona' => 'Girona',
            'cos' => 'Busquem una persona per fer 4 hores diumenge.',
          ]);
          DB::table('ofertas')->insert([
            'id' => 3,
            'nomEmpresa' => 'Facebook',
            'idEmpresa' => 4,
            'sector' => 'Mecànica',
            'horari' => 'Tarda',
            'zona' => 'Asturias',
            'cos' => 'Necessitem personal per la campanya d\'estiu.',
          ]);
          DB::table('ofertas')->insert([
            'id' => 4,
            'nomEmpresa' => 'Marechiaro',
            'idEmpresa' => 5,
            'sector' => 'Hosteleria',
            'horari' => 'Tarda',
            'zona' => 'Girona',
            'cos' => 'Busquem repartidor a domicili.',
          ]);
          DB::table('ofertas')->insert([
            'id' => 5,
            'nomEmpresa' => 'Whatsapp',
            'idEmpresa' => 6,
            'sector' => 'Hostelería',
            'horari' => 'Tarda',
            'zona' => 'Girona',
            'cos' => 'Necessitem BetaTester amb experiencia.',
          ]);
          DB::table('ofertas')->insert([
            'id' => 6,
            'nomEmpresa' => 'CaixaBank',
            'idEmpresa' => 7,
            'sector' => 'Banca',
            'horari' => 'Tarda',
            'zona' => 'Girona',
            'cos' => 'Busquem personal d\'atenció al public',
          ]);
          DB::table('ofertas')->insert([
            'id' => 7,
            'nomEmpresa' => 'Santander',
            'idEmpresa' => 8,
            'sector' => 'Banca',
            'horari' => 'Tarda',
            'zona' => 'Girona',
            'cos' => 'Busquem algú que conti els calers que tenim.',
          ]);
          DB::table('ofertas')->insert([
            'id' => 8,
            'nomEmpresa' => 'Santander',
            'idEmpresa' => 8,
            'sector' => 'Banca',
            'horari' => 'Tarda',
            'zona' => 'Girona',
            'cos' => 'Necessitem personal de seguretat en el nostre banc.',
          ]);
          DB::table('ofertas')->insert([
            'id' => 9,
            'nomEmpresa' => 'Mercadona',
            'idEmpresa' => 1,
            'sector' => 'Hostelería',
            'horari' => 'Matí',
            'zona' => 'Girona',
            'cos' => 'Necessitem personal de nit per fer inventari.',
          ]);
          DB::table('ofertas')->insert([
            'id' => 10,
            'nomEmpresa' => 'Santander',
            'idEmpresa' => 8,
            'sector' => 'Banca',
            'horari' => 'Tarda',
            'zona' => 'Girona',
            'cos' => 'Es busca personal per Setmana Santa.',
          ]);
          DB::table('ofertas')->insert([
            'id' => 11,
            'nomEmpresa' => 'Marechiaro',
            'idEmpresa' => 5,
            'sector' => 'Hostelería',
            'horari' => 'Tarda',
            'zona' => 'Girona',
            'cos' => 'Necessitem gent jove per aprendre a fer pizzes aquest estiu.',
          ]);
          DB::table('ofertas')->insert([
            'id' => 12,
            'nomEmpresa' => 'Instajob',
            'idEmpresa' => 3,
            'sector' => 'Banca',
            'horari' => 'Nit',
            'zona' => 'Tarragona',
            'cos' => 'Es busca gent per Instajob.',
          ]);
          DB::table('ofertas')->insert([
            'id' => 13,
            'nomEmpresa' => 'Decathlon',
            'idEmpresa' => 10,
            'sector' => 'Hostelería',
            'horari' => 'Tarda',
            'zona' => 'Girona',
            'cos' => 'Decathlon busca gent urgent.',
          ]);
          DB::table('ofertas')->insert([
            'id' => 14,
            'nomEmpresa' => 'Instagram',
            'idEmpresa' => 12,
            'sector' => 'Hostelería',
            'horari' => 'Tarda',
            'zona' => 'Girona',
            'cos' => 'Necessitem gent per l\'empresa Instagram.',
          ]);
          DB::table('ofertas')->insert([
            'id' => 15,
            'nomEmpresa' => 'Cendrassos',
            'idEmpresa' => 14,
            'sector' => 'Construcció',
            'horari' => 'Tarda',
            'zona' => 'Barcelona',
            'cos' => 'Necessitem gent jove per aprendre a fer pizzes aquest estiu.',
          ]);
    }
}
