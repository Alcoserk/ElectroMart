<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products); #Получаем все товары из таблицы products
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'item not found'], 404);
        }

        return response()->json($product); #Получаем товар по id
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $product = Product::create($validated);
        return response()->json($product, 201); #Создаем новый товар
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!product) {
            return response()->json(['message' => 'item not found'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'item deleted'], 204); #Удаляем товар по id
    }
}
