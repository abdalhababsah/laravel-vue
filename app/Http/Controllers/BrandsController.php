<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Brand;
use Illuminate\Http\Request;
use Inertia\Inertia;



class BrandsController extends Controller
{

    public function index(Request $request)
    {
        // Initialize the query builder
        $query = Brand::query();

        // Check if there's a search query
        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
        }

        // Fetch paginated results with search applied
        $brands = $query->latest()->paginate(10)->withQueryString();

        // Return the Inertia view with brands and current filters
        return Inertia::render('Admin/Brands/Index', [
            'brands' => $brands,
            'filters' => $request->only('search'),
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Brands/Create');
    }

    // Store a newly created brand in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands|max:255',
        ]);

        Brand::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->back()->with('success', 'Brand created successfully.');
    }


    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $brand->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->back()->with('success', 'Brand updated successfully.');
    }

    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->back()->with('success', 'Brand deleted successfully.');
    }
}
