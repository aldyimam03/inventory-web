<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variant;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Models\RequestInventory;
use App\Models\User;

class RequestInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $requests = RequestInventory::with(['user', 'division'])
            ->when($search, function ($query, $search) {
                $query->where('status', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('division', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })
            ->latest()
            ->paginate(10);

        return view('request.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $divisions = Division::all();
        $variants = Variant::with('product')->get();

        return view('request.create', compact('products', 'divisions', 'variants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'variant_id' => 'required|exists:variants,id',
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable|string',
        ]);

        $variant = Variant::findOrFail($request->variant_id);

        if ($request->quantity > $variant->stock) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['quantity' => 'Stok tidak mencukupi. Tersedia: ' . $variant->stock]);
        }

        // Simpan ke database
        // abaikan error karna hanya error intelepse
        RequestInventory::create([
            'user_id' => auth()->user()->id,
            'division_id' => auth()->user()->division_id,
            'product_id' => $validated['product_id'],
            'variant_id' => $validated['variant_id'],
            'quantity' => $validated['quantity'],
            'note' => $validated['note'] ?? null,
        ]);

        // Redirect dengan notifikasi
        return redirect()->route('request.create')->with('success', 'Permintaan berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RequestInventory $requestInventory, $id)
    {
        $requestInventory = RequestInventory::with(['division', 'variant.product', 'user', 'approver'])->findOrFail($id);

        return view('request.show', compact('requestInventory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequestInventory $requestInventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequestInventory $requestInventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestInventory $requestInventory)
    {
        //
    }

    public function approve(Request $request, $id)
    {
        $inventory = RequestInventory::with('variant')->findOrFail($id);

        // Jika action adalah approve, baru cek dan kurangi stok
        if ($request->action === 'approve') {
            if (!$inventory->quantity || $inventory->variant->stock < $inventory->quantity) {
                return redirect()->route('request.show', $inventory->id)
                    ->with('error', 'Stok varian tidak mencukupi!');
            }

            // Kurangi stok
            $inventory->variant->decrement('stock', $inventory->quantity);

            $inventory->update([
                'status' => 'approved',
                'approved_by' => auth()->id(),
            ]);
        } elseif ($request->action === 'reject') {
            $inventory->update([
                'status' => 'rejected',
                'approved_by' => auth()->id(),
            ]);
        }

        return redirect()->route('request.index')->with('success', 'Status permintaan diperbarui.');
    }
}
