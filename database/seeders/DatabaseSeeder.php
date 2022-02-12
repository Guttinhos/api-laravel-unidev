<?php

namespace Database\Seeders;

use App\Models\categories;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        $allCategories = collect(['suspense', 'terror', 'drama', 'acao','comedia', 'aventura', 'animacao', 'ficcao_cientifica', 'guerra', 'luta', 'nacional']);
        $allCategories->each(function($categorie) {
            categories::create(['nome' => $categorie]);
        });
    }
}
