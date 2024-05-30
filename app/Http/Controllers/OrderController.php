<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Http\Requests\OrderRequest;
use App\Models\OrderDetail;
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
        // Obtener todas las órdenes junto con la información del cliente.
        $orders = Order::with('customer')->get();
    
        // Retornar la vista y pasar los datos.
        return view('orders.index', compact('orders'));
        // $orders=Order::all();
        // $orders = Order::select('customers.name', 'customers.identification_document', 'orders.id', 'orders.total', 'orders.date','orders.status','orders.registered_by')
        //     ->join('customers', 'orders.customer_id', '=', 'customers.id')
        //     ->get();
        // return view('orders.index', compact('orders'));

        //$sales = Sale::select('customers.first_name','customers.identification_document', 'sales.sale_date','sales.total_sale','sales.status')
     //-> join ('customers', 'customer_id', '=', 'sales.customer_id')->get();
        //$sales = Sale::with('customer')->get();

        // $orders = Order::select('customers.name', 'customers.identification_document', 'orders.id', 'orders.price', 'orders.date','orders.status','orders.registerby')
        //     ->join('customers', 'orders.customer_id', '=', 'customers.id')
        //     ->get();
        // return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        return view('orders.create', compact('products', 'customers', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {   
        
        $validated = $request->validate([
            'customer' => 'required|exists:customers,id',
            'date' => 'required|date',
            'orderDetails' => 'required|json',
        ]);

        $orderDetails = json_decode($validated['orderDetails'], true);
        $total = array_reduce($orderDetails, function ($carry, $item) {
            return $carry + $item['subtotal'];
        }, 0);

        $order = Order::create([
            'customer_id' => $validated['customer'],
            'date' => $validated['date'],
            'total' => $total,
        ]);

        foreach ($orderDetails as $detail) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $detail['product_id'],
                'amount' => $detail['amount'],
                'price' => $detail['price'],
                'subtotal' => $detail['subtotal'],
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    
        
    }

    /**
     * Display the specified resource.
     */
    // app/Http/Controllers/OrderController.php

public function show($id)
{

    

        $order = Order::with(['customer', 'orderDetails.product'])->findOrFail($id);
        return view('orders.show', compact('order'));


}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    // $order = Order::with('orderDetails')->findOrFail($id);
    // $customers = Customer::all();
    // $products = Product::all();

    // return view('orders.edit', compact('order', 'customers','products'));
}




    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, $id)
{
    $order = Order::findOrFail($id);
    $order->customer_id = $request->input('customer');
    $order->date = $request->input('date');
    $order->product_id = $request->input('product');
    // Update other order details as needed

    // Save the updated order
    $order->save();

    // Redirect back to the orders index page or wherever you want
    return redirect()->route('orders.index')->with('success', 'Order updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        
        // Eliminar los detalles del pedido asociados
        $order->orderDetails()->delete();
        
        // Eliminar el pedido
        $order->delete();

        return redirect()->route('orders.index')->with('Eliminar', 'Ok');
    }
    
    public function changestatusorder(Request $request)
	{
		$order = Order::find($request->order_id);
		$order->status=$request->status;
		$order->save();
	}
}