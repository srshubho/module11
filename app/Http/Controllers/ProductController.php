<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        return view('pages.product.index', compact('products'));
    }
    public function sales()
    {
        $sales = DB::table('sales')
            ->join('products', 'products.id', '=', 'sales.product_id')
            ->get();
        return view('pages.sales', compact('sales'));
    }
    public function create()
    {
        return view('pages.product.create');
    }
    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('pages.product.edit', compact('product'));
    }
    public function sell($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('pages.product.sell', compact('product'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products,name',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);
        DB::table('products')->insert([
            "name" => $request->name,
            "price" => $request->price,
            "quantity" => $request->quantity,
        ]);
        return redirect()->back()->with('success', 'Product Added Successfully');
    }
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'price' => 'numeric',
        ]);
        DB::table('products')->where('id', $id)->update([
            "name" => $request->name,
            "price" => $request->price,
        ]);
        return redirect()->back()->with('success', 'Product Updated Successfully');
    }
    public function transaction(Request $request)
    {
        $this->validate($request, [
            'quantity_sold' => 'required|integer|min:1',
            'product_id' => 'required',
            'sale_date' => 'required|date',
            'total_amount' => 'required|numeric',
        ]);
        $productId = $request->product_id;
        $requestedQuantity = $request->quantity_sold;
        $product = DB::table('products')->where('id', $productId)->first();
        if ($requestedQuantity > $product->quantity) {
            // Quantity exceeds stocked quantity
            return redirect()->back()->with('error', 'Quantity exceeds stocked quantity.');
        }
        DB::table('products')->where('id', $productId)->update([
            "quantity" => $product->quantity - $requestedQuantity,
        ]);
        DB::table('sales')->insert([
            "product_id" => $request->product_id,
            "sale_date" => $request->sale_date,
            "total_amount" => $request->total_amount,
            "quantity_sold" => $request->quantity_sold,
        ]);
        return redirect()->back()->with('success', 'transaction done successfully');
    }

}
