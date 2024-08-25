<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CategoriesController extends Controller
{
    public function index()
    {
        // Fetch categories with pagination
        $categories = Category::latest()->paginate(10);

        return Inertia::render('Admin/Categories/Index', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        // Create a new category
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->back()->with('success', 'Category created successfully.');
    }

    public function update(Request $request, $id)
    {

       $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->back()->with('success', 'Category updated successfully.');
    }



        public function destroy(string $id)
        {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->back()->with('success', 'Brand deleted successfully.');
        }

}
