<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Purchase;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('content/dashboard', [
            'title' => 'Dashboard',
            'product' => Product::count(),
            'category' => Category::count(),
            'purchase' => Purchase::count(),
            'stock' => Product::where('stock_quantity', '<=', 0)->count()
        ]);
    }
}
