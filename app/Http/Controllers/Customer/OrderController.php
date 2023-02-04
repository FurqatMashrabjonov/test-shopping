<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()->where('user_id', auth()->user()->getAuthIdentifier())
            ->with(['product'])
            ->latest()->paginate();
        return view('orders.customer.index', compact('orders'));
    }
}
