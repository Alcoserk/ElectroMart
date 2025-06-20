<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json([
            ['id' => 1, 'title' => 'Galaxy A54', 'price' => 24990],
            ['id' => 2, 'title' => 'Galaxy Watch', 'price' => 12990],
        ]);
    }
}
