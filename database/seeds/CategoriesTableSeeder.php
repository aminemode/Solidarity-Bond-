<?php

use App\Categorie;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie::create([
            'name'=> 'Santé',
            'slug'=> 'santé'
        ]);

        Categorie::create([
            'name'=> 'Vetement',
            'slug'=> 'vetement'
        ]);

        Categorie::create([
            'name'=> 'Nourriture',
            'slug'=> 'nourriture'
        ]);

        Categorie::create([
            'name'=> 'Jeux',
            'slug'=> 'jeux'
        ]);

        Categorie::create([
            'name'=> 'Livres',
            'slug'=> 'livres'
        ]);
    }
}
