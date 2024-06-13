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
use \Exception;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('customer')->get();
        
        return view('orders.index', compact('orders'));
        
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
        DB::beginTransaction();

        try {
            $order = Order::create([
                'date_order' => Carbon::now()->toDateTimeString(),
                'total' => $request->total,
                'route' => "Por hacer",
                'client_id' => Customer::find($request->customer)->id,
                'status' => 1,
                'registered_by' => $request->registered_by
            ]);

            $rawProductId = $request->product_id;
            $rawAmount = $request->amount;

            for ($i = 0; $i < count($rawProductId); $i++) {
                $product = Product::find($rawProductId[$i]);
                $amount = $rawAmount[$i];

                $order->orderDetails()->create([
                    'product_id' => $product->id,
                    'amount' => $amount,
                ]);
            }

            $order->save();

            // Generate bill (PDF).
            $pdfName = 'uploads/bills/bill_' . $order->id . '_' . Carbon::now()->format('YmdHis') . '.pdf';

            $order = Order::find($order->id);
            $client = Customer::where("id", $order->customer_id)->first();
            $details = OrderDetail::with('product')
                ->where('order_details.order_id', '=', $order->id)
                ->get();

            $pdf = PDF::loadView('orders.bill', compact("order", "client", "details"))
                ->setPaper('letter')
                ->output();

            file_put_contents($pdfName, $pdf);

            $order->route = $pdfName;
            $order->save();

            DB::commit();

            return redirect()->route("orders.index")->with("success", "The orders has been created.");
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("success", $e->getMessage());
        }
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
