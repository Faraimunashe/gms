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
        $request->validate([
            'search' => ['required', 'string']
        ]);

        $item = Barcode::where('code', $request->search)->first();
        if(is_null($item))
        {
            return redirect()->back()->with('success', 'Item was sold');
        }else{
            return redirect()->back()->with('error', 'Item still in stock');
        }
    }
}
