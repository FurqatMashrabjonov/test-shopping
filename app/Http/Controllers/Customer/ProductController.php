<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->latest()
            ->with(['orders' => function ($query) {
                $query->where('user_id', auth()->user()->getAuthIdentifier());
            }])
            ->paginate();
        return view('products.customer.index', compact('products'));
    }

    public function order(Request $request)
    {
        $order = new Order();
        $order->user_id = auth()->user()->getAuthIdentifier();
        $order->product_id = $request->product_id;
        $order->save();
        return redirect()->back()->with('success', 'Order was saved successfully');
    }
}
