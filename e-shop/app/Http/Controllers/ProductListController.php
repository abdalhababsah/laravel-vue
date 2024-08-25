<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrandResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductListController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'brand', 'product_images', 'colors'])
            ->filtered()
            ->paginate(9)
            ->withQueryString();
        $categories = Category::get();
        $brands = Brand::get();
        $colors = Color::get();

        return Inertia::render('User/ProductList', [
            'products' => ProductResource::collection($products),
            'brands' => $brands,
            'categories' => $categories,
            'colors' => $colors,
        ]);
    }

}
