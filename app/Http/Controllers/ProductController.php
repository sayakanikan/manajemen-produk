<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search != null) {
            $product = Product::with('category')->where('name', 'LIKE', '%' . $request->search . '%')->orWhere('price', 'LIKE', '%' . $request->search . '%')->orWhere('stock_quantity', 'LIKE', '%' . $request->search . '%')->get();
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
                'category_id' => 'required|numeric',
                'name' => 'required|string',
                'price' => 'required|numeric',
                'stock_quantity' => 'required|numeric',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors());
            }

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('products', 'public');
            }

            Product::create([
                "category_id" => $request->category_id,
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "stock_quantity" => $request->stock_quantity,
                "image" => $imagePath,
            ]);

            return redirect('/product')->with('success', 'Product berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show(Product $product)
    {
        $product = Product::with('category')->where('id', $product->id)->first();
        return view('content/product/detail', [
            'title' => 'Detail Product',
            'data' => $product
        ]);
    }

    public function edit(Product $product)
    {
        $category = Category::all();
        $product = Product::with('category')->where('id', $product->id)->first();
        return view('content/product/form', [
            'title' => 'Edit Product',
            'category' => $category,
            'data' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {
        try {
            $validator = Validator::make($request->all(), [
                'category_id' => 'required|numeric',
                'name' => 'required|string',
                'price' => 'required|numeric',
                'stock_quantity' => 'required|numeric',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors());
            }

            $imagePath = $product->image;
            if ($request->hasFile('image')) {
                if ($product->image && Storage::exists('public/' . $product->image)) {
                    Storage::delete('public/' . $product->image);
                }

                $imagePath = $request->file('image')->store('products', 'public');
            }

            $product->update([
                "category_id" => $request->category_id,
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "stock_quantity" => $request->stock_quantity,
                "image" => $imagePath,
            ]);

            return redirect('/product')->with('success', 'Product berhasil diupdate');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();

            return redirect('/product')->with('success', 'Product berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
