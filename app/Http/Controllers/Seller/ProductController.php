<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->where('user_id', auth()->user()->getAuthIdentifier())->paginate();
        return view('products.seller.index', compact('products'));
    }

    public function create()
    {
        return ';';
    }
}
