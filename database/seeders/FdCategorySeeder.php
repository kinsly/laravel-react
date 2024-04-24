<?php

namespace Database\Seeders;

use App\Models\FdCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FdCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id'=>1,
                'name'=>'Berries'
            ],
            [
                'id'=>2,
                'name'=>'Citrus Fruits'
            ],
            [
                'id'=>3,
                'name'=>'Tree Fruits'
            ],
            [
                'id'=>4,
                'name'=>'Tropical Fruits'
            ],
            [
                'id'=>5,
                'name'=>'Melons'
            ], 
            [
                'id'=>6,
                'name'=>'Drupes'
            ]
        ];

        foreach($categories as $item)
        {
            $category = new FdCategory();

            $category->id = $item['id'];
            $category->name = $item['name'];
            $category->save();
        }

    }
}
