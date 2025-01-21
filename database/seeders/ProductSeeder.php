<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'category_id' => 1,
                'name' => 'Helene',
                'description' => 'Combining the ultimate in elegance with supreme comfort, this 3-seater sofa features a shallow-buttoned squared back, single incorporated cushion',
                'price' => 22127,
                'stock_quantity' => 50,
            ],
            [
                'category_id' => 1,
                'name' => 'Grace',
                'description' => 'Fluid dining armchair lines with curvaceous cabriole legs and intricate hand carved details; a definitive visual statement with a CG twist.',
                'price' => 13259,
                'stock_quantity' => 10,
            ],
            [
                'category_id' => 1,
                'name' => 'Jumele',
                'description' => 'Supremely adaptable, this sectional sofa can be obtained in a variety of combinations to adorn a host of grand settings.',
                'price' => 27453,
                'stock_quantity' => 20,
            ],
            [
                'category_id' => 2,
                'name' => 'Origami',
                'description' => 'With folded geometric shaped legs and a square top, this remarkable coffee table is a truly unique and original piece with contemporary styling.',
                'price' => 3863,
                'stock_quantity' => 100,
            ],
            [
                'category_id' => 2,
                'name' => 'Robuchon I',
                'description' => 'Add a touch of grandeur to a dining or entry space with this round dining table, symbolic of fine craftsmanship and refined splendor.',
                'price' => 8332,
                'stock_quantity' => 20,
            ],
            [
                'category_id' => 3,
                'name' => 'Oberon',
                'description' => 'A bar cabinet that creates visual excitement even before the cocktails are served! The abstract embossed pattern is intricately and painstakingly',
                'price' => 8818,
                'stock_quantity' => 90,
            ],
            [
                'category_id' => 3,
                'name' => 'Severin',
                'description' => 'This elegant chest of drawers is expertly hand crafted in wood with a shelf top, and features 6 drawers and long rectangular brass handles.',
                'price' => 8166,
                'stock_quantity' => 60,
            ]
        ];

        foreach ($data as $item) {
            Product::create($item);
        }
    }
}
