<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Barcode;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products', [
            'products' => $products
        ]);
    }

    public function new()
    {
        return view('admin.new-product');
    }

    public function update($id)
    {
        $product = Product::find($id);
        return view('admin.update-product', [
            'product' => $product
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'qty' => ['required', 'integer'],
            'price' => ['required', 'numeric']
        ]);

        try{
            $new = new Product();
            $new->name = $request->name;
            $new->qty = $request->qty;
            $new->price = $request->price;
            $new->save();

            $count = 0;
            while($count < (int)$request->qty)
            {
                $barcode = new Barcode();
                $barcode->product_id = $new->id;
                $barcode->code = $this->getCode();//rand(111111111,999999999);
                $barcode->save();

                $count ++;
            }

            return redirect()->back()->with('success', 'Successfully added a new product');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }

    public function edit(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'qty' => ['required', 'integer'],
            'price' => ['required', 'numeric']
        ]);


        try{
            if($request->qty == 0)
            {
                $new = Product::find($request->product_id);
                $new->name = $request->name;
                //$new->qty = $request->qty;
                $new->price = $request->price;
                $new->save();
            }else{
                $new = Product::find($request->product_id);
                $new->name = $request->name;
                $new->qty = $new->qty + $request->qty;
                $new->price = $request->price;
                $new->save();

                $count = 0;
                while($count < (int)$request->qty)
                {
                    $barcode = new Barcode();
                    $barcode->product_id = $request->product_id;
                    $barcode->code = $this->getCode();//rand(111111111,999999999);
                    $barcode->save();

                    $count ++;
                }
            }
            return redirect()->back()->with('success', 'Successfully updated '.$request->name);
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }

    }

    public function delete($id)
    {
        $product = Product::find($id);
        if(is_null($product))
        {
            return redirect()->back()->with('error', 'cannot delete this product');
        }
        try{
            Barcode::where('product_id', $product->id)->delete();
            $product->delete();

            return redirect()->back()->with('success', 'successfully deleted product');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }

    }

    function getCode()
    {
        $code = 100000;
        $bar = Barcode::orderBy('id', 'DESC')->first();
        if(is_null($bar))
        {
            return $code;
        }else{
            $code = (int)$bar->code + 1;
            return $code;
        }
    }

    public function items($productid)
    {
        $items = Barcode::where('product_id', $productid)->paginate(10);

        return view('admin.available-item', [
            'items' => $items,
            'productid' => $productid
        ]);
    }
}
