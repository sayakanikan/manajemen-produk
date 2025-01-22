<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search != null) {
            $category = Category::where('name', 'LIKE', '%'.$request->search.'%')->get();
        } else {
            $category = Category::all();
        }

        return view('content/category/index', [
            'title' => 'Category',
            'data' => $category
        ]);
    }

    public function create()
    {
        return view('content/category/form', [
            'title' => 'Create Category',
            'data' => null
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors());
            }

            Category::create([
                "name" => $request->name
            ]);

            return redirect('/category')->with('success', 'Category added successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show(Category $category)
    {
        return view('content/category/detail', [
            'title' => 'Detail Category',
            'data' => $category
        ]);
    }

    public function edit(Category $category)
    {
        return view('content/category/form', [
            'title' => 'Edit Category',
            'data' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string'
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors());
            }

            $category->update([
                "name" => $request->name
            ]);

            return redirect('/category')->with('success', 'Category updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        try {
            // Validate
            $product = Product::where('category_id', $category->id)->get();

            if (count($product) > 0) {
                throw new Exception("Category can't be deleted because it's still used by some products");
            }

            $category->delete();

            return redirect('/category')->with('success', 'Category deleted successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
