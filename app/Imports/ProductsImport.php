<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $category = Category::where('name', $row['category'])->first();

        return new Product([
            'category_id'    => $category ? $category->id : null,
            'name'           => $row['product_name'],
            'description'    => $row['description'],
            'price'          => $row['price'],
            'stock_quantity' => $row['stock_quantity'],
        ]);
    }
}
