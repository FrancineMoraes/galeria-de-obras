<?php

use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config')->insert([
            'titulo' => 'Felipe Pereira',
            'sub' => 'Artista e Estudante de Arquitetur - UFPEL',
            'biografia' => '',
        ]);
    }
}
