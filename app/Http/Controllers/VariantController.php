<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $variants = $product->variants()->paginate(10);

        return view('variants.index', compact('product', 'variants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('variants.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product, Variant $variant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $product->variants()->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        return redirect()->route('variant.index', $product->id)
            ->with('success', 'Varian ' . $request->name . ' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Variant $variant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, Variant $variant)
    {
        return view('variants.edit', compact('product', 'variant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, Variant $variant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $variant->update([
            'name' => $request->name,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        return redirect()->route('variant.index', $product->id)
            ->with('success', 'Varian ' . $variant->name . ' diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, Variant $variant)
    {
        $variant->delete();

        return redirect()->route('variant.index', $product->id)
            ->with('success', 'Varian ' . $variant->name . ' berhasil dihapus!');
    }

    public function getVariants(Product $product)
    {
        $variants = $product->variants()->get(); 

        return response()->json([
            'status' => 'success',
            'data' => $variants
        ]);
    }
}
