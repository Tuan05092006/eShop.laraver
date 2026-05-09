<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $featuredCars = Product::with('category')->where('is_featured', true)->get();
        $allCars = Product::with('category')->latest()->get();
        return view('public.index', compact('featuredCars', 'allCars'));
    }

    public function show($id)
    {
        $car = Product::with('category')->findOrFail($id);
        return view('public.show', compact('car'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $categoryId = $request->input('category') ?? $request->input('brand');
        $type = $request->input('type');
        $fuelType = $request->input('fuel');

        $carsQuery = Product::with('category');

        if ($query) {
            $carsQuery->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('model', 'LIKE', "%{$query}%")
                  ->orWhere('type', 'LIKE', "%{$query}%");
            });
        }

        if ($categoryId) {
            $carsQuery->where('category_id', $categoryId);
        }

        if ($type) {
            $carsQuery->where('type', $type);
        }

        if ($fuelType) {
            $carsQuery->where('technical_specs->fuel_type', $fuelType);
        }

        $cars = $carsQuery->get();
        $categories = \App\Models\Category::all();

        return view('public.search', compact('cars', 'query', 'categories'));
    }
}
