<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowroomController extends Controller
{
    public function index(Request $request)
    {
        $selectedType = $request->input('type');
        $selectedBrandId = $request->input('brand');
        
        // Fetch brands (categories) with product counts
        $brands = Category::withCount('products')->get();
        $totalCars = Product::count();

        // Fetch counts for car types
        $typeCounts = Product::select('type', \DB::raw('count(*) as count'))
            ->groupBy('type')
            ->pluck('count', 'type')
            ->toArray();

        // Fetch products for the selected category/brand
        $selectedProducts = null;
        if ($selectedType) {
            $selectedProducts = Product::with('category')->where('type', $selectedType)->get();
        } elseif ($selectedBrandId) {
            $selectedProducts = Product::with('category')->where('category_id', $selectedBrandId)->get();
        }

        return view('public.showroom', compact('brands', 'totalCars', 'typeCounts', 'selectedProducts', 'selectedType', 'selectedBrandId'));
    }
}
