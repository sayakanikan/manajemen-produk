<?php

namespace App\Http\Controllers;

use Exception;
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

            return redirect()->view('index')->with('success', 'Category berhasil ditambahkan');
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

            return redirect()->view('index')->with('success', 'Category berhasil diupdate');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();

            return redirect()->view('index')->with('success', 'Category berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
