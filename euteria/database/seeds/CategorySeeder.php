<?php

use App\Models\Backend\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::category_seeder();

        foreach($categories as $row)
        {
            Category::create([
                'name'=>$row
            ]);
        }
    }
}
