<?php

namespace Database\Seeders;

use App\Models\categories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allCategories = collect(['suspense', 'terror', 'drama', 'acao','comedia', 'aventura', 'animacao', 'ficcao_cientifica', 'guerra', 'luta', 'nacional']);
        $allCategories->each(function($categorie) {
            categories::create(['nome' => $categorie]);
            // (['nome' => $categorie]);
        });
    }
}
