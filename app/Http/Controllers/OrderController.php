<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Http\Requests\OrderRequest;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where('status', '=', '1')->orderBy('name')->get();
        $customers = Customer::where('status', '=', '1')->orderBy('name')->get();
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        return view('orders.create', compact('products', 'customers', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $order = new Order();
            // $order->product_id = $request -> product_id;
			// $order->customer_id = $request->customer_id;
			$order->date = $request->date;
			$order->price = $request->price;
            $order->status = 1;
            $order->registerby = $request->user()->id;
			$order->save();

            return redirect()->route('orders.index')->with('successMsg','El registro se actualizó exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, $id)
    {

			$order = Order::find($id);
			
			// $image = $request->file('image');
			// $slug = str::slug($request->name);

			// $order->product_id = $request -> product_id;
			// $order->customer_id = $request->customer_id;
			$order->date = $request->date;
			$order->price = $request->price;
            $order->status = 1;
            $order->registerby = $request->user()->id;
			$order->save();

            return redirect()->route('orders.index')->with('successMsg','El registro se actualizó exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order -> delete();
        return redirect()->route('orders.index')->with('Eliminar', 'Ok');
    }
    public function changestatuscustomer(Request $request)
	{
		$order = Order::find($request->order_id);
		$order->status=$request->status;
		$order->save();
	}
}