<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(){
        // dd(bcrypt('password'));
        $featured_products = Product::with('brand', 'category', 'product_images')
        ->where('product_type', 'featured')
        ->limit(8)
        ->get();
        $new_products = Product::with('brand', 'category', 'product_images')
        ->where('product_type', 'new')
        ->limit(8)
        ->get();
        $products = Product::with('brand', 'category', 'product_images')
        ->latest()
        ->limit(8)
        ->get();
        return Inertia::render('User/Index',[
        'featured_products' => $featured_products,
        'new_products' => $new_products,
        'products' => $products,
        'canLogin' => app('router')->has('login'),
        'canRegister' => app('router')->has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
    }
}
