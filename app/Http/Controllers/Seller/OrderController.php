<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['product', 'user'])
            ->whereHas('product', function($q) { $q->where('user_id', '=', auth()->user()->getAuthIdentifier()); })->paginate();

        return view('orders.seller.index', compact('orders'));
    }
}
