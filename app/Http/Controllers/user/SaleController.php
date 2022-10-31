<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Barcode;
use App\Models\Sales;
use App\Models\SoldItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sales::where('user_id', Auth::id())->paginate(10);

        return view('user.sales', [
            'sales' => $sales
        ]);
    }

    public function check(Request $request)
    {

        return view('user.check');

    }

    public function verify(Request $request)
    {
        $request->validate([
            'search' => ['required', 'string']
        ]);

        $item = Barcode::where('code', $request->search)->first();
        if(is_null($item))
        {
            $sold = SoldItem::where('code', $request->search)->first();
            if(is_null($sold))
            {
                //dd("nothing");
                return redirect()->back()->with('error', 'This item is not registered');
            }
            //dd("was sold");
            return redirect()->back()->with('success', 'Item was sold');
        }else{
            //dd("in stock");
            return redirect()->back()->with('error', 'Item still in stock');
        }
    }

    public function items($saleid)
    {
        $items = SoldItem::where('sales_id', $saleid)->paginate(10);

        return view('user.items', [
            'items' => $items,
            'saleid' => $saleid
        ]);
    }
}
