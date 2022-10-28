<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::where('qty', '>=', 0)->paginate(10);
        $cart = Cart::where('user_id', Auth::id())->get();
        return view('user.dashboard', [
            'products' => $products,
            'cart' => $cart
        ]);
    }
}
