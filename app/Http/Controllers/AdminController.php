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
        return view('admin.index', $stats);
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
