<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use App\Models\RequestInventory;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard', [
            'totalProducts' => Product::count(),
            'totalVariants' => Variant::count(),
            'totalRequests' => RequestInventory::count(),
            'totalUsers' => User::count(),
            'requestStatusCounts' => RequestInventory::selectRaw('status, COUNT(*) as count')
                ->groupBy('status')
                ->pluck('count', 'status'),
            'recentRequests' => RequestInventory::with('user')->latest()->take(5)->get(),
        ]);
    }
}
