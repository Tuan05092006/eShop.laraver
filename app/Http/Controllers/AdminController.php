<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Dashboard overview
    public function index()
    {
        $stats = [
            'total_products'  => Product::count(),
            'total_orders'    => Order::count(),
            'total_users'     => User::count(),
            'total_revenue'   => OrderDetail::selectRaw('SUM(price * quantity) as total')->value('total') ?? 0,
            'recent_orders'   => Order::with(['user', 'orderDetails'])->latest()->take(10)->get(),
            'total_brands'    => Category::count(),
        ];

        // ── Age Analytics ──────────────────────────────
        $usersWithAge = User::whereNotNull('date_of_birth')->get()->map(function ($user) {
            return [
                'id'    => $user->id,
                'name'  => $user->name ?? $user->email,
                'email' => $user->email,
                'date_of_birth' => $user->date_of_birth->format('d/m/Y'),
                'age'   => $user->age,
            ];
        });

        $ageGroups = [
            '18-25' => 0,
            '26-35' => 0,
            '36-45' => 0,
            '46-55' => 0,
            '55+'   => 0,
        ];

        foreach ($usersWithAge as $u) {
            $age = $u['age'];
            if ($age >= 18 && $age <= 25) $ageGroups['18-25']++;
            elseif ($age >= 26 && $age <= 35) $ageGroups['26-35']++;
            elseif ($age >= 36 && $age <= 45) $ageGroups['36-45']++;
            elseif ($age >= 46 && $age <= 55) $ageGroups['46-55']++;
            elseif ($age > 55) $ageGroups['55+']++;
        }

        $avgAge = $usersWithAge->count() > 0 ? round($usersWithAge->avg('age'), 1) : 0;

        // ── Product Sales Analytics ──────────────────────
        $productSales = DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select(
                'products.id',
                'products.name as product_name',
                'products.image',
                'categories.name as brand_name',
                DB::raw('SUM(order_details.quantity) as total_quantity'),
                DB::raw('SUM(order_details.price * order_details.quantity) as total_revenue')
            )
            ->groupBy('products.id', 'products.name', 'products.image', 'categories.name')
            ->orderByDesc('total_quantity')
            ->get();

        $topProducts = $productSales->take(10);
        $bottomProducts = $productSales->count() > 0 ? $productSales->sortBy('total_quantity')->take(5) : collect();

        // Revenue by Brand
        $brandRevenue = DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select(
                'categories.name as brand_name',
                DB::raw('SUM(order_details.price * order_details.quantity) as total_revenue'),
                DB::raw('SUM(order_details.quantity) as total_quantity')
            )
            ->groupBy('categories.name')
            ->orderByDesc('total_revenue')
            ->get();

        return view('admin.index', array_merge($stats, [
            'usersWithAge'   => $usersWithAge,
            'ageGroups'      => $ageGroups,
            'avgAge'         => $avgAge,
            'topProducts'    => $topProducts,
            'bottomProducts' => $bottomProducts,
            'brandRevenue'   => $brandRevenue,
        ]));
    }

    // ── Products ────────────────────────────────────
    public function products()
    {
        $products = Product::with('category')->latest()->paginate(15);
        $categories = Category::all();
        return view('admin.products', compact('products', 'categories'));
    }

    public function createProduct()
    {
        $categories = Category::all();
        return view('admin.product-form', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'year'        => 'required|integer|min:1900|max:2100',
            'image'       => 'nullable|string',
            'description' => 'nullable|string',
            'model'       => 'nullable|string|max:255',
            'is_featured' => 'boolean',
        ]);
        $data['is_featured'] = $request->boolean('is_featured');
        Product::create($data);
        return redirect()->route('admin.products')->with('success', 'Đã thêm sản phẩm thành công!');
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product-form', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'year'        => 'required|integer|min:1900|max:2100',
            'image'       => 'nullable|string',
            'description' => 'nullable|string',
            'model'       => 'nullable|string|max:255',
            'is_featured' => 'boolean',
        ]);
        $data['is_featured'] = $request->boolean('is_featured');
        $product->update($data);
        return redirect()->route('admin.products')->with('success', 'Đã cập nhật sản phẩm!');
    }

    public function deleteProduct($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('admin.products')->with('success', 'Đã xóa sản phẩm!');
    }

    // ── Orders ────────────────────────────────────
    public function orders()
    {
        $orders = Order::with(['user', 'orderDetails.product'])->latest()->paginate(20);
        return view('admin.orders', compact('orders'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);
        return redirect()->route('admin.orders')->with('success', 'Đã cập nhật trạng thái đơn hàng!');
    }

    // ── Brands/Categories ────────────────────────────────────
    public function brands()
    {
        $brands = Category::withCount('products')->get();
        return view('admin.brands', compact('brands'));
    }

    public function storeBrand(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|max:255|unique:categories,name']);
        Category::create($data);
        return redirect()->route('admin.brands')->with('success', 'Đã thêm thương hiệu!');
    }

    public function deleteBrand($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('admin.brands')->with('success', 'Đã xóa thương hiệu!');
    }
}
