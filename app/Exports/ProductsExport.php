<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Http\Controllers\ProductController;

class ProductsExport implements FromCollection
{
    public function collection()
    {
        return Product::all();
    }
}
