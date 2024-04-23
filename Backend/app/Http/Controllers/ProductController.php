<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->all();
        return response()->json($products);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048', 
            'category_id' => 'required|exists:categories,id'
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images');
            $validatedData['image'] = $imagePath;
        }
        
        $product = $this->product->create($validatedData);
        return response()->json($product, 201);
    }
    
    public function show($id)
    {
        $product = $this->product->find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product);
    }

    


}
