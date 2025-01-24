<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }

    public function headings(): array
    {
        return [
            'Product Name', 'Category', 'Description', 'Price', 'Stock Quantity', 
        ];
    }

    public function map($product): array
    {
        return [
            $product->name,
            $product->category ? $product->category->name : null,
            $product->description,
            $product->price,
            $product->stock_quantity,
        ];
    }
}
