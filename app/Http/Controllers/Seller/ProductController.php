<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->where('user_id', auth()->user()->getAuthIdentifier())->latest()->paginate();
        return view('products.seller.index', compact('products'));
    }

    public function create()
    {
        return view('products.seller.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'from_price' => ['required', 'numeric:min:1,max:1000000000'],
            'to_price' => ['required', 'numeric:min:1,max:1000000000'],
            'status' => ['required', 'in:0,1']
        ]);

        $product = new Product();
        $product->user_id = auth()->user()->getAuthIdentifier();
        $product->name = $data['name'];
        $product->from_price = $data['from_price'];
        $product->to_price = $data['to_price'];
        $product->status = $data['status'];
        $product->save();

        return redirect(route('products.seller.index'));

    }

}
