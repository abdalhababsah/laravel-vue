<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Color;
use Inertia\Inertia;

class ColorsController extends Controller
{
// File: app/Http/Controllers/ColorsController.php

public function index(Request $request)
{
    // Initialize the query builder
    $query = Color::query();

    // Check if there's a search query
    if ($search = $request->input('search')) {
        $query->where('name', 'like', "%{$search}%")
              ->orWhere('hex_code', 'like', "%{$search}%");
    }

    // Fetch paginated results with search applied
    $colors = $query->latest()->paginate(10)->withQueryString();

    // Return the Inertia view with colors and current filters
    return Inertia::render('Admin/Colors/Index', [
        'colors' => $colors,
        'filters' => $request->only('search'),
    ]);
}
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:colors|max:255',
            'hex_code' => 'required|max:255',
        ]);

        Color::create([
            'name' => $request->name,
            'hex_code' => $request->hex_code,
        ]);

        return redirect()->back()->with('success', 'Color created successfully.');
    }


    public function update(Request $request, $id)
    {

        $color= Color::findOrFail($id);
        $color->update([
            'name' => $request->name,
            'hex_code' => $request->hex_code,
        ]);

        return redirect()->back()->with('success', 'Color updated successfully.');
    }

    public function destroy(string $id)
    {
        $color = Color::findOrFail($id);
        $color->delete();
        return redirect()->back()->with('success', 'Color deleted successfully.');
    }
}
