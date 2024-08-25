<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [UserController::class,'index'])->name('user.home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// end

// add to cart

Route::prefix('cart')->controller(CartController::class)->group(function () {
    Route::get('view', 'view')->name('cart.view');               // View the cart
    Route::post('store/{product}', 'store')->name('cart.store');  // Store a product in the cart
    Route::patch('update/{product}', 'update')->name('cart.update');  // Update the quantity of a product in the cart
    Route::delete('delete/{product}', 'delete')->name('cart.delete');  // Delete a product from the cart
});

// routes for products list and and filters
Route::prefix('products')->controller(ProductListController::class)->group(function(){
    Route::get('/','index')->name('products.index');
});

//  admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'redirectAdmin'], function() {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});


Route::middleware(['auth','admin'])->prefix('admin')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // products routes
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::post('/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/image/{id}', [ProductController::class, 'deleteImage'])->name('admin.products.image.delete');
    Route::delete('/products/delete/{id}', [ProductController::class, 'destroy'])->name('admin.products.delete');
    // brands route
    Route::get('/brands', [BrandsController::class, 'index'])->name('admin.brands.index');
    Route::post('/brands/store', [BrandsController::class, 'store'])->name('brands.store');
    Route::put('/brands/update/{id}', [BrandsController::class, 'update'])->name('brands.update');
    Route::delete('/brands/delete/{id}', [BrandsController::class, 'destroy'])->name('brands.delete');
    // categories routes
    Route::get('/categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
    Route::post('/categories/store', [CategoriesController::class, 'store'])->name('categories.store');
    Route::put('/categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/categories/delete/{id}', [CategoriesController::class, 'destroy'])->name('categories.delete');
    // products colors routes
    Route::get('/colors', [ColorsController::class, 'index'])->name('admin.colors.index');
    Route::post('/colors/store', [ColorsController::class, 'store'])->name('colors.store');
    Route::put('/colors/update/{id}', [ColorsController::class, 'update'])->name('colors.update');
    Route::delete('/colors/delete/{id}', [ColorsController::class, 'destroy'])->name('colors.delete');
});

// ends


require __DIR__.'/auth.php';
