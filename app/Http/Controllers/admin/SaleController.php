<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Sales;
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
}
