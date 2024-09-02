<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['category', 'brand', 'product_images'])->get();
        $brands = Brand::get();
        $categories = Category::get();

        return Inertia::render(
            'Admin/Product/Index',
            [
                'products' => $products,
                'brands' => $brands,
                'categories' => $categories
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        // Validate and sanitize input
        $validated = $request->all();
        // dd($validated);  // Debugging line

        $validated['published'] = $validated['published'] ?? 0;
        $inStock = $validated['quantity'] > 0 ? 0 : 1;

        $product = Product::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'published' => $validated['published'],
            'in_stock' =>  $inStock,
            'price' => $validated['price'],
            'quantity' => $validated['quantity'], // Ensure this field name matches your schema
            'brand_id' => $validated['brand_id'],
            'category_id' => $validated['category_id'],
            'created_by' => Auth::id(),
            // 'slug' => $validated['title'], // Assuming slug is the same as title for now
        ]);

        // Handle images
        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $image) {
                // Generate a unique name with timestamp
                $timestamp = now()->format('YmdHis');
                $imageName = $timestamp . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Store the image with the unique name
                $path = $image->storeAs('product_images/', $imageName, 'public');

                ProductImage::create([
                    'image' => $path,
                    'product_id' => $product->id,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Product created successfully.');
    }




    /**
     * Display the specified resource.
     */


    public function show(string $id)
    {
        // Retrieve the product with its related models
        $product = Product::with(['product_images', 'category', 'brand', 'colors'])->find($id);

        // If the product is not found, return a 404 response
        if (!$product) {
            return Inertia::render('Errors/Error404', [
                'error' => 'No product found with the specified ID'
            ]);
        }
        // dd($product);

        // If the product is found, return it using the ProductResource
        return Inertia::render('User/ProductView', [
            'product' => new ProductResource($product)
        ]);
    }

    public function getFromSlug($slug)
    {
        // Retrieve the product with its related models
        $product = Product::with(['product_images', 'category', 'brand', 'colors'])
        ->where('slug', $slug)
        ->firstOrFail();

        // If the product is not found, return a 404 response
        if (!$product) {
            return Inertia::render('Errors/Error404', [
                'error' => 'No product found with the specified ID'
            ]);
        }
        // dd($product);

        // If the product is found, return it using the ProductResource
        return Inertia::render('User/ProductView', [
            'product' => new ProductResource($product)
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $validated = $request->all();
        // dd($validated);
        $validated['published'] = $validated['published'] ?? 0;
        $inStock = $validated['quantity'] > 0 ? 0 : 1;
        $product->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'published' => $validated['published'],
            'in_stock' => $inStock,
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'brand_id' => $validated['brand_id'],
            'category_id' => $validated['category_id'],
            'updated_by' => Auth::id(),
        ]);
        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $image) {
                $timestamp = now()->format('YmdHis');
                $imageName = $timestamp . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('product_images/', $imageName, 'public');
                ProductImage::updateOrCreate(
                    [
                        'product_id' => $product->id,
                        'image' => $path,
                    ],
                    [
                        'image' => $path,
                    ]
                );
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function deleteImage($id)
    {
        ProductImage::where('id', $id)->delete();
        return redirect()->route('admin.products.index')->with('success', 'Image deleted successfully');
    }
}
