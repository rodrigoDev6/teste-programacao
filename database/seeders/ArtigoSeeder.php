<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artigos;

class ArtigoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artigos::create([
            'titulo'   => 'Como Progrmar',
            'categoria_id' => 1,
            'texto'  => 'Pesquise textos, artigos, videos e a linguagem que deseja aprender'
        ]);
    }
}