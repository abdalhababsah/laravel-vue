<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Color;
use Inertia\Inertia;

class ColorsController extends Controller
{
    public function index()
    {
        $colors = Color::latest()->paginate(10);
        return Inertia::render('Admin/Colors/Index', [
        'colors' => $colors
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
