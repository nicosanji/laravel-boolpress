<?php

use App\Category;
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
        $newCategory = new Category;
        $newCategory->cat_name = "Trips";
        $newCategory->cat_name = "Cooking";
        $newCategory->cat_name = "Craft";
        $newCategory->save();
    }
}
