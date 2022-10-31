<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Sales;
use App\Models\SoldItem;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sales::latest()->paginate(10);
        return view('admin.sales', [
            'sales' => $sales
        ]);
    }

    public function items($saleid)
    {
        $items = SoldItem::where('sales_id', $saleid)->paginate(10);

        return view('admin.sold-item', [
            'items' => $items,
            'saleid' => $saleid
        ]);
    }
}
