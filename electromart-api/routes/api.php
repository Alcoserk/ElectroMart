<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;  // <-- именно этот контроллер подключаем

Route::get('/products', [ProductController::class, 'index']);  // <-- и вызываем метод index у ProductController
