<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fecha = Carbon::now();
        $date = $fecha->format("Y-M-D");

        $ventaCountDia = Order::whereDate('date','=',Carbon::now()->format('Y-M-D'))->get()->count("id");
        $ventaTotalDia = Order::whereDate('date','=',Carbon::now()->format('Y-M-D'))->get()->sum("total");
        
        $ventaCountMonth = Order::whereMonth('date','=',date('m'))->get()->count("id");
        $ventaTotalMonth = Order::whereMonth('date','=',date('m'))->get()->sum("total");

        $productCount = Product::where('status','=','1')->count();
        $customerCount = Customer::where('status','=','1')->count();
        $orderCount = Order::count();

        return view('home',compact('productCount','customerCount','orderCount','ventaCountDia','ventaTotalDia','ventaCountMonth','ventaTotalMonth'));
    }
}
