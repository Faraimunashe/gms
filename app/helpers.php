<?php

use App\Models\Barcode;
use App\Models\Cart;
use App\Models\Message;
use App\Models\Product;
use App\Models\SoldItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function count_sold_items($sales_id){
    return SoldItem::where('sales_id', $sales_id)->count();
}

function get_teller($user_id){
    $teller = User::find($user_id);
    return $teller->name;
}

function get_user_role($user_id){
    $role = DB::table('role_user')
        ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->where('role_user.user_id', $user_id)
        ->first();

    return $role->display_name;
}

function get_product($barcode_id){
    $barcode = Barcode::find($barcode_id);
    $product = Product::find($barcode->product_id);

    return $product;
}

function get_product_by_id($product_id){
    $product = Product::find($product_id);

    return $product;
}

function get_barcode($barcode_id){
    $barcode = Barcode::find($barcode_id);
    return $barcode;
}

function cart_magic($product_id){
    $barcodes = Barcode::where('product_id', $product_id)->get();
    foreach($barcodes as $item)
    {
        $cart_item = Cart::where('barcode_id', $item->id)->first();
        if(is_null($cart_item)){
            return $item->id;
        }
    }

    return 0;
}

function get_users(){
    return User::where('id', '!=', Auth::id())->where('id', '!=', 1)->get();
}

function get_last_msg($userid){
    $msg = Message::where('user_id', $userid)->latest()->first();

    if(is_null($msg))
    {
        return "new meassage";
    }

    return mb_strimwidth($msg->message, 0, 20, "...");
}

function get_user($user_id){
    return User::find($user_id);
}
