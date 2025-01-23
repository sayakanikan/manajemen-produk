<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index(Request $request) {
        if ($request->search != null) {
            $product = Product::with('category')->where('name', 'LIKE', '%' . $request->search . '%')->orWhere('price', 'LIKE', '%' . $request->search . '%')->orWhere('stock_quantity', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $product = Product::with('category')->get();
        }

        return view('content/shop/index', [
            'title' => 'Shop',
            'product' => $product
        ]);
    }

    public function buy(Request $request) {
        try {
            DB::beginTransaction();
            $id = $request->id;

            $product = Product::find($id);

            if ($product == null) {
                throw new Exception("Product not found");
            }

            if ($product->stock_quantity <= 0) {
                throw new Exception("Product is out of stock");
            }

            if ($product->stock_quantity - $request->quantity < 0) {
                throw new Exception('Stock quantity is not enough');
            }

            Product::where('id', $product->id)->update([
                'stock_quantity' => $product->stock_quantity - $request->quantity
            ]);

            StockMovement::create([
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'change_type' => 'decrease'
            ]);

            Purchase::create([
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'total_price' => $product->price * $request->quantity,
            ]);

            DB::commit();
            return redirect('/shop')->with('success', 'Buy Product Success');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}