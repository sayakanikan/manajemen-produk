<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search != null) {
            $product = Product::with('category')->where('name', 'LIKE', '%'.$request->search.'%')->orWhere('price', 'LIKE', '%'.$request->search.'%')->orWhere('stock_quantity', 'LIKE', '%'.$request->search.'%')->get();
        } else {
            $product = Product::with('category')->get();
        }

        return view('content/product/index', [
            'title' => 'Product',
            'data' => $product
        ]);
    }

    public function create()
    {
        $category = Category::all();
        return view('content/product/form', [
            'title' => 'Create Product',
            'category' => $category,
            'data' => null
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'content_id' => 'required|exists:categories',
                'name' => 'required|string',
                'price' => 'required|number',
                'stock_quantity' => 'required|number',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors());
            }
            
            Product::create([
                "content_id" => $request->content_id,
                "name" => $request->name,
                "price" => $request->price,
                "stock_quantity" => $request->stock_quantity
            ]);

            return redirect()->view('index')->with('success', 'Product berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show(Product $product) {
        $product = Product::with('category')->where('id', $product->id)->first();
        return view('content/product/detail', [
            'title' => 'Detail Product',
            'data' => $product
        ]);
    }

    public function edit(Product $product)
    {
        $product = Product::with('category')->where('id', $product->id)->first();
        return view('content/product/form', [
            'title' => 'Edit Product',
            'data' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {
        try {
            $validator = Validator::make($request->all(), [
                'content_id' => 'required|exists:categories',
                'name' => 'required|string',
                'price' => 'required|number',
                'stock_quantity' => 'required|number',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors());
            }
            
            $product->update([
                "content_id" => $request->content_id,
                "name" => $request->name,
                "price" => $request->price,
                "stock_quantity" => $request->stock_quantity
            ]);

            return redirect()->view('index')->with('success', 'Product berhasil diupdate');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();

            return redirect()->view('index')->with('success', 'Product berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
