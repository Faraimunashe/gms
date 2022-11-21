<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Sales;
use App\Models\SoldItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'amount' => ['required', 'numeric', 'min:0']
        ]);

        if($request->amount < 1){
            return redirect()->back()->with('error', 'Cannot checkout, cart is empty.');
        }

        $cart = Cart::where('user_id', Auth::id())->get();

        try{
            $sales = new Sales();
            $sales->user_id = Auth::id();
            $sales->amount = $request->amount;
            $sales->save();

            foreach($cart as $item)
            {
                $prod = get_product($item->barcode_id);
                $bar = get_barcode($item->barcode_id);
                $sold = new SoldItem();
                $sold->sales_id = $sales->id;
                $sold->code = $bar->code;
                $sold->name = $prod->name;
                $sold->price = $prod->price;
                $sold->save();

                $bar->delete();

            }

            Cart::where('user_id', Auth::id())->delete();
            return redirect()->back()->with('success', 'Successfully checked out');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }

    public function add($prod_id)
    {
        $product = Product::find($prod_id);
        if(is_null($product))
        {
            return redirect()->back()->with('error', 'cannot add this product');
        }

        if($product->qty >= 1)
        {
            try{

                $magic_code = cart_magic($prod_id);
                if($magic_code == 0)
                {
                    return redirect()->back()->with('error', 'You are out of stock');
                }

                $cart = new Cart();
                $cart->user_id = Auth::id();
                $cart->barcode_id = cart_magic($prod_id);
                $cart->price = $product->price;
                $cart->save();

                $product->qty = $product->qty - 1;
                $product->save();

                return redirect()->back()->with('success', 'Successfull added to cart');
            }catch(Exception $e)
            {
                return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
            }
        }else{
            return redirect()->back()->with('error', 'Sorry product out of stock');
        }
    }

    public function delete($cart_id)
    {
        try{
            $cart = Cart::find($cart_id);
            if(is_null($cart)){
                return redirect()->back()->with('error', 'Cannot locate specified cart');
            }

            $product = get_product($cart->barcode_id); //barcode_id

            $cart->delete();

            $product->qty = $product->qty + 1;
            $product->save();

            return redirect()->back()->with('success', 'Product moved from cart');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
