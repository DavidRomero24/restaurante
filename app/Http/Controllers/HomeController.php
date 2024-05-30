<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
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
        $date = Carbon::now();
        $date = $date->format("Y-m-d");

        $orderCountDay = Order::whereDate('date','=',Carbon::now()->format('Y-m-d'))->get()->count("id");
        $orderTotalDay = Order::whereDate('date','=',Carbon::now()->format('Y-m-d'))->get()->sum("total");
        
        $orderCountMonth = Order::whereMonth('date','=',date('m'))->get()->count("id");
        $orderTotalMonth = Order::whereMonth('date','=',date('m'))->get()->sum("total");
        error_log('orderTotalMonth: ' . $orderTotalMonth);

        $productCount = Product::where('status','=','1')->count();
        $customerCount = Customer::where('status','=','1')->count();
        $orderCount = Order::count();

        return view('home',compact('productCount','customerCount','orderCount','orderCountDay','orderTotalDay','orderCountMonth','orderTotalMonth'));
    }
}
