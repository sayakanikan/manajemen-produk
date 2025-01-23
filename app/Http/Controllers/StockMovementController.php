<?php

namespace App\Http\Controllers;

use App\Models\StockMovement;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search != null) {
            $stock_movement = StockMovement::with(['product', function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%');
            }])->orderByDesc('created_at')->get();
        } else {
            $stock_movement = StockMovement::with('product')->orderByDesc('created_at')->get();
        }

        return view('content/stock/index', [
            'title' => 'Stock Movement Monitoring',
            'data' => $stock_movement
        ]);
    }
}
