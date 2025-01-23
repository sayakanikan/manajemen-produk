<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index(Request $request) {
        if ($request->search != null) {
            $purchase = Purchase::with(['product', function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%');
            }])->orderByDesc('created_at')->get();
        }
        else {
            $purchase = Purchase::with('product')->orderByDesc('created_at')->get();
        }

        return view('content/purchase/index', [
            'title' => 'Monitoring Purchase',
            'data' => $purchase
        ]);
    }
}
