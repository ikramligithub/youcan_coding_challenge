<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        $category = $this->category->create($validatedData);
        return response()->json($category, 201);
    }

    public function show($id)
    {
        $category = $this->category->find($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        return response()->json($category);
    }

    

   
}

