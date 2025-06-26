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
        $validator = validator::make($request->all(), [ #Созадли переменную валидатор, сделали запрос на все и создали необходимые условия
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ]);
        }

        $product = Product::create($validator->validated());
        return response()->json([
            'status' =>'success',
            'product' => $product,
        ], 201); #Создаем новый товар
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
